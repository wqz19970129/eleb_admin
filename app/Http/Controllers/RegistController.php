<?php

namespace App\Http\Controllers;

use App\Regist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistController extends Controller
{
    //
    public function index(){
        $rows=Regist::all();
        //dd($rows);
        return view('regists.index',compact('rows'));
    }
    public function show(Regist $regist){
        return view('regists.show',compact('regist'));
    }
    public function edit(Request $request,Regist $regist){
        $id=$regist->id;
        //var_dump($id);die;
        if($regist->status==1){
            DB::table('regists')->where('id',$id)->update(['status'=>0]);
            return redirect()->route('regist.index');
        }else{
            DB::table('regists')->where('id',$id)->update(['status'=>1]);
            return redirect()->route('regist.index');
        }
    }
}
