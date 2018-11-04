<?php

namespace App\Http\Controllers;

use App\Http\Requests\Staff;
use App\Http\Requests\User;
use App\Models\Stff;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->can('User index')) {
            $user = \App\Models\User::orderBy('created_at', 'desc')->paginate(10);
            $staff = new Stff();
            return view('user.index', ['staff' => $staff->where('user_id', null), 'user' => $user]);
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')){
            $data=$request->all();
            $data['last_login_time']=date('Y-m-d H:i:s');
            $data['login_count']=0;
            $data['password']= bcrypt($request->input('password'));
            $data['last_login_ip']=$_SERVER['SERVER_ADDR'];
            $UserValidate=new \App\Http\Requests\User();
            $validator=Validator::make($data,$UserValidate->rules());
            if ($validator->fails()){
                abort(500);
            }else{
                DB::beginTransaction();
                try{
                    $requests=\App\Models\User::create($data);
                    Stff::where('id',$request->input('staff_id'))->update(['user_id'=>$requests['id']]);
                    DB::commit();
                    return $requests;
                }catch (\Exception $exception){
                    DB::rollBack();
                }
            }
        }else{
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Models\User $user,Request $request)
    {
        if ($request->isMethod('get')){
            return $user;
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*这里验证计较麻烦--暂时不做*/
    public function update(\App\Models\User $user,Request $request)
    {
        if ($request->isMethod('put')){
            if (\request('password') !=null){
                $data['password']=bcrypt(\request('password'));
            }else{
                $data['password']=$user['password'];
            }

            $data['name']=\request('name');
            $data['state']=\request('state');
            $data['staff_name']=\request('staff_name');
            if ($request->has('staff_id')){
                $data['staff_id']=\request('staff_id');
                DB::beginTransaction();
                try{
                    $user->update($data);
                    Stff::where('user_id',$user['id'])->update(['user_id'=>null]);
                    Stff::where('id',$data['staff_id'])->update(['user_id'=>$user['id']]);
                    DB::commit();
                    return 'true';
                }catch (\Exception $exception){
                    DB::rollBack();
                }
            }else{
                $user->update($data);
                return 'true';
            }

        }else{
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->isMethod('delete')){
            $idArray=json_decode($request->input('ids'));
            DB::beginTransaction();
            try{
                \App\Models\User::destroy($idArray);
                 Stff::whereIn('user_id',$idArray)->update(['user_id'=>null]);
                DB::commit();
                return 'true';
            }catch (\Exception $exception){
                DB::rollBack();
            }
        }else{
            abort(404);
        }
    }

    /*验证name字段的唯一性*/
    public function checkUnique(Request $request){
        if ($request->isMethod('post')){

            if ($request->has('id')){
                $data['id']=$request->input('id');
                $user=\App\Models\User::find($data['id']);

                if ($user['name'] == $request->input('name')){
                    return 'true';
                }else{
                    $data['name']=$request->input('name');
                    $rules=[
                        'name'=>'unique:users'
                    ];
                    $validator=Validator::make($data,$rules);
                    if($validator->fails()){
                        echo 'false';
                    }else{
                        echo 'true';
                    }
                }

            }else{
                $data['name']=$request->input('name');
                $rules=[
                    'name'=>'unique:users'
                ];
                $validator=Validator::make($data,$rules);
                if($validator->fails()){
                    echo 'false';
                }else{
                    echo 'true';
                }
            }

        }else{
            abort(404);
        }
    }

    /*获得员工档案*/
    public function getStaff(Request $request){

        if ($request->has('id')){
            $num1=$request->input('id');
            $num2=($num1-1)*10;
            $staff=Stff::where('user_id',null)->orderBy('created_at','desc')->skip($num2)->take(10)->get();
            return $staff;
        }else{
            $staff=Stff::where('user_id',null)->orderBy('created_at','desc')->skip(0)->take(10)->get();
            return $staff;
        }
    }
}
