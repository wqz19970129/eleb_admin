<?php

namespace App\Http\Controllers;

use App\Prize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrizeController extends Controller
{
    //
    public function index(){
        $prizes=DB::table('prizes')->get();
        return view('prizes.index',compact('prizes'));
    }
    public function create(Request $request){
        $id=$request->event;
        $row=DB::table('events')->where('id',$id)->first();
        return view('prizes.create',compact('row'));
    }
    public function store(Request $request){
        $this->validate($request,
            [
                'events_id'=>'required',
                'name'=>'required',
                'description'=>'required',
                //'member_id'=>'required',

            ],
            [
                'events_id.required'=>'标题名不为空',
                'name.required'=>'内容不为空',
                'description.required'=>'开始时间不为空',
                //'member_id.required'=>'结束不为空',
            ]
        );
        Prize::create(
            [ 'events_id'=>$request->events_id,
                'name'=>$request->name,
                'description'=>$request->description,
                'member_id'=>1,

            ]);
        session()->flash('success','添加成功');
        return redirect()->route('prize.index');
    }
}
