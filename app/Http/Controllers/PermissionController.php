<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    public function index(){
        $rows=Permission::all();
        return view('permissions.index',compact('rows'));
    }
    public function create(){
        return view('permissions.create');
    }
    public function store(Request $request){
        $this->validate($request,
            [
                'name'=>'required',
                'display_name'=>'required',
                'description'=>'required',
            ],
            [
                'name.required'=>'权限名不为空',
                'display_name.required'=>'权限详情描述名不为空',
                'description.required'=>'权限详情描述不为空',
            ]
        );
        Permission::create(
            ['name'=>$request->name,'display_name'=>$request->display_name,'description'=>$request->description]);
        session()->flash('success','添加成功');
        return redirect()->route('permission.index');
    }
    //修改权限表单
    public function edit(Permission $permission)
    {
        return view('permissions.edit',compact('permission'));
    }
    //修改保存
    public function update(Request $request,Permission $permission)
    {

        //验证
        $this->validate($request,
            [
                'name'=>'required',
                'display_name'=>'required',
                'description'=>'required',
            ],
            [
                'name.required'=>'权限名不能为空!',
                //'name.unique'=>'权限名不能重复!',
                'display_name.required'=>'权限显示名称不能为空!',
                'description.required'=>'权限描述不能为空!',
            ]);

//        dd($request);
        //保存更新信息
        $permission->update(
            [
                'name'=>$request->name,
                'display_name'=>$request->display_name,
                'description'=>$request->description,
            ]
        );
        session()->flash('success', '修改成功~');
        return redirect()->route('permission.index',compact('permission'));
    }

    //权限详情
    public function show(Permission $permission)
    {
        return view('permissions.show',compact('permission'));
    }
    //删除权限
    public function destroy(Permission $permission)
    {
        $permission->delete();
        echo 'success';

        $roles=Role::all();
//        dd($roles);
        //把角色里有这个权限的移除掉
        $roles->detachPermissions($permission);
    }
}
