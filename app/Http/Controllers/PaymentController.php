<?php

namespace App\Http\Controllers;

use App\Models\Inlib;
use App\Models\Product;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Payment index')) {
            $inlib = Inlib::orderBy('created_at', 'desc')->paginate(10);
            return view('payment.index', ['inlib' => $inlib]);
        }else{
            abort(404);
        }
    }


}
