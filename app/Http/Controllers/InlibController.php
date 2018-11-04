<?php

namespace App\Http\Controllers;

use App\Models\Inlib;
use App\Models\Product;
use App\Models\Stff;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Http\Request;

class InlibController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->can('Inlib index')) {
            $inlib = Inlib::orderBy('created_at', 'desc')->paginate(10);
            $product = new Product();
            $staff = new Stff();
            return view('inlib.index', ['product' => $product, 'staff' => $staff->where('user_id', '<>', null), 'inlib' => $inlib]);
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
            $data['enter']= \Auth::user()->name.'( '.\Auth::user()->Staff->name.' )';
            $InlibValidate=new \App\Http\Requests\inlib();
            $validator=Validator::make($data,$InlibValidate->rules());
            if ($validator->fails()){
                abort(500);
               // return $validator->errors();
            }else{
                DB::beginTransaction();
                try{
                    $inlib=Inlib::create($data);
                    Product::where('id',$request->input('product_id'))->increment('inventory',$request->input('number'));
                    Product::where('id',$request->input('product_id'))->increment('inventory_in',$request->input('number'));
                    DB::commit();
                    return $inlib;
                }catch (\Exception $exception){
                    DB::rollBack();
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
    public function edit(Inlib $inlib,Request $request)
    {
        if ($request->isMethod('get')){
            return array_merge($inlib->toArray(),$inlib->Product->toArray());
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

    //page  获取产品所有产品
    public function getProduct(Request $request){
        if ($request->has('id')){
            $num1=$request->input('id');
            $num2=($num1-1)*10;
            $product=Product::orderBy('created_at','desc')->skip($num2)->take(10)->get();
            return $product;
        }else{
            $product=Product::orderBy('created_at','desc')->skip(0)->take(10)->get();
            return $product;
        }
    }

    /*获得员工档案*/
    public function getStaff(Request $request){

        if ($request->has('id')){
            $num1=$request->input('id');
            $num2=($num1-1)*10;
            $staff=Stff::where('user_id','<>',null)->orderBy('created_at','desc')->skip($num2)->take(10)->get();
            return $staff;
        }else{
            $staff=Stff::where('user_id','<>',null)->orderBy('created_at','desc')->skip(0)->take(10)->get();
            return $staff;
        }
    }

    public function details(Inlib $inlib, Request $request)
    {
        if ($request->isMethod('get')){
           return array_merge($inlib->toArray(),$inlib->Product->toArray());
        }else{
            abort(404);
        }
    }
}
