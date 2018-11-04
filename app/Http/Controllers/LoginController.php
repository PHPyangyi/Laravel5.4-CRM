<?php
/**
 * Created by PhpStorm.
 * User: 阳毅
 * Date: 2018/10/26
 * Time: 10:19
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')){
            $rules=[
                'name'=>'required',
                'password'=>'required|min:8|max:16',
                'is_remember' => '',
                'captcha'=>'required|captcha',
            ];
            $messages=[
                'name.required'=>'账号不得为空！',
                'password.required'=>'密码不得为空！',
                'password.min'=>'密码长度不得小于8位！',
                'password.max'=>'密码长度不得大于16位！',
                'captcha.required'=>'验证码不得为空！',
                'captcha.captcha'=>'验证码不正确！',
            ];
            $validator=Validator::make(\request(['name','password','captcha']),$rules,$messages);
            if ($validator->fails()) {
                return redirect('/login')
                    ->withErrors($validator)
                    ->withInput();
            }else{
                $user = \request(['name', 'password']);
                $remember = boolval(\request('is_remember'));
                if (true == \Auth::attempt($user,$remember)){
                    return redirect('/');
                }
                return Redirect::back()->withErrors('用户名密码错误');
            }

            return $request->all();
        }else{
            abort(404);
        }
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/login');
    }
}
