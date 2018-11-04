<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documentary extends Model
{

    protected $fillable=['sn','title','client_id','client_company','staff_id','staff_name','way','evolve','remark','enter'];

    public function getClient()
    {

    }

    public function getStaff()
    {

    }
}
