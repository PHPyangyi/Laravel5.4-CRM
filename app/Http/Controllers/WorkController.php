<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\WorkStage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Work index')) {
            $work = Work::where('staff_id', \Auth::id())->orderBy('created_at', 'desc')->paginate(10);
            return view('work.index', ['work' => $work]);
        }else{
            abort(404);
        }
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')){
            $data=$request->all();
            $data['state']='进行中';
            $data['stage']='创建工作计划';
            $data['staff_name']=\Auth::user()->name.'( '.\Auth::user()->Staff->name.' )';
            $data['allo_name']=\Auth::user()->name.'( '.\Auth::user()->Staff->name.' )';
            $data['staff_id']=\Auth::id();
            $data['allo_id']=\Auth::id();
            //添加次计划的第一条初始阶段
            $WorkStageData['title']='创建工作任务';
            DB::beginTransaction();
            try{
                $work=Work::create($data);
                $WorkStageData['work_id']=$work['id'];
                WorkStage::create($WorkStageData);
                Db::commit();
                return $work;
            }catch (\Exception $exception){
                DB::rollBack();
            }
        }else{
            abort(404);
        }
    }

    public function edit(Work $work, Request $request)
    {
        if ($request->isMethod('get')){
            return  json_encode($work).'@@'.json_encode($work->WorkStage);
        }else{
            abort(404);
        }
    }

    public function extend(Request $request)
    {
        if ($request->isMethod('post')){
            WorkStage::create(['work_id'=>\request('work_id'),'title'=>\request('title')]);
            Work::where('id',\request('work_id'))->update(['stage'=>\request('title')]);
            return 'true';
        }else{
            abort(404);
        }
    }

    public function setOk(Request $request)
    {
        if ($request->isMethod('post')){
            Work::where('id',\request('id'))->update(['state'=>'已完成']);
        }else{
            abort(404);
        }
    }

   public function delete(Request $request)
   {
       if ($request->isMethod('delete')){
           $ids=\request('id');
           $idArray=json_decode($ids);  //array
           $id=implode(',',$idArray);
           DB::beginTransaction();
           try{
                Work::whereIn('id',$idArray)->delete();
                WorkStage::whereIn('work_id',$idArray)->delete();
                DB::commit();
                return 'true';
           }catch (\Exception $exception){
               DB::rollBack();
           }
       }else{
           abort(404);
       }
   }

}
