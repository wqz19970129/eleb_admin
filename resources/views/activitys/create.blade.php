@extends('layout.default')
@section('title','登录')
@section('content')
    <div class="container">
    <form method="post" action="{{route('activity.store')}}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">活动名称</label>
            <input type="text" class="form-control" id="name" placeholder="" name="name" value="{{old('name')}}">
        </div>
        <script id="container" name="detail" type="text/plain">

    </script>
        <!-- 配置文件 -->
        <script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="/ueditor/ueditor.all.js"></script>
        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            var ue = UE.getEditor('container');
        </script>

        <div class="form-group">
            <label for="name">开始时间</label>
            <input type="date" class="form-control" id="name" placeholder="" name="start" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="name">结束时间</label>
            <input type="date" class="form-control" id="name" placeholder="" name="end" value="{{old('name')}}">
        </div>
        {{csrf_field()}}
        <button type="submit" class="btn btn-default">提交</button>

    </form>
    </div>
@stop





