@extends('layout.default')
@section('title','首页')
@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>修改</h5>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('update') }}" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="password">旧密码：</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>
            <div class="form-group">
                <label for="new">新密码：</label>
                <input type="password" name="new" class="form-control" value="{{ old('new') }}">
            </div>
                    <div class="form-group">
                        <label for="password_confirmation">确认密码：</label>
                        <input type="password" name="new_confirmation" class="form-control" value="{{ old('new_confirmation') }}">
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary">修改</button>
                </form>
            </div>
        </div>
    </div>

@stop