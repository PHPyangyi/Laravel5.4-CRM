<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stff extends Model
{
    protected $table='staffs';
    protected $fillable=['user_id','name','number','gender','type','post','id_card'
    ,'tel','nation','marital_status','entry_status','entry_date','dimission_date'
    ,'politics_statu','education'
    ];

    public function StaffExtends()
    {
        return $this->hasOne('\App\Models\StaffExtend','staff_id','id');
    }
}
