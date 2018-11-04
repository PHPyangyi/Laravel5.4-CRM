<?php

namespace App\Http\Controllers;

use App\Models\Documentary;
use App\Models\Order;
use App\Models\OrderExtend;
use App\Models\Outlib;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->can('Order index')) {
            $order = Order::orderBy('created_at')->paginate(10);
            $documentary = new Documentary();
            $product = Product::where('inventory', '<>', '0')->get();
            return view('order.index', ['documentary' => $documentary, 'product' => $product, 'order' => $order]);
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
        if ($request->isMethod('post'))
        {
            $data['sn']=date('YmdHis');
            $data['title']=\request('title');
            $data['documentary_id']=\request('documentary_id');
            $data['original']=\request('original');
            $data['pay_state']='未支付';
            $data['enter']=\Auth::user()->name.'( '.\Auth::user()->Staff->name.' )';
            $data['cost']=\request('cost');

            $dataNew['data']=\request('data');
            $dataNew['order_sn']=$data['sn'];
            $dataNew['state']='未处理';
            $newData= json_decode($dataNew['data']);
            DB::beginTransaction();
            try{
                $order=Order::create($data);
                $orderExtend=OrderExtend::create(['order_id'=>$order['id'],'details' => \request('details')]);
                for ($i=0; $i<sizeof($newData); $i++){
                    Outlib::create([
                        'product_id'=>$newData[$i][1],
                        'number'=>$newData[$i][0],
                        'order_sn'=>$dataNew['order_sn'],
                        'state'=>$dataNew['state'],
                        'enter'=>\Auth::user()->name.'( '.\Auth::user()->Staff->name.' )',
                    ]);
                    Product::where('id',$newData[$i][1])->decrement('inventory',$newData[$i][0]);
                    Product::where('id',$newData[$i][1])->increment('inventory_out',$newData[$i][0]);
                }
                DB::commit();
                return $order;
            }catch (\Exception $exception){
                DB::rollBack();
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
    public function edit(Order $order, Request $request)
    {
        if ($request->isMethod('get')){
            $dataOne=$order;
            $dataExend=$dataOne->orderExtend;
            $dataDoucmentary=$order->documentary;

            $data['sn']=$dataOne['sn'];
            $data['title']=$dataOne['title'];
            $data['original']=$dataOne['original'];
            $data['cost']=$dataOne['cost'];
            $data['pay_state']=$dataOne['pay_state'];
            $data['enter']=$dataOne['enter'];
            $data['create_time']=$dataOne['created_at'];
            $data['details']=$dataExend['details'];
            $data['client_company']=$dataDoucmentary['client_company'];
            $data['staff_name']=$dataDoucmentary['staff_name'];

            $productData=$order->outlib;
            $OutlibId=[];
            for ($i=0; $i<sizeof($productData); $i++){
                $OutlibId[$i]=$productData[$i]['id'];
            }
            $test=$OutlibId;
            for ($i=0 ; $i < count($test); $i++){
                $outlib=Outlib::find($test[$i]);
                $yang[$i]['sn']= $outlib->product->sn;
                $yang[$i]['state']=$outlib->state;
                $yang[$i]['name']= $outlib->product->name;
                $yang[$i]['sell_price']= $outlib->product->sell_price;
                $yang[$i]['number']= $outlib->number;
                $yang[$i]['dispose_time']= $outlib->dispose_time;
            }

            return     json_encode( $yang) .'@@'. json_encode($data) ;



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

    /*获得销售订单*/
    public function getDocumentary(Request $request)
    {
        if ($request->has('id')){
            $num1=$request->input('id');
            $num2=($num1-1)*3;
            $documentary=Documentary::orderBy('created_at','desc')->skip($num2)->take(3)->get();
            return $documentary;
        }else{
            $documentary=Documentary::orderBy('created_at','desc')->skip(0)->take(3)->get();
            return $documentary;
        }
    }
}
