<?php
/**
 * Created by PhpStorm.
 * User: 阳毅
 * Date: 2018/10/29
 * Time: 22:25
 */

namespace App\Http\Controllers;


class IndexController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Index index')) {
            return view('index.index');
        }else{
            abort(404);
        }
    }
}
