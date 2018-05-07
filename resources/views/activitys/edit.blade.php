@extends('layout.default')
@section('title','添加')
@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>修改</h5>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('activity.update',['activity'=>$activity]) }}" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">活动名称：</label>
                        <input type="text" name="name" class="form-control" value="{{ $activity->name }}">
                    </div>
                    <script id="container" name="detail" type="text/plain">
                     {!!$activity->detail!!}
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
                        <input type="date" class="form-control" id="name" placeholder="" name="start" value="{{$activity->start}}">
                    </div>
                    <div class="form-group">
                        <label for="name">结束时间</label>
                        <input type="date" class="form-control" id="name" placeholder="" name="end" value="{{$activity->end}}">
                    </div>
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <button type="submit" class="btn btn-primary">修改</button>
                </form>
            </div>
        </div>
    </div>
@stop






