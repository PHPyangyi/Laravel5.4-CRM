<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderExtend extends Model
{
    public $timestamps = false;
    protected $fillable=['order_id','details'];
}
