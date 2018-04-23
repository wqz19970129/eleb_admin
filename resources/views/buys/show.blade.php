@extends('layout.default')
@section('title','分类')
@section('content')
    商家名:<h3>{{$buy->name}}</h3>
    商家图片:<h3><img src="{{Storage::url($buy->logo)}}" alt=""></h3>
@stop


