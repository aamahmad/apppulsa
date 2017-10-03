<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name','no_hp'];

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
}
