<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Validator;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->can('Client index')) {
            $client = Client::orderBy('created_at', 'desc')->paginate(10);
            return view('client.index', ['client' => $client]);
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
            $data['enter']=\Auth::user()->name.'( '.\Auth::user()->Staff->name.' )';
            $clientValidator=new \App\Http\Requests\Client();
            $validator=Validator::make($data,$clientValidator->rules());
            if ($validator->fails()){
                abort(500);
            }else{
                $client=Client::create($data);
                return $client;
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
    public function edit(Client $client, Request $request)
    {
        if ($request->isMethod('get')){
            return $client;
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
    public function update(Client $client,Request $request)
    {
        if ($request->isMethod('put')){
            $data=$request->all();
            $data['enter']=\Auth::user()->name.'( '.\Auth::user()->Staff->name.' )';
            $clientValidator=new \App\Http\Requests\Client();
            $validator=Validator::make($data,$clientValidator->rules());
            if ($validator->fails()){
                abort(500);
            }else{
                 $client->update($data);
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
            if(\App\Models\Client::destroy($idArray)){
                return 'true';
            }else{
                return 'false';
            }
        }else{
            abort(500);
        }
    }
}
