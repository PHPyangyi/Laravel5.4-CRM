<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductExtend extends Model
{
    protected  $fillable=['details','product_id'];

    public $timestamps = false;
}
