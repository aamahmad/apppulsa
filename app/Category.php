<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Category extends Model
{
    protected $fillable = ['name','induk_id'];

    // relasi One To Many Relasi5  / #Relasi12
    public function products()
    {
    	return $this->hasMany('App\Product');
    }

    // Relasi Has Many Through #Relasi12
    public function sells()
    {
        return $this->hasManyThrough('App\Sell', 'App\Product');
    }

    // mencari sub kategori, relasinya one-to-many.
    public function childs()
    {
        return $this->hasMany('App\Category', 'induk_id');
    }

    // mencari induk dari sebuah category, relasinya many-to-one
    public function induk()
    {
        return $this->belongsTo('App\Category', 'induk_id');
    }

    public function scopeNoInduk($query)
    {
        return $this->where('induk_id', '');
    }

    public function hasInduk()
    {
        return $this->induk_id > 0;
    }

    public function hasChild()
    {
        return $this->childs()->count() > 0;
    }

    // relasi one to many #relasi11
    public function deposits()
    {
        return $this->hasMany('App\Deposits');
    }

    // penghapusan categori, even deleting
    public static function boot()
    {
      parent::boot();

      self::deleting(function($category) {
        // mengecek apakah customer masih punya data transaksi penjualan
        if($category->products->count() > 0) {
          // menyimpan pesan error
          $html = 'Kategori tidak bisa dihapus karena ada data di produk : ';
          $html .= '<ul>';
          foreach ($category->products as $product) {
            $html .= "<li>$product->name</li>";
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
