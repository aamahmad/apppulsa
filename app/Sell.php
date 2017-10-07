<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $fillable = ['customer_id','product_id','harga_retail','harga_awal','qty','harga_barang','tgl','sub_total'];

    // relasi One To Many Relasi6 (has many through #Relasi12)
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    // Relasi One to Many Relasi7
    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }

    // Relasi One To Many #Relasi8
    public function price()
    {
        return $this->belongsTo('App\Price');
    }


    // Relasi One To Many #Relasi10
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    
}
