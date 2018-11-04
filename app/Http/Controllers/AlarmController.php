<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AlarmController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Alarm index')){
            $product=Product::orderBy('created_at')->whereRaw('inventory<inventory_alarm')->paginate(10);
            return view('alarm.index',['product'=>$product]);
        }else{
            abort(404);
        }

    }
}
