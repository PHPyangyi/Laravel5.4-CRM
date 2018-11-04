<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product;
use App\Models\ProductExtend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->can('Product index')) {
            $product = \App\Models\Product::orderBy('created_at', 'desc')->paginate(10);
            return view('product.index', ['product' => $product]);
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
            $productData=$request->only([
                'name',
                'sn',
                'pro_price',
                'sell_price',
                'unit',
                'type',
                'inventory_alarm'
            ]);
            $productExtendData=$request->only([
                'details'
            ]);
            $ProductValidator=new Product();
            $validator=Validator::make($productData,$ProductValidator->rules());
            if ($validator->fails()){
                //abort(500);  /*这里返回500 有问题*/
                return $validator->errors();
            }else{
                DB::beginTransaction();
                try{
                    $product=\App\Models\Product::create($productData);
                    $productExtendData['product_id']=$product['id'];
                    ProductExtend::create($productExtendData);
                    DB::commit();
                    return $product;
                }catch(\Exception $exception){
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
    public function edit(\App\Models\Product $product,Request $request)
    {
        if ($request->isMethod('get')){
            return array_merge($product->toArray(),$product->ProductExtend->toArray());
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
    public function update(\App\Models\Product $product,Request $request)
    {
        if ($request->isMethod('put')){
            $productData=$request->only([
                'name',
                'sn',
                'pro_price',
                'sell_price',
                'unit',
                'type',
                'inventory_alarm'
            ]);
            $productExtendData=$request->only([
                'details'
            ]);

            $productValidator=new Product();
            $validator=Validator::make($productData,$productValidator->rules($product->id));
            if ($validator->fails()){
                abort(500);
            }else{
                DB::beginTransaction();
                try{
                    $product->update($productData);
                    $product->ProductExtend()->update($productExtendData);
                    DB::commit();
                    return 'true';
                }catch (\Exception $exception){
                    DB::rollBack();
                }
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
            DB::beginTransaction();
            try{
                \App\Models\Product::destroy($idArray);
                ProductExtend::whereIn('product_id',$idArray)->delete();
                DB::commit();
                return 'true';
            }catch (\Exception $exception){
                DB::rollBack();
            }
        }else{
            abort(404);
        }
    }

    public function checkUnique(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->has('id')){
                $data['id']=$request->input('id');
                $product=\App\Models\Product::find($data['id']);
                if ($product['sn'] == $request->input('sn')){
                    return 'true';
                }else{
                    $data['sn']=$request->input('sn');
                    $rules=[
                        'sn'=>'unique:products'
                    ];
                    $validator=Validator::make($data,$rules);
                    if($validator->fails()){
                        echo 'false';
                    }else{
                        echo 'true';
                    }
                }
            }else{
                $data['sn']=$request->input('sn');
                $rules=[
                    'sn'=>'unique:products'
                ];
                $validator=Validator::make($data,$rules);
                if($validator->fails()){
                    echo 'false';
                }else{
                    echo 'true';
                }
            }
        }else{
            abort(404);
        }
    }
}
