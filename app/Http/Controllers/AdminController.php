<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Plople;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function __construct()
    {        //出这个之外的都要验证权限
        $this->middleware('auth',[
            'except'=>['store']
        ]);

    }
    public function index(Request $request){
        $cl = new \App\SphinxClient();
        $cl->SetServer ( '127.0.0.1', 9312);
//$cl->SetServer ( '10.6.0.6', 9312);
//$cl->SetServer ( '10.6.0.22', 9312);
//$cl->SetServer ( '10.8.8.2', 9312);
        $cl->SetConnectTimeout ( 10 );
        $cl->SetArrayResult ( true );
// $cl->SetMatchMode ( SPH_MATCH_ANY);
        $cl->SetMatchMode ( SPH_MATCH_EXTENDED2);
        $cl->SetLimits(0, 1000);//返回多少条数据1000数据
        $key=$request->key;
        $info = $key;//关键字
        $res = $cl->Query($info, 'admins');//shopstore_search
        //print_r($info);
        //print_r($res);
        if($res['total']){
            //查看有
            $datas=collect($res['matches'])->pluck('id')->toArray();
            //dd($datas);//in id
            $admins = DB::table('admins')
                ->whereIn('id', $datas)
                ->paginate(3);
            //dd($admins);
            return view('admins.index',compact('admins'));
        }else{
            //没有
            //echo 'E有数据';
            $admins=Admin::paginate(3);
            return view('admins.index',compact('admins'));
        }
        //$admins=Admin::paginate(3);
        //return view('admins.index',compact('admins'));
    }
    public function edit(Request $request,Admin $admin){
        $id=$admin->id;
        //var_dump($id);die;
        if($admin->status==1){
            DB::table('admins')->where('id',$id)->update(['status'=>0]);
            return redirect()->route('admin.index');
        }else{
            DB::table('admins')->where('id',$id)->update(['status'=>1]);
            return redirect()->route('admin.index');
        }
    }
    public function create(){
        $ploples=Plople::all();
        //var_dump($ploples);die();
        return view('admins.create',compact('ploples'));
    }
    public function store(Request $request){
        //var_dump($request);die;
        $this->validate($request,[
            'shop_name'=>'required',
            'shop_img'=>'image',
            'brand'=>'required',
            'on_time'=>'required',
            'fengniao'=>'required',
            'bao'=>'required',
            'piao'=>'required',
            'zhun'=>'required',
            'start_send'=>'required',
            'send_cost'=>'required',
            'notice'=>'required',
            'discount'=>'required',

        ],
            [
                'shop_name.required'=>'用户名不能为空',
                'shop_img.image'=>'图片不正确',
                'brand.required'=>'品牌不能为空',
                'on_time.required'=>'准时不能为空',
                'fengniao.required'=>'蜂鸟不能为空',
                'bao.required'=>'保不能为空',
                'piao.required'=>'票不能为空',
                'zhun.required'=>'按时不能为空',
                'start_send.required'=>'金额不能为空',
                'send_cost.required'=>'起价不能为空',
                'notice.required'=>'不能为空',
                'discount.required'=>'不能为空',
            ]);
        $filename=$request->file('shop_img')->store('public/admin');
        //var_dump($request->p_id);die;
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
        Admin::create([
                'shop_name'=>$request->shop_name,
                'shop_img'=>'https://laravel-elem.oss-cn-beijing.aliyuncs.com/'.$filename,
                'brand'=>$request->brand,
                'on_time'=>$request->on_time,
                'fengniao'=>$request->fengniao,
                'bao'=>$request->bao,
                'piao'=>$request->piao,
                'zhun'=>$request->zhun,
                'start_send'=>$request->start_send,
                'send_cost'=>$request->send_cost,
                'notice'=>$request->notice,
                'discount'=>$request->discount,
                'p_id'=>$request->p_id,

            ]
        );
        session()->flash('success','添加');
        return redirect()->route('admin.index');
    }
}
