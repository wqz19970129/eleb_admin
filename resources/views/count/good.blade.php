@extends('layout.default')
@section('title','首页')
@section('content')
    <table class="table table-bordered" id="admins">
        <tr>

            <td>商家名称</td>
            <td>菜名</td>
            <td>总计</td>
        </tr>
        @foreach($rows as $row)
            <tr >
                <td>{{$row->shop_name}}</td>
                <td>{{$row->goods_name}}</td>
                <td>{{$row->c}}个</td>
            </tr>
          @endforeach
        <tr>
            <td colspan="3">总计:{{$amount}}个订单</td>
        </tr>
    </table>

    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>添加</h5>
            </div>
            <div class="panel-body">
                <form method="get" action="{{route('good')}}">
                    <div class="form-group">
                        <label for="name">开始日期：</label>
                        <input type="date" name="start" class="form-control" value="{{ old('start') }}">
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary">查询</button>
                </form>
            </div>
        </div>
    </div>

    <table class="table table-bordered" id="admins">
        <tr>
            <td>商家名称</td>
            <td>菜名</td>
            <td>总计</td>
        </tr>
        @foreach($orders as $order)
            <tr >
                <td>{{$order->shop_name}}</td>
                <td>{{$order->goods_name}}</td>
                <td>{{$order->c}}个</td>
            </tr>
        @endforeach

        <tr>
            <td colspan="3">总计:{{$count}}个订单</td>
        </tr>

    </table>
@stop