@extends('layout.default')
@section('title','首页')
@section('content')
    <table class="table table-bordered" id="admins">
        <tr>

            <td>商家名称</td>
            <td>总计</td>
        </tr>
        @foreach($rows as $row)
            <tr >
                <td>{{$row->shop_name}}</td>
                <td>{{$row->a}}个</td>
            </tr>
          @endforeach
    </table>

    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>添加</h5>
            </div>
            <div class="panel-body">
                <form method="get" action="{{route('sex')}}">
                    <div class="form-group">
                        <label for="name">开始日期：</label>
                        <input type="date" name="start" class="form-control" value="{{ old('start') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">结束日期：</label>
                        <input type="date" name="end" class="form-control" value="{{ old('start') }}">
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary">查询</button>
                </form>
            </div>
        </div>
    </div>

    <table class="table table-bordered" id="admins">
        <tr>
            <td>id</td>
            <td>商家名称</td>
        </tr>
        @foreach($orders as $order)
            <tr >
                <td>{{$order->shop_name}}</td>
                <td>{{$order->a}}个</td>
            </tr>
        @endforeach
    </table>
@stop