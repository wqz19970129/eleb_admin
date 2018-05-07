@extends('layout.default')
@section('title','首页')
@section('content')
    <table class="table table-bordered" id="buys">
        <tr>
            <td>id</td>
            <td>会员名称</td>
            <td>状态</td>
            <td>操作</td>
        </tr>
        @foreach($rows as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->username}}</td>
                <td>{{$row->status==0?'未禁用':'禁用'}}</td>
                <td>
                    <a href="{{route('regist.show',['row'=>$row])}}" class="btn btn-primary btn-sm">查看</a>
                    <a href="{{route('regist.edit',['row'=>$row])}}" class="btn btn-warning btn-sm"> 是否禁用</a>
                </td>
            </tr>
        @endforeach
    </table>
@stop



