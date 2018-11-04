<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\StaffExtend;
use App\Models\Stff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->can('Staff index')) {
            $staff = Stff::orderBy('created_at', 'desc')->paginate(10);
            $post = Post::all();
            return view('staff.index', ['post' => $post, 'staff' => $staff]);
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
                $data=$this->data($request);
                $StaffValidate=new \App\Http\Requests\Staff();
                $validator=Validator::make($data,$StaffValidate->rules());
                if ($validator->fails()){
                    abort(500);
                }else{
                    /*使用事务处理*/
                    DB::beginTransaction();
                    try{
                        $requests=Stff::create($data);
                        $NewData['staff_id']=$requests['id'];
                        $newStaffExtendData=array_merge($data,$NewData);
                        StaffExtend::create($newStaffExtendData);
                        DB::commit();
                        return $requests;
                    }catch (\Exception $exception){
                        DB::rollback();
                    }
                }

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Models\Stff $staff,Request $request)
    {
        if ($request->isMethod('get')){
             return array_merge($staff->toArray(),$staff->StaffExtends->toArray());
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
    public function update(\App\Models\Stff $staff,Request $request)
    {
        if ($request->isMethod('put')){
            /*没办法 这个不能封装，有bug*/
            $staffExtendData=$request->except([
                'id',
                'user_id',
                'name',
                'number',
                'gender',
                'post',
                'type',
                'id_card',
                'tel',
                'nation',
                'marital_status',
                'entry_status',
                'entry_date',
                'dimission_date',
                'politics_statu',
                'education'
            ]);
            $data=$this->data($request);
            $StaffValidate=new \App\Http\Requests\Staff();
            $validator=Validator::make($data,$StaffValidate->rules($staff->id));
            if ($validator->fails()){
                abort(500);
            }else{
                DB::beginTransaction();
                try{
                    $staff->update($data);
                    $staff->StaffExtends()->update($staffExtendData);
                    DB::commit();
                    return 'true';
                }catch (\Exception $exception){
                    DB::rollback();
                }
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
                StaffExtend::whereIn('staff_id',$idArray)->delete();
                Stff::destroy($idArray);
                DB::commit();
                return 'true';
            }catch (\Exception $exception){
                DB::rollback();
            }
        }else{
            abort(500);
        }
    }

    /*验证数据的唯一性 number tel id_card 包括数据修改的验证*/
    public function checkUnique(Request $request){
        if ($request->isMethod('post')){
            if ($request->has('id')){
                $data['id']=$request->input('id');
                $staff=Stff::find($data['id']);
                if ($request->has('number')){
                    if ($staff['number'] == $request->input('number')){
                        return 'true';
                    }else{
                        $data['number']=$request->input('number');
                        $rules=[
                            'number'=>'unique:staffs'
                        ];
                        $validator=Validator::make($data,$rules);
                        if($validator->fails()){
                            echo 'false';
                        }else{
                            echo 'true';
                        }
                    }

                }elseif ($request->has('tel')){
                    if ($staff['tel'] == $request->input('tel')){
                        return 'true';
                    }else{
                        $data['tel']=$request->input('tel');
                        $rules=[
                            'tel'=>'unique:staffs'
                        ];
                        $validator=Validator::make($data,$rules);
                        if($validator->fails()){
                            echo 'false';
                        }else{
                            echo 'true';
                        }
                    }
                }elseif ($request->has('id_card')){
                    if ($staff['id_card'] == $request->input('id_card')){
                        return 'true';
                    }else{
                        $data['id_card']=$request->input('id_card');
                        $rules=[
                            'id_card'=>'unique:staffs'
                        ];
                        $validator=Validator::make($data,$rules);
                        if($validator->fails()){
                            echo 'false';
                        }else{
                            echo 'true';
                        }
                    }
                }

            }else{
                if ($request->has('number')){
                    $data['number']=$request->input('number');
                    $rules=[
                        'number'=>'unique:staffs'
                    ];
                    $validator=Validator::make($data,$rules);
                    if($validator->fails()){
                        echo 'false';
                    }else{
                        echo 'true';
                    }
                }elseif ($request->has('tel')){
                    $data['tel']=$request->input('tel');
                    $rules=[
                        'tel'=>'unique:staffs'
                    ];
                    $validator=Validator::make($data,$rules);
                    if($validator->fails()){
                        echo 'false';
                    }else{
                        echo 'true';
                    }
                }elseif ($request->has('id_card')){
                    $data['id_card']=$request->input('id_card');
                    $rules=[
                        'id_card'=>'unique:staffs'
                    ];
                    $validator=Validator::make($data,$rules);
                    if($validator->fails()){
                        echo 'false';
                    }else{
                        echo 'true';
                    }
                }
            }
        }else{
            abort(404);
        }

    }

    /*ajax提交过来的新增和修改的数据*/
    private function data($request)
    {
        $staffData=$request->only([
            'user_id',
            'name',
            'number',
            'gender',
            'post',
            'type',
            'id_card',
            'tel',
            'nation',
            'marital_status',
            'entry_status',
            'entry_date',
            'dimission_date',
            'politics_statu',
            'education'
        ]);
        $staffExtendData=$request->except([
            'user_id',
            'name',
            'number',
            'gender',
            'post',
            'type',
            'id_card',
            'tel',
            'nation',
            'marital_status',
            'entry_status',
            'entry_date',
            'dimission_date',
            'politics_statu',
            'education'
        ]);
       return  $data=array_merge($staffData,$staffExtendData);
    }
}
