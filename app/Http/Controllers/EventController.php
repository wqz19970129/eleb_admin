<?php

namespace App\Http\Controllers;

use App\Event;
use App\Eventmember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    //
    public function index(){
        $events=DB::table('events')->get();
        foreach ($events as $event){
            $count=DB::select('select count(*) as count from eventmembers where  events_id = ?',[$event->id]);
            $event->bao=$count[0]->count;
        }
        return view('events.index',compact('events'));
    }
    public function create(){
        return view('events.create');
    }
    public function store(Request $request){
        $this->validate($request,
            [
                'title'=>'required',
                'content'=>'required',
                'signup_start'=>'required',
                'signup_end'=>'required',
                'prize_date'=>'required',
                'signup_num'=>'required',
                'is_prize'=>'required',
            ],
            [
                'title.required'=>'标题名不为空',
                'content.required'=>'内容不为空',
                'signup_start.required'=>'开始时间不为空',
                'signup_end.required'=>'结束不为空',
                'prize_date.required'=>'开奖时间不为空',
                'signup_num.required'=>'报名人数不为空',
                'is_prize.required'=>'是否开奖不为空',
            ]
        );
        Event::create(
            [ 'title'=>$request->title,
                'content'=>$request->content,
                'signup_start'=>$request->signup_start,
                'signup_end'=>$request->signup_end,
                'prize_date'=>$request->prize_date,
                'signup_num'=>$request->signup_num,
                'is_prize'=>$request->is_prize,
            ]);
        session()->flash('success','添加成功');
        return redirect()->route('events.index');
    }
    public function edit(Event $event){
        return view('events.edit',compact('event'));
    }
    public function update(Request $request,Event $event){
        $this->validate($request,
            [
                'title'=>'required',
                'content'=>'required',
                'signup_start'=>'required',
                'signup_end'=>'required',
                'prize_date'=>'required',
                'signup_num'=>'required',
                'is_prize'=>'required',
            ],
            [
                'title.required'=>'标题名不为空',
                'content.required'=>'内容不为空',
                'signup_start.required'=>'开始时间不为空',
                'signup_end.required'=>'结束不为空',
                'prize_date.required'=>'开奖时间不为空',
                'signup_num.required'=>'报名人数不为空',
                'is_prize.required'=>'是否开奖不为空',
            ]
        );
        $event->update(
            [ 'title'=>$request->title,
                'content'=>$request->content,
                'signup_start'=>$request->signup_start,
                'signup_end'=>$request->signup_end,
                'prize_date'=>$request->prize_date,
                'signup_num'=>$request->signup_num,
                'is_prize'=>$request->is_prize,
            ]);
        session()->flash('success','添加成功');
        return redirect()->route('events.index',compact('event'));
    }
    public function destroy(Event $event){
        $event->delete();
        echo'success';
    }
    //抽奖
    public function getone(Request $request,Event $event){
        $id=$request->event1;
        $prize=DB::table('prizes')->where('events_id',$id)->first();
        if(!$prize){
            session()->flash('danger','还未添加奖品');
            return redirect()->route('events.index');
        }
        $a=$request->event;
        //dd($a);
        $bao= DB::select("select count(*) as count from eventmembers where events_id = '{$id}'");
        if($bao[0]->count<$a){
            session()->flash('danger','报名人数不够');
            return redirect()->route('events.index');
        }
        //dd($id);

        //dd($a);
        //$rows=DB::select("select member_id from eventmembers where events_id='{$id}'");

        //$a=shuffle($rows);
        $values=Eventmember::where('events_id',$id)->get();
        //dd($row);
        //$valuess=$values->shuffle();
        $ids=DB::table('eventmembers')->where('events_id',$id)->pluck('member_id');
        foreach ($values as $v){
            //dd($ids);
            $f=$ids->shuffle();
            //dd($f);
            $a=$f->pop();
            //var_dump($a);
            //dd($a,$f);
            //$di=$v->events_id;
            DB::table('prizes')->where('id',$v->id)->update(['member_id'=>$a]);
        }
        //DB::update("update prizes set member_id='{$a}'where events_id ='{$di}'");
        //
        //DB::table('events')->where('id',$id)->update(['is_prize'=>'是']);
        return redirect()->route('events.index');
    }
    //查看结果
        public function getall(Request $request){
            $id=$request->event;
        /*  $rows=DB::table('eventmembers')->where('events_id',$id)->get();
          //dd($rows);
            foreach($rows as $row){
                DB::table('ploples')->where('id',$row->member_id)->first();

            }*/
             $events=DB::select("select a.name as k,h.title,b.name from ploples as a 
LEFT JOIN prizes as b ON b.member_id=a.id
LEFT JOIN events as h on b.events_id=h.id WHERE `events_id`='{$id}'
");
            //dd($events);
            return view('events.getall',compact('events'));
        }
}
