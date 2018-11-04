<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outlib extends Model
{
    protected $fillable=['product_id','order_sn','number','state','clerk','enter','dispose_time'];

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class,'product_id','id');
    }
}
