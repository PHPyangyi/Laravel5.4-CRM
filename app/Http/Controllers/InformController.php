<?php

namespace App\Http\Controllers;

use App\Models\Inform;
use Illuminate\Http\Request;
use Validator;

class InformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->can('Inform index')) {
            $infrom = Inform::orderBy('created_at', 'desc')->paginate(10);
            return view('inform.index', ['inform' => $infrom]);
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
            $data['staff_name']=\Auth::user()->name.'( '.\Auth::user()->Staff->name.' )';
            $data['staff_id']=\Auth::id();
            $InformValidate=new \App\Http\Requests\Inform();
            $validator=Validator::make($data,$InformValidate->rules());
            if ($validator->fails()){
                abort(500);
               // return $validator->errors();
            }else{
                if($req=Inform::create($data)){
                    return $req;
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
    public function edit(\App\Models\Inform $inform,Request $request)
    {
        if ($request->isMethod('get')){
            return $inform;
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
    public function update(\App\Models\Inform $inform,Request $request)
    {
        if ($request->isMethod('put')){
            $InformValidate=new \App\Http\Requests\Inform();
            $validator=Validator::make($request->all(),$InformValidate->rules());
            if ($validator->fails()){
               // abort(500);
                 return $validator->errors();
            }else{
                $inform->update($request->all());
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
            if(\App\Models\Inform::destroy($idArray)){
                return 'true';
            }else{
                return 'false';
            }
        }else{
            abort(500);
        }
    }

}
