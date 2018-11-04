<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\WorkStage;
use App\Models\Stff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlloController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Allo index')) {
            $staff = new Stff();
            $work = Work::where('allo_id', \Auth::id())->where('staff_id', '<>', \Auth::id())->orderBy('created_at', 'desc')->paginate(10);
            return view('allo.index', ['work' => $work, 'staff' => $staff->where('user_id', '<>', null)->where('user_id', '<>', \Auth::id())]);
        }else{
            abort(404);
        }
    }

    /*获得员工档案*/
    public function getStaff(Request $request){

        if ($request->has('id')){
            $num1=$request->input('id');
            $num2=($num1-1)*10;
            $staff=Stff::where('user_id','<>',null)->where('user_id','<>',\Auth::id())->orderBy('created_at','desc')->skip($num2)->take(10)->get();
            return $staff;
        }else{
            $staff=Stff::where('user_id','<>',null)->where('user_id','<>',\Auth::id())->orderBy('created_at','desc')->skip(0)->take(10)->get();
            return $staff;
        }
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')){
            $data=$request->all();
            $data['state']='进行中';
            $data['stage']='创建工作计划';
            $data['allo_name']=\Auth::user()->name.'( '.\Auth::user()->Staff->name.' )';
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
}
