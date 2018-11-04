<?php

namespace App\Http\Controllers;

use App\Http\Requests\Letter;
use App\Models\Stff;
use Validator;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->can('Letter index')) {
            $letter = \App\Models\Letter::orderBy('created_at', 'desc')->where('staff_id', \Auth::id())->orWhere('send_id', \Auth::id())->paginate(10);
            $staff = new Stff();
            return view('letter.index', ['staff' => $staff->where('user_id', '<>', null)->where('user_id', \Auth::id()), 'letter' => $letter]);
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
            $data['sread']='未读';
            $data['send_name']=\Auth::user()->name.'( '.\Auth::user()->Staff->name.' )';
            $data['send_id']=\Auth::id();
            $letterValidate=new Letter();
            $validator=Validator::make($data,$letterValidate->rules());
            if ($validator->fails()){
                abort(500);
            }else{
                $requests=\App\Models\Letter::create($data);
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
    public function edit(\App\Models\Letter $letter,Request $request)
    {
        if ($request->isMethod('get')){
            return $letter;
        }else
        {
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /*获得员工档案*/
    public function getStaff(Request $request){

        if ($request->has('id')){
            $num1=$request->input('id');
            $num2=($num1-1)*10;
            $staff=Stff::where('user_id','<>',null)->where('user_id','<>',\Auth::id())->orderBy('created_at','desc')->skip($num2)->take(10)->get();
            return $staff;
        }else{
            $staff=Stff::where('user_id','<>',null)->where('user_id','<>',\Auth::id())->orderBy('created_at','desc')->skip(0)->take(10)->get();
            return $staff;
        }
    }
}
