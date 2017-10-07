<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Customer extends Model
{
    protected $fillable = ['name','alamat'];

    // Relasi One to Many Relasi7
    public function sells()
    {
    	return $this->hasMany('App\Sell');
    }

    // Relasi One to One #relasi8
   	public function downline()
   	{
   		return $this->hasOne('App\Downline');
   	}

    // penghapusan customer, even deleting
    public static function boot()
    {
      parent::boot();

      self::deleting(function($customer) {
        // mengecek apakah customer masih punya data transaksi penjualan
        if($customer->sells->count() > 0) {
          // menyimpan pesan error
          $html = 'Pelanggan tidak bisa dihapus karena masih memiliki data di penjualan : ';
          $html .= '<ul>';
          foreach ($customer->sells as $sell) {
            $html .= "<li>$sell->harga_retail</li>";
          }
          $html .= '</ul>';

          Session::flash("flash_notification", [
            'level' => 'danger',
            'message'=>$html
          ]);

          // membatalka proses penghapusan
          return false;
        }
      });
    }
}
