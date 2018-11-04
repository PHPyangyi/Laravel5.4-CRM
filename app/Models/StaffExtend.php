<?php
/**
 * Created by PhpStorm.
 * User: 阳毅
 * Date: 2018/10/22
 * Time: 16:47
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class StaffExtend extends Model
{
   //
    // protected  $table='staff_extends';
    protected  $fillable=['staff_id','health','specialty','registered'
    ,'registered_address','graduate_date','graduate_college','intro','details'
    ];

    public $timestamps = false;
}