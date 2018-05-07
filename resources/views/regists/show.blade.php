@extends('layout.default')
@section('title',$regist->name)
@section('content')
    姓名:<h3>{{$regist->username}}</h3>
    电话:<h3>{{$regist->tel}}</h3>
@stop


