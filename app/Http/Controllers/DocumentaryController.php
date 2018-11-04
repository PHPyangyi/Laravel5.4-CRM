<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Documentary;
use App\Models\Stff;
use Illuminate\Http\Request;
use Validator;

class DocumentaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->can('Documentary index')) {
            $documentary = Documentary::orderBy('created_at', 'desc')->paginate(10);
            $staff = new Stff();
            $client = new Client();
            return view('documentary.index', ['staff' => $staff, 'client' => $client, 'documentary' => $documentary]);
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
           $data['sn']=date('YmdHis');
            $data['enter']= \Auth::user()->name.'( '.\Auth::user()->Staff->name.' )';
            $DocumentaryValidate=new \App\Http\Requests\Documentary();
            $validator=Validator::make($data,$DocumentaryValidate->rules());
            if ($validator->fails()){
                abort(500);
            }else{
                $requests=\App\Models\Documentary::create($data);
                if($requests){
                    return $requests;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Models\Documentary $documentary,Request $request)
    {
        if ($request->isMethod('get')){
            return $documentary;
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
    public function update(\App\Models\Documentary $documentary,Request $request)
    {
        if ($request->isMethod('put')){

            $rules= [
                'title'=>'required|max:20|min:2',
                'client_id'=>'required',
                'staff_id'=>'required',
                'staff_name'=>'required|max:20|min:2',
                'way'=>'required',
                'evolve'=>'required',
                'remark'=>'required',
                'client_company'=>'required',
            ];

            $validator=Validator::make($request->all(),$rules);
            if ($validator->fails()){
             //   abort(500);
                 return $validator->errors();
            }else{
                if($documentary->update($request->all()))
                {
                    return 'true';
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
            if(\App\Models\Documentary::destroy($idArray)){
                return 'true';
            }else{
                return 'false';
            }
        }else{
            abort(500);
        }
    }


    /*获得员工档案*/
    public function getStaff(Request $request){

        if ($request->has('id')){
            $num1=$request->input('id');
            $num2=($num1-1)*10;
            $staff=Stff::orderBy('created_at','desc')->skip($num2)->take(10)->get();
            return $staff;
        }else{
            $staff=Stff::orderBy('created_at','desc')->skip(0)->take(10)->get();
            return $staff;
        }
    }

    /*获得关联公司*/
    public function getClient(Request $request){
        if ($request->has('id')){
            $num1=$request->input('id');
            $num2=($num1-1)*10;
            $client=Client::orderBy('created_at','desc')->skip($num2)->take(10)->get();
            return $client;
        }else{
            $client=Client::orderBy('created_at','desc')->skip(0)->take(10)->get();
            return $client;
        }
    }
}
