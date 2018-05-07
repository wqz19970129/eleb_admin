@extends('layout.default')
@section('title','首页')
@section('content')
    <table class="table table-bordered" id="permissions">
        <tr>
            <td>id</td>
            <td>权限名字</td>
            <td>权限描述名</td>
            <td>权限描述</td>
            <td>操作</td>

        </tr>
        @foreach($rows as $row)
            <tr data-id="{{$row->id}}">
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->display_name}}</td>
                <td>{{$row->description}}</td>

                <td>
                    <a href="{{ route('permission.edit',['permission'=>$row]) }}" class="btn btn-warning btn-sm">编辑</a>
                    <a href="{{ route('permission.show',['permission'=>$row]) }}" class="btn btn-primary btn-sm" >查看</a>
                    <button class="btn btn-danger btn-sm">删除</button>
                </td>


            </tr>
        @endforeach
        <tr>
            <td colspan="5">
                <a href="{{route('permission.create')}}" class="btn btn-primary btn-sm">添加</a>
            </td>
        </tr>
    </table>

@stop
@section('js')
    <script>
        $("#permissions .btn-danger").click(function () {
            //确认删除 进入点击事件
//                console.log("ok");
            if(confirm('删除后不能恢复!')){
                var tr = $(this).closest('tr');
                var id=tr.data('id');
                $.ajax({
                    type:"DELETE",
                    url:'permission/'+id,
                    data:'_token={{ csrf_token() }}',
                    success: function (msg) {
                        tr.fadeOut();
                    }
                });
            }
        });
    </script>

@stop