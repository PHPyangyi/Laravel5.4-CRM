<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Outlib;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiptController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Receipt index')) {
            $receipt = Receipt::orderBy('created_at', 'desc')->paginate(10);
            $order = Order::where('pay_state', '未支付');
            return view('receipt.index', ['order' => $order, 'receipt' => $receipt]);
        }else{
            abort(404);
        }
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')){
            $data=$request->all();
            $data['enter']= \Auth::user()->name.'( '.\Auth::user()->Staff->name.' )';
            DB::beginTransaction();
            try{
                $receipt=Receipt::create($data);
                Outlib::where('order_sn',$data['order_sn'])->update(['state'=>'已收款']);
                Order::where('sn',$data['order_sn'])->update(['pay_state'=>'已支付']);
                DB::commit();
                return $receipt;
            }catch (\Exception $exception){
                DB::rollBack();
            }

        }
    }

    public function getOrder(Request $request)
    {
        if ($request->has('id')){
            $num1=$request->input('id');
            $num2=($num1-1)*10;
            $staff=Order::where('pay_state','未支付')->orderBy('created_at','desc')->skip($num2)->take(10)->get();
            return $staff;
        }else{
            $staff=Order::where('pay_state','未支付')->orderBy('created_at','desc')->skip(0)->take(10)->get();
            return $staff;
        }
    }
}
