<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Downline extends Model
{
    
	protected $fillable = ['name','markup','customer_id'];

   	// Relasi One to One #relasi8
   	public function customer()
   	{
   		return $this->belongsTo('App\Customer');
   	}
}
