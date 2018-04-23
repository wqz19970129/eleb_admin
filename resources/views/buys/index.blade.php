@extends('layout.default')
@section('title','首页')
@section('content')
    <table class="table table-bordered" id="buys">
        <tr>
            <td>id</td>
            <td>商家名称</td>
            <td>图片</td>
            <td>操作</td>
        </tr>
        @foreach($buys as $buy)
            <tr data-id="{{$buy->id}}">
                <td>{{$buy->id}}</td>
                <td>{{$buy->name}}</td>
                <td>@if($buy->logo)<img src="{{$buy->logo}}" alt="">@endif</td>
                <td>
                    <a href="{{route('buys.show',['buy'=>$buy])}}" class="btn btn-primary btn-sm">查看</a>
                    <a href="{{route('buys.edit',['buy'=>$buy])}}" class="btn btn-warning btn-sm"> 编辑</a>
                    <button class="btn btn-danger">删除</button>
                </td>
            </tr>
        @endforeach
    </table>
@stop
@section('js')
    <script>
        $("#buys .btn-danger").click(function () {
            if(confirm('确认删除数据吗?不要后悔哟!')){
                var tr=$(this).closest('tr');
                var id=tr.data('id');
                $.ajax(
                    {
                        type:"DELETE",
                        url:'buys/'+id,
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


