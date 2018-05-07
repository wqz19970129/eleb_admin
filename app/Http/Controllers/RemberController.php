<?php

namespace App\Http\Controllers;

use App\Rember;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $roles=Role::all();
  return view('rembers.create',compact('roles'));
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

        $admin=Rember::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
            ]
        );
        $admin->roles()->sync($request->role_id);
        session()->flash('success','注册成功');
        return redirect()->route('login');
    }
    //管理员列表
    public function index()
    {
        //dd(Auth::user());
        Auth::user()->can('rember.index');
        $admins=Rember::paginate(3);
        return view('rembers.index',compact('admins'));
    }


    //管理员详情
//    public function show(Admin $admin)
//    {
//
//        return view('admins.show',compact('admin'));
//    }

    //修改管理员
    public function edit(Rember $rember)
    {
        $roles=Role::all();
        return view('rembers.edit',compact('arr','roles','rember'));
    }

    //更新信息
    public function update(Request $request,Rember $rember)
    {
        //验证信息
        $this->validate($request,
            [
                'name'=>'required',
                'email'=>'required',
            ],
            [
                'name.required'=>'角色名不能为空!',
                'email.required'=>'邮箱不能为空!',
            ]);

//        dd($request);
        //修改更新角色

        $rember->update(
            [
                'name' => $request->name,
                'email' => $request->email,
            ]
        );

//        保存更新信息
        $rember->syncRoles($request->role_id);

//        跳转页面
        session()->flash('success','修改管理员成功!');
        return redirect()->route('rember.index',compact('rember'));
    }

    //修改密码
    public function pwd_edit(Rember $rember)
    {
//        dump(session()->all());exit;
//        dump($admin);exit;
        return view('rembers.pwd_edit', compact('admin'));
    }

    //保存修改的密码
    public function pwd_edit_save(Request $request, Rember $rember)
    {
        //验证
//        dd($request);
        if (!empty($request->old_password)) {
            if (Hash::check($request->old_password, $rember->password)) {
                $this->validate($request,
                    [
                        'old_password' => 'required',
                        'password' => 'required|min:6|confirmed',
                    ],
                    [
                        'old_password.required' => '旧密码不能为空!',
                        'password.required' => '新密码不能为空!',
                        'password.min' => '新密码不能低于6位!',
                        'password.confirmed' => '前后两次密码输入不一致!',
                    ]);
                $rember->update(
                    [
                        'password' => bcrypt($request->password),
                    ]
                );
                Auth::logout();
                session()->flash('success', '修改密码成功,请重新登录!');
                return redirect()->route('login', compact('admin'));
            }
        }
        session()->flash('warning', '修改失败,返回首页');
        return redirect()->route('home');
    }
    public function destroy(Rember $rember)
    {
       $rember->delete();
       echo '成功';
    }
}
