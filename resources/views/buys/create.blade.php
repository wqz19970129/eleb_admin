@extends('layout.default')
@section('title','添加')
@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>添加</h5>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('buys.store') }}" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">商家名：</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">商家图片：</label>
                        <input type="file" name="logo" class="form-control" value="{{ old('logo') }}">
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary">添加</button>
                </form>
            </div>
        </div>
    </div>
@stop





