<?php

namespace App\Http\Controllers;

use App\Models\Outlib;
use Illuminate\Http\Request;

class OutlibController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Outlib index')) {
            $outlib = Outlib::orderBy('created_at')->paginate(10);
            return view('outlib.index', ['outlib' => $outlib]);
        }else{
            abort(404);
        }
    }

    public function ok(Request $request)
    {
        if($request->isMethod('post')){
            $ids=\request('id');
            $idArray=json_decode($ids);  //array
            Outlib::whereIn('id',$idArray)->update(['state'=>'已出货','clerk'=>\Auth::user()->name.'( '.\Auth::user()->Staff->name.' )','dispose_time'=>date("Y-m-d H:i:s")]);
            $data['date']=date("Y-m-d H:i:s");
            $data['clerk']=\Auth::user()->name.'( '.\Auth::user()->Staff->name.' )';
            return $data;
        }else{
            abort(404);
        }
    }
}
