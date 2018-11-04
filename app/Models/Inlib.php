<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inlib extends Model
{
    protected $fillable=['staff_id','staff_name','number','product_id','product_name','enter','mode_explain','mode'];

    public function Staff()
    {
        return $this->belongsTo(\App\Models\Stff::class,'staff_id');
    }

    public function Product()
    {
        return $this->belongsTo(\App\Models\Product::class,'product_id');
    }

}
