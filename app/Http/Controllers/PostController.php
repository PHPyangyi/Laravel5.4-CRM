<?php

namespace App\Http\Controllers;

use App\Post;
use Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->can('Post index')) {
            $post = \App\Models\Post::orderBy('created_at', 'desc')->paginate(10);
            return view('posts/index', ['post' => $post]);
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
            $data['name']=$request->input('name');
            $PostValidate=new \App\Http\Requests\Post();
            $validator=Validator::make($data,$PostValidate->rules());
            if ($validator->fails()){
                abort(500);
            }else{
                $requests=\App\Models\Post::create($data);
                if($requests){
                     return $requests;
                 }
            }
        }else{
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Models\Post $post,Request $request)
    {
        if ($request->isMethod('get')){
            return $post;
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Models\Post $post,Request $request)
    {
        if ($request->isMethod('put')){
            $postValidate=new \App\Http\Requests\Post();
            $validator=Validator::make($request->all(),$postValidate->rules());
            if ($validator->fails()){
                abort(500);
            }else{
                if($post->update(\request(['name'])))
                {
                    return 'true';
                }
            }
        }else{
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->isMethod('delete')){
             $idArray=json_decode($request->input('ids'));
             if(\App\Models\Post::destroy($idArray)){
                 return 'true';
             }else{
                 return 'false';
             }
        }else{
            abort(500);
        }
    }

    /*验证name字段的唯一性*/
    public function checkUnique(Request $request){
        if ($request->isMethod('post')){
            $data['name']=$request->input('name');
            $rules=[
                'name'=>'unique:posts'
            ];
            $validator=Validator::make($data,$rules);
            if($validator->fails()){
                echo 'false';
            }else{
                echo 'true';
            }
        }else{
            abort(404);
        }
    }

}
