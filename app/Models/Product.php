<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'name',
        'sn',
        'pro_price',
        'sell_price',
        'unit',
        'type',
        'inventory_alarm'
    ];

    public function ProductExtend()
    {
        return $this->hasOne(\App\Models\ProductExtend::class,'product_id');
    }

    public function Inlib()
    {
        return $this->hasMany(\App\Models\Inlib::class,'product_id');
    }
}
