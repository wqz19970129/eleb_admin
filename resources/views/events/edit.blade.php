@extends('layout.default')
@section('title','添加菜单')
    @section('content')
        <link rel="stylesheet" type="text/css" href="/webuploader/webuploader.css">
        <form action="{{route('events.update',['event'=>$event])}}" method="post">
            {{csrf_field()}}

            <div class="form-group">
                <label>活动名称:</label>
                <div class="row">
                    <div class="col-sm-3">
                        <input type="text" name="title" class="form-control" placeholder="活动名称" value="{{$event->title}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>活动详情:</label>
                <div class="row">
                    <div class="col-sm-3">
                        <input type="text" name="content" class="form-control" placeholder="活动详情" value="{{$event->content}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>报名开始时间:</label>
                <div class="row">
                    <div class="col-sm-3">
                        <input type="date" name="signup_start" class="form-control" value="{{$event->signup_start}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>报名截止时间:</label>
                <div class="row">
                    <div class="col-sm-3">
                        <input type="date" name="signup_end" class="form-control" value="{{$event->signup_end}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>开奖时间:</label>
                <div class="row">
                    <div class="col-sm-3">
                        <input type="date" name="prize_date" class="form-control" value="{{$event->prize_date}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>报名人数:</label>
                <div class="row">
                    <div class="col-sm-3">
                        <input type="text" name="signup_num" class="form-control" value="{{$event->signup_num}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>是否开奖:</label>
                <div class="row">
                    <div class="col-sm-3">
                        <input type="text" name="is_prize" class="form-control" value="{{$event->is_prize}}">
                    </div>
                </div>
            </div>

            {{method_field('PUT')}}
            <button type="submit" class="btn btn-default">确认修改</button>
        </form>
        @stop
@section('js')
    <script type="text/javascript" src="/webuploader/webuploader.js"></script>
@stop