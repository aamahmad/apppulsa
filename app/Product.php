<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Product extends Model
{
    protected $fillable = ['name','jenis','category_id','harga_dasar','harga_jual'];

    // relasi one to many #relasi3
    public function stocks()
    {
    	return $this->hasMany('App\Stock');
    }

    // Relasi One to One #relasi4
   	public function price()
   	{
   		return $this->hasOne('App\Price');
   	}

    // relasi One To Many Relasi5 (has many through #Relasi12 )
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }


    // relasi One To Many Relasi6 (has many through #Relasi12)
    public function sells()
    {
    	return $this->hasMany('App\Sell');
    }

    // penghapusan PRODUCT, even deleting
    public static function boot()
    {
      parent::boot();

      self::deleting(function($product) {
        // mengecek apakah produk masih punya data transaksi penjualan
        if($product->sells->count() > 0) {
          // menyimpan pesan error
          $html = 'Produk tidak bisa dihapus karena ada data di penjualan : ';
          $html .= '<ul>';
          foreach ($product->sells as $sell) {
            $html .= "<li>$sell->harga_awal</li>";
          }
          $html .= '</ul>';

          Session::flash("flash_notification", [
            'level' => 'info',
            'message'=>$html
          ]);

          // membatalka proses penghapusan
          return false;
        }

        // mengecek apakah produk masih punya data transaksi stok
        if($product->stocks->count() > 0) {
          // menyimpan pesan error
          $html = 'Produk tidak bisa dihapus karena ada data di Stock : ';
          $html .= '<ul>';
          foreach ($product->stocks as $stok) {
            $html .= "<li>$stok->jumlah</li>";
          }
          $html .= '</ul>';

          Session::flash("flash_notification", [
            'level' => 'info',
            'message'=>$html
          ]);

          // membatalka proses penghapusan
          return false;
        }


      });
    }  



   
}
