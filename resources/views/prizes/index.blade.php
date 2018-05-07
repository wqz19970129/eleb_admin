@extends('layout.default')
@section('title','菜单列表')
    @section('content')
        <table class="table table-bordered table-responsive" id="prize">
            <tr>
                <th>ID</th>
                <th>活动id名</th>
                <th>奖品名称</th>
                <th>描述</th>
                <th>用户id</th>
                <th>操作</th>
            </tr>
            @foreach($prizes as $prize)
                <tr data-id="{{ $prize->id }}">
                    <td>{{$prize->id}}</td>
                    <td>{{$prize->events_id}}</td>
                    <td>{{$prize->name}}</td>
                    <td>{{$prize->description}}</td>
                    <td>{{$prize->member_id}}</td>
                    <td>
         {{--               <a href="{{ route('events.edit',['event'=>$event->id]) }}" class="btn btn-warning btn-sm">编辑</a>--}}
                        {{--<a href="{{ route('menus.show',['menu'=>$menu]) }}" class="btn btn-primary btn-sm" >查看</a>--}}
                        <button class="btn btn-danger btn-sm">删除</button>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="9">
                    <a href="{{ route('prize.create') }}" class="btn btn-primary btn-sm" >添加</a>
                </td>
            </tr>
        </table>
    @stop
@section('js')
    <script>
        $("#menus .btn-danger").click(function () {
            //确认删除 进入点击事件
//                console.log("ok");
            if(confirm('删除后不能恢复!')){
                var tr = $(this).closest('tr');
                var id=tr.data('id');
                $.ajax({
                    type:"DELETE",
                    url:'prize/'+id,
                    data:'_token={{ csrf_token() }}',
                    success: function (msg) {
                        tr.fadeOut();
                    }
                });
            }
        });
    </script>

@stop