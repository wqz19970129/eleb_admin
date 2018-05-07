@extends('layout.default')
@section('title','菜单列表')
    @section('content')
        <table class="table table-bordered table-responsive" id="events">
            <tr>

                <th>活动标题</th>
                <th>活动名称</th>
                <th>获的人</th>

            </tr>
            @foreach($events as $event)
                <tr>
                    <td>{{$event->title}}</td>
                    <td>{{$event->name}}</td>
                    <td>{{$event->k}}</td>

                </tr>
            @endforeach
        </table>
    @stop
