@extends('layout.default')
@section('title','添加')
@section('content')
    <link rel="stylesheet" type="text/css" href="/webuploader/webuploader.css">
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
                        <input type="hidden" name="logo" class="form-control" id="logo">
                    </div>
                    <div class="form-group">
                    <div id="uploader-demo">
                        <!--用来存放item-->
                        <div id="fileList" class="uploader-list"></div>
                        <div id="filePicker">选择图片</div>
                    </div>
                        <img src="" alt="" id="img">
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary">添加</button>
                </form>
            </div>
        </div>
    </div>
@stop
@section('js')
    <!--引入JS-->
    <script type="text/javascript" src="/webuploader/webuploader.js"></script>
    <script>
        // 初始化Web Uploader
        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径
            swf:'/webuploader/Uploader.swf',

            // 文件接收服务端。
            server: '/upload',

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',
            formData:{'_token':"{{csrf_token()}}"},
            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            }
        });
      //事件监听
        uploader.on( 'uploadSuccess', function( file,response ) {
            //$( '#'+file.id ).addClass('upload-state-done');
               var url=response.url;
               console.log(response);
               $("#img").attr('src',url);
               $('#logo').val(url);
        });
    </script>
    @stop





