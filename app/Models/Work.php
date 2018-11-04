<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable=['title','type','stage','state'
    ,'start_date','end_date','staff_id','staff_name','allo_id','allo_name'
    ];

    public function WorkStage()
    {
        return $this->hasMany(\App\Models\WorkStage::class,'work_id');
    }
}
