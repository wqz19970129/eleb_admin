@extends('layout.default')
@section('title','首页')
@section('content')
    <table class="table table-bordered" id="admins">
        <tr>
            <td>id</td>
            <td>商家名称</td>
            <td>图片</td>
            <td>是否品牌</td>
            <td>准时</td>
            <td>蜂鸟</td>
            <td>包</td>
            <td>票</td>
            <td>准</td>
            <td>开始价格</td>
            <td>起送金额</td>
            <td>审核</td>
            <td>操作</td>
        </tr>
        @foreach($admins as $admin)
            <tr data-id="{{$admin->id}}">
                <td>{{$admin->id}}</td>
                <td>{{$admin->shop_name}}</td>
                <td>@if($admin->shop_img)<img src="{{$admin->shop_img}}" alt="">@endif</td>
                <td>{{$admin->brand1==1?'是':'否'}}</td>
                <td>{{$admin->on_time==1?'是':'否'}}</td>
                <td>{{$admin->fengniao==1?'是':'否'}}</td>
                <td>{{$admin->bao==1?'是':'否'}}</td>
                <td>{{$admin->piao==1?'是':'否'}}</td>
                <td>{{$admin->zhun==1?'是':'否'}}</td>
                <td>{{$admin->start_send}}</td>
                <td>{{$admin->send_cost}}</td>
                <td>{{$admin->status==1?'审核':'未审核'}}</td>
                <td>
 {{--                   <a href="{{route('buys.show',['buy'=>$buy])}}" class="btn btn-primary btn-sm">查看</a>--}}
                    <a href="{{route('admin.edit',['admin'=>$admin])}}" class="btn btn-warning btn-sm"> 是否审核</a>

                    {{--<button class="btn btn-danger">删除</button>--}}
                </td>
            </tr>
        @endforeach
    </table>
    {{ $admins->links() }}
@stop