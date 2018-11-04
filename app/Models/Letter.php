<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected  $fillable=['message','staff_id','staff_name','send_name','send_id','sread'];
}
