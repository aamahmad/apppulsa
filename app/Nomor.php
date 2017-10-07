<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nomor extends Model
{
    protected $fillable = ['customer_id','nomor','keterangan'];
}
