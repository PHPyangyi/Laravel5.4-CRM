<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('User_Role')) {
            $user = \App\Models\User::orderBy('created_at', 'desc')->paginate(10);
            return view('user_role.index', ['user' => $user]);
        }else{
            abort(404);
        }
    }
    public function create($id)
    {
        $user=User::find($id);
        $role=Role::all();
        return view('user_role.create',compact('role','user'));
    }
    public function add(Request $request)
    {
       if ($request->isMethod('post')){
          $user=User::find(\request('user_id'));
           $user->assignRole(\request('role_id'));
           return redirect('/user_role');
       }else{
           abort(404);
       }
    }
}
