@extends('layout.default')
@section('title','登录')
@section('content')
    <div class="container">
    <form method="post" action="{{route('admin.store')}}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="shop_name">商家名称</label>
            <input type="text" class="form-control" id="shop_name" placeholder="" name="shop_name" value="{{old('shop_name')}}">
        </div>

        <div class="form-group">
            <label for="shop_img">所属商家:</label>
            <select name="p_id" id="">
                @foreach($ploples as $plople)
                <option value="{{$plople->id}}" class="form-group">{{$plople->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="shop_img">商家图片：</label>
            <input type="file" name="shop_img" class="form-control" value="{{ old('shop_img') }}">
        </div>
        <div class="form-group">
            <label for="brand">是否品牌</label>
            是:<input type="radio" name="brand" value="1">
            否:<input type="radio" name="brand" value="0">
        </div>
        <div class="form-group">
            <label for="on_time">是否品准时</label>
            是:<input type="radio" name="on_time" value="1">
            否:<input type="radio" name="on_time" value="0">
        </div>
        <div class="form-group">
            <label for="fengniao">是否蜂巢</label>
            是:<input type="radio" name="fengniao" value="1">
            否:<input type="radio" name="fengniao" value="0">
        </div>
        <div class="form-group">
            <label for="bao">是否保</label>
            是:<input type="radio" name="bao" value="1">
            否:<input type="radio" name="bao" value="0">
        </div>
        <div class="form-group">
            <label for="piao">是否票</label>
            是:<input type="radio" name="piao" value="1">
            否:<input type="radio" name="piao" value="0">
        </div>
        <div class="form-group">
            <label for="zhun">是否标准</label>
            是:<input type="radio" name="zhun" value="1">
            否:<input type="radio" name="zhun" value="0">
        </div>
        <div class="form-group">
            <label for="start_send">配送金额</label>
            <input type="text" class="form-control" id="name" placeholder="" name="start_send" value="{{old('start_send')}}">
        </div>

        <div class="form-group">
            <label for="start_cost">起送金额</label>
            <input type="text" class="form-control" id="start_cost" placeholder="" name="send_cost" value="{{old('start_cost')}}">
        </div>
        <div class="form-group">
            <label for="notice">公告</label>
            <input type="text" class="form-control" id="notice" placeholder="" name="notice" value="{{old('notice')}}">
        </div>
        <div class="form-group">
            <label for="discount">优惠活动</label>
            <input type="text" class="form-control" id="discount" placeholder="" name="discount" value="{{old('discount')}}">
        </div>
        {{csrf_field()}}
        <button type="submit" class="btn btn-default">提交</button>

    </form>
    </div>
@stop





