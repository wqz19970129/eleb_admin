<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function create()
    {
        return view('login.create');
    }

    public function store(Request $request, Admin $admin)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'password' => 'required',

            ], [
                'name.required' => $request->name,
                'password.required' => $request->password,

            ]);
        if (Auth::attempt(['name' => $request->name,'password' => $request->password], $request->has('remember'))) {
            session()->flash('success', '登陆成功');
            return redirect()->route('admin.index', [Auth::user()]);
        } else {
            session()->flash('danger', '登陆失败');
            return redirect()->back()->withInput();
        }
    }
    public function destroy(){
        Auth::logout();
        session()->flash('success','成功退出');
        return redirect('login');
    }
    public function help(){
        return redirect('login');
    }
}
