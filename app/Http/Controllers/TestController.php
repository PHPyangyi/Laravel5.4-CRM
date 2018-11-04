<?php
/**
 * Created by PhpStorm.
 * User: 阳毅
 * Date: 2018/10/21
 * Time: 14:10
 */

namespace App\Http\Controllers;

use App\Http\Requests\Post;
use Validator;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index()
    {
        return view('test.edit');
    }

    public function edit(\App\Models\Post $post,Request $request)
    {
        return view('test.edit',compact('post'));
    }
    public function update(\App\Models\Post $post)
    {
        echo '123';
    }
}
