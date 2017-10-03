<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Supplier extends Model
{
    protected $fillable = ['name','alamat','no_telp','email'];

    // Relasi One To Many #relasi1
    public function deposits()
    {
    	return $this->hasMany('App\Deposit');
    }

    // Relasi One To Many #relasi2
    public function stocks()
    {
    	return $this->hasMany('App\Stock');
    }

    // penghapusan supplier, even deleting
    public static function boot()
    {
      parent::boot();

      self::deleting(function($supplier) {
        // mengecek apakah supplier masih punya data transaksi stock
        if($supplier->stocks->count() > 0) {
          // menyimpan pesan error
          $html = 'Sales tidak bisa dihapus ada data stock : ';
          $html .= '<ul>';
          foreach ($supplier->stocks as $stock) {
            $html .= "<li>$stock->tgl_beli</li>";
          }
          $html .= '</ul>';

          Session::flash("flash_notification", [
            'level' => 'danger',
            'message'=>$html
          ]);

          // membatalka proses penghapusan
          return false;
        }

        if($supplier->deposits->count() > 0) {
          // menyimpan pesan error
          $html = 'Sales tidak bisa dihapus ada data stock : ';
          $html .= '<ul>';
          foreach ($supplier->deposits as $deposit) {
            $html .= "<li>$deposit->tgl_beli</li>";
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
