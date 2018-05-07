<?php

namespace App\Http\Controllers;

use App\Email;
use App\Plople;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlopleController extends Controller
{
    //
    public function __construct()
    {        //出这个之外的都要验证权限
        $this->middleware('auth',[
            'except'=>['create','store']
        ]);
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }
    public function index(){
        $ploples=Plople::paginate(3);
        return view('ploples.index',compact('ploples'));
    }

    public function destroy(Plople $plople){
        $plople->delete();
        echo 'success';
    }
    public function edit(Request $request,Plople $plople){
        $id=$plople->id;
        //var_dump($id);die;
        if($plople->status==1){
            DB::table('ploples')->where('id',$id)->update(['status'=>0]);
            return redirect()->route('plople.index');
        }else{
            DB::table('ploples')->where('id',$id)->update(['status'=>1]);
            Email::email($plople->name);
            return redirect()->route('plople.index');
        }
    }
}
