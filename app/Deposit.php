<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = ['supplier_id','category_id','jumlah','tgl_beli'];

    // Relasi One To Many #relasi1
    public function supplier()
    {
    	return $this->belongsTo('App\Supplier');
    }


    // Total Deposit
    public function getTotalDepositsAttribute()
    {
        return $this->sum('jumlah');
    }

    // Relasi One To Many #relasi11
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
