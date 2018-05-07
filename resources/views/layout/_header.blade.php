<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">首页</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
               {!! \App\Menu::navs() !!}
                {{--<li class=""><a href="{{route('admin.index')}}">管理列表 <span class="sr-only">(current)</span></a></li>
                <li><a href="{{route('buys.index')}}">商铺分类显示</a></li>
                <li><a href="{{route('regist.index')}}">会员管理</a></li>
                <li><a href="{{route('rember.index') }}">管理员列表</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">商家管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('buys.create')}}">商铺分类添加</a></li>
                        <li><a href="{{route('admin.create')}}">添加商铺</a></li>
                        <li><a href="{{route('plople.index')}}">商家管理</a></li>
                        <li><a href="{{route('activity.index')}}">最新活动</a></li>
                        <li><a href="{{route('index')}}">商家日订单表</a></li>
                        <li><a href="{{route('sex')}}">商家月订单表</a></li>
                        <li><a href="{{route('good')}}">菜品日订单</a></li>
                        <li><a href="{{route('goods')}}">菜品月订单</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">RBAC <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('permission.index')}}">权限管理</a></li>
                        <li><a href="{{route('roles.index')}}">角色管理</a></li>
                    </ul>
                </li>
            </ul>--}}

            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

            <ul class="nav navbar-nav navbar-right">
                @guest
                <li><a href="{{route('login')}}">登录</a></li>
                <li><a href="{{route('rember.create')}}">注册</a></li>
                @endguest
                @auth
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('check')}}">修改密码</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li>     <form method="post" action="{{ route('logout') }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-default">注销</button>
                            </form></li>
                    </ul>
                </li>
            </ul>
            @endauth
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


