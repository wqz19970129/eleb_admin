@extends('layout.default')
@section('title','添加菜单')
    @section('content')
        <link rel="stylesheet" type="text/css" href="/webuploader/webuploader.css">
        <form action="{{route('prize.store')}}" method="post">
            {{csrf_field()}}

            <div class="form-group">
                <label>活动名称:</label>
                <select name="events_id" id="">

                    <option value="{{$row->id}}">{{$row->title}}</option>
                </select>

            </div>
            <div class="form-group">
                <label>奖品名字:</label>
                <div class="row">
                    <div class="col-sm-3">
                        <input type="text" name="name" class="form-control" placeholder="奖品名字" value="{{old('name')}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>奖品详情:</label>
                <div class="row">
                    <div class="col-sm-3">
                        <input type="text" name="description" class="form-control" placeholder="奖品详情" value="{{old('description')}}">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-default">确认添加</button>
        </form>
        @stop
@section('js')
    <script type="text/javascript" src="/webuploader/webuploader.js"></script>
@stop