<?php

namespace App\Http\Controllers\Admin;

use App\Model\buy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class BuysController extends Controller
{
    //
    public function __construct()
    {        //出这个之外的都要验证权限
        $this->middleware('auth',[
            'except'=>['store']
        ]);

    }
    public function index(){
         $buys=Buy::all();
        return view('buys.index',compact('buys'));
    }
    public function create(){
        return view('buys.create');
    }
    public function store(Request $request){
        //验证
        $this->validate($request,
            [
                'name'=>'required',
                'logo'=>'image',
            ],
            [
                'name.required'=>'分类不能为空',
                'logo.image'=>'图片不能为空',

            ]
        );
        $filename=$request->file('logo')->store('public/buys');
        $client =App::make('aliyun-oss');
        $object = "$filename";
        try{
            $client->uploadFile(getenv('OSS_BUCKET'), $object, storage_path('app/'.$filename));
        } catch(OssException $e) {
            printf(__FUNCTION__ . ": FAILED\n");
            printf($e->getMessage() . "\n");
            return;
        }
        print(__FUNCTION__ . ": OK" . "\n");
        Buy::create([
                'name'=>$request->name,
                'logo'=>'https://laravel-elem.oss-cn-beijing.aliyuncs.com/'.$filename,
            ]
        );
        session()->flash('success','注册成功');
        return redirect()->route('buys.index');
    }
    public function show(Buy $buy){
        return view('buys.show',compact('buy'));
    }
    //修改
    public function edit(Buy $buy){
        return view('buys.edit',compact('buy'));
    }
    public function update(Request $request,Buy $buy)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'logo' => 'image',
            ],
            [
                'name.required' => '分类不能为空',
                'logo.image' => '图片不能为空',

            ]
        );
        if ($request->logo) {
            $filename = $request->file('logo')->store('public/buys');
            $buy->update([
                    'name' => $request->name,
                    'logo' => $filename,
                ]
            );
            session()->flash('success', '修改成功');
            return redirect()->route('buys.index');
        } else {
            $buy->update([
                    'name' => $request->name,
                ]
            );
            session()->flash('success', '修改成功');
            return redirect()->route('buys.index');
        }
    }
    public function destroy(Buy $buy){
        $buy->delete();
        echo 'success';
    }
}
