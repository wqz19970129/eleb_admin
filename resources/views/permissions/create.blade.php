@extends('layout.default')
@section('title','登录')
@section('content')
    <div class="container">
    <form method="post" action="{{route('permission.store')}}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">权限名称</label>
            <input type="text" class="form-control" id="name" placeholder="" name="name" value="{{old('name')}}">
    </div>
        <div class="form-group">
            <label for="display_name">权限描述名</label>
            <input type="text" class="form-control" id="display_name" placeholder="" name="display_name" value="{{old('display_name')}}">
        </div>
        <div class="form-group">
            <label for="description">权限名称描述</label>
            <input type="text" class="form-control" id="description" placeholder="" name="description" value="{{old('description')}}">
        </div>

        {{csrf_field()}}
        <button type="submit" class="btn btn-default">提交</button>

    </form>
    </div>
@stop





