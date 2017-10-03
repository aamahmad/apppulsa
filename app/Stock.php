<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['supplier_id','product_id','jumlah','tgl_beli'];

    // Relasi One To Many #relasi2
    public function supplier()
    {
    	return $this->belongsTo('App\Supplier');
    }

     // relasi one to many #relasi3
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
