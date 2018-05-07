@extends('layout.default')
@section('title','首页')
@section('content')
    <table class="table table-bordered" id="activitys">
        <tr>
            <td>id</td>
            <td>活动名称</td>

            <td>活动开始时间</td>
            <td>结束时间</td>
            <td>操作</td>
        </tr>
        @foreach($activitys as $activity)
            <tr data-id="{{$activity->id}}">
                <td>{{$activity->id}}</td>
                <td>{{$activity->name}}</td>

                <td>{{$activity->start}}</td>
                <td>{{$activity->end}}</td>
                <td>
                  <a href="{{route('activity.edit',['activity'=>$activity])}}" class="btn btn-primary btn-sm">编辑</a>
                    <a href="{{route('activity.show',['activity'=>$activity])}}" class="btn btn-success">查看</a>
                    <button class="btn btn-danger">删除</button>
                </td>
            </tr>
        @endforeach
    </table>
    <tr>
        <td><a href="{{route('activity.create')}}" class="btn btn-success">添加</a></td>
    </tr>
@stop
@section('js')
    <script>
        $('#activitys .btn-danger').click(function () {
            if(confirm('确认删除数据吗?不要后悔哟!')){
                var tr=$(this).closest('tr');
                var id=tr.data('id');
                $.ajax(
                    {
                        type: "DELETE",
                        url: 'activity/' + id,
                        data: '_token={{csrf_token()}}',
                        success: function (msg) {
                            //console.debug(msg);
                            tr.fadeOut();
                        }
                    }
                )
            }
        })
    </script>
    @stop