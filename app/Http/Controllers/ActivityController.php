<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //
    public function index(){
        $activitys=Activity::all();
        return view('activitys.index',compact('activitys'));
    }
    public function create(){
      return view('activitys.create');
    }
    public function store(Request $request){
        $this->validate($request,
            [
                'name'=>'required',
                'detail'=>'required',
                'start'=>'required',
                'end'=>'required',
            ],
        [
            'name.required'=>'活动不为空',
            'detail.required'=>'详情不为空',
            'start.required'=>'开始时间不为空',
            'end.required'=>'结束时间不为空',
        ]
            );
        $a=explode('-',$request->start);
        $str=implode($a);
        $int=intval($str);

        $a1=explode('-',$request->end);
        $str1=implode($a1);
        $int1=intval($str1);
        if($int>$int1){
            session()->flash('danger','修改失败,活动时间不正确');
            return back()->withInput();
        }else{
            Activity::create(
                ['name'=>$request->name,'detail'=>$request->detail,'start'=>$request->start,'end'=>$request->end]
            );
            session()->flash('success','添加成功');
            return redirect()->route('activity.index');
        }

    }
    public function edit(Activity $activity){
        return view('activitys.edit',compact('activity'));
    }
    public function update(Activity $activity,Request $request){
        $this->validate($request,
            [
                'name'=>'required',
                'detail'=>'required',
                'start'=>'required',
                'end'=>'required',
            ],
            [
                'name.required'=>'活动不为空',
                'detail.required'=>'详情不为空',
                'start.required'=>'开始时间不为空',
                'end.required'=>'结束时间不为空',
            ]
            );
        $a=explode('-',$request->start);
        $str=implode($a);
        $int=intval($str);

        $a1=explode('-',$request->end);
        $str1=implode($a1);
        $int1=intval($str1);
        if($int>$int1){
            session()->flash('danger','修改失败,活动时间不正确');
            return back()->withInput();
        }else{
            $activity->update(
                ['name'=>$request->name,'detail'=>$request->detail,'start'=>$request->start,'end'=>$request->end]
            );
            session()->flash('success','修改成功');
            return redirect()->route('activity.index');
        }

        }
    public function destroy(Activity $activity){
        $activity->delete();
        echo 'success';
    }

    public function show(Activity $activity){
        return view('activitys.show',compact('activity'));
    }
}
