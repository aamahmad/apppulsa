<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = ['product_id','harga_dasar','harga_jual'];

   	// Relasi One to One #relasi4
   	public function product()
   	{
   		return $this->belongsTo('App\Product');
   	}

   	// Relasi One To Many #Relasi8
   	public function sells()
   	{
   		return $this->hasMany('App\Sell');
   	}
}
