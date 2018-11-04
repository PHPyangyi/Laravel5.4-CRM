<?php
/**
 * Created by PhpStorm.
 * User: 阳毅
 * Date: 2018/10/26
 * Time: 10:28
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }
}
