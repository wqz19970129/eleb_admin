@extends('layout.default')
@section('title','首页')
@section('content')
    <table class="table table-bordered" id="ploples">
        <tr>
            <td>id</td>
            <td>名字</td>
            <td>电话</td>
            <td>状态</td>
            <td>操作</td>
        </tr>
        @foreach($ploples as $plople)
            <tr data-id="{{$plople->id}}">
                <td>{{$plople->id}}</td>
                <td>{{$plople->name}}</td>
                <td>{{$plople->phone}}</td>
                <td>{{$plople->status==1?'审核通过':'未通过'}}</td>
                <td>{{--<a href="{{route('plople',['plople'=>$plople])}}" class="btn btn-primary btn-sm">查看</a>
                    <a href="{{route('plople',['plople'=>$plople])}}" class="btn btn-warning btn-sm"> 编辑</a>--}}
                    <a href="{{route('plople.edit',['plople'=>$plople])}}" class="btn btn-warning btn-sm"> 是否审核</a>
                    <button class="btn btn-danger">删除</button>
                </td>
            </tr>
        @endforeach
    </table>
    {{$ploples->links()}}
@stop
@section('js')
    <script>
        $("#ploples  .btn-danger").click(function () {
            if(confirm('确认删除数据吗?不要后悔哟!')){
                var tr=$(this).closest('tr');
                var id=tr.data('id');
                $.ajax(
                    {
                        type:"DELETE",
                        url:'plople/'+id,
                        data:'_token={{csrf_token()}}',
                        success:function (msg) {
                            //console.debug(msg);
                            tr.fadeOut();
                        }
                    }
                )
            }
        })
    </script>
@stop
