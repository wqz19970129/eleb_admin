<?php

namespace App\Http\Controllers;

use App\Rember;
use Illuminate\Http\Request;

class RemberController extends Controller
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
    public function create(){
  return view('rembers.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:50',
            'password'=>'required|confirmed|min:6',
            'email'=>'required|email',
        ],
            [
                'name.required'=>'用户名不能为空',
                'email.required'=>'邮箱不能为空',
                'email.email'=>'邮箱符合规范',
                'password.required'=>'密码不能为空',
                'password.confirmed'=>'两次密码一致',
                'password.min'=>'密码最小为6',
            ]);

        Rember::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
            ]
        );
        session()->flash('success','注册成功');
        return redirect()->route('login');
    }
}
