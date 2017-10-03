<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
