<?php

namespace App\Http\Controllers;

use App\Models\Inlib;
use Illuminate\Http\Request;

class ProcureController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Procure index')) {
            $inlib = Inlib::orderBy('created_at', 'desc')->where('mode', '采购')->paginate(10);
            return view('procure.index', ['inlib' => $inlib]);
        }else{
            abort(404);
        }
    }

    public function details(Inlib $inlib,Request $request )
    {
        if ($request->isMethod('get')){
            return array_merge($inlib->toArray(),$inlib->Product->toArray());
        }else{
            abort(404);
        }
    }
}
