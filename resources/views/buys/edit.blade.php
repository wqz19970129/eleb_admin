@extends('layout.default')
@section('title','添加')
@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>修改</h5>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('buys.update',['buy'=>$buy]) }}" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">商家名：</label>
                        <input type="text" name="name" class="form-control" value="{{ $buy->name }}">
                    </div>
                    <div class="form-group">
                        <label for="name">商家图片：<img src="{{Storage::url($buy->logo)}}" alt=""></label>
                        <input type="file" name="logo" class="form-control" value="{{ $buy->logo }}">
                    </div>
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <button type="submit" class="btn btn-primary">修改</button>
                </form>
            </div>
        </div>
    </div>
@stop





