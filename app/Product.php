<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','satuan','category_id'];

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

    

   
}
