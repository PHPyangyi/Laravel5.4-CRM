<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected  $fillable=['sn','title','documentary_id','original'
    ,'cost','pay_state','enter'
    ];

    public function orderExtend()
    {
        return $this->hasOne(\App\Models\OrderExtend::class,'order_id');
    }

    public function documentary()
    {
        return $this->belongsTo(\App\Models\Documentary::class,'documentary_id');
    }

    public function outlib()
    {
        return $this->hasMany(\App\Models\Outlib::class,'order_sn','sn');
    }
}
