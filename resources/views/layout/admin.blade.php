<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>@yield('title')</title>
    <meta name="keywords" content=" @yield('keywords')" />
    <meta name="description" content=" @yield('description')"/>
    <!--Basic Styles-->
    <link href="{{asset('admin/style/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('admin/style/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('admin/style/weather-icons.css')}} " rel="stylesheet">
    <!--Beyond styles-->
    <link id="beyond-link" href="{{asset('admin/style/beyond.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/style/demo.css')}}" rel="stylesheet">
    <link href="{{asset('admin/style/typicons.css')}}" rel="stylesheet">
    <link href="{{asset('admin/style/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet" type="text/css" />

    @yield('css')
</head>
<body>
<!-- 头部 -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                        <img src="/admin/images/logos.png" alt="">
                    </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <section>
                                    <h2><span class="profile"><span>admin</span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="{{ route("admin.logout") }}">
                                        退出登录
                                    </a>
                                </li>
{{--                                <li class="dropdown-footer">--}}
{{--                                    <a href="/admin/admin/edit/id/12.html">--}}
{{--                                        修改密码--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>
<!-- /头部 -->

<div class="main-container container-fluid">
    <div class="page-container">
        <!-- Page Sidebar -->
        <div class="page-sidebar" id="sidebar">
            <!-- Page Sidebar Header-->
            <div class="sidebar-header-wrapper">
                <input class="searchinput" type="text">
                <i class="searchicon fa fa-search"></i>
                <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
            </div>
            <!-- /Page Sidebar Header -->
            <!-- Sidebar Menu -->
            <ul class="nav sidebar-menu">
                <!--Dashboard-->
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-user"></i>
                        <span class="menu-text">管理员设置</span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="/admin/adminUser/showAdminUser">
                                    <span class="menu-text">
                                        管理员列表                                    </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/auth_group/lst.html">
                                    <span class="menu-text">
                                        用户组列表                                    </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/auth_rule/lst.html">
                                    <span class="menu-text">
                                        权限列表                                    </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-folder"></i>
                        <span class="menu-text">栏目管理</span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="/admin/cate/lst.html">
                                    <span class="menu-text">
                                        栏目列表                                    </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-file-text"></i>
                        <span class="menu-text">文章管理</span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="/admin/article/lst.html">
                                    <span class="menu-text">
                                        文章列表                                    </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-chain"></i>
                        <span class="menu-text">友情链接</span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="/admin/link/lst.html">
                                    <span class="menu-text">
                                        链接列表                                    </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-gear"></i>
                        <span class="menu-text">系统设置</span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="/admin/conf/conf.html">
                                    <span class="menu-text">
                                        配置项                                  </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/conf/lst.html">
                                    <span class="menu-text">
                                        配置列表                                  </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /Sidebar Menu -->
        </div>
        <!-- /Page Sidebar -->

        <!-- Page Content  页面填充内容开始-->
         @yield('content')
        <!-- /Page Content 页面填充内容结束-->
    </div>
</div>

<!--Basic Scripts-->
<script src="{{asset('admin/style/jquery_002.js')}}"></script>
<script src="{{asset('admin/style/bootstrap.js')}}"></script>
<script src="{{asset('admin/style/jquery.js')}}"></script>
<!--Beyond Scripts-->
<script src="{{asset('admin/style/beyond.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>  {{--弹窗提示框样式--}}
<script>
    // 弹窗提示框样式
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-center",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "progressBar": true
    }
</script>
<script>
    //自定义错误提示
    @if(session('msg'))
        toastr.error("{{ session('msg') }}");
    @endif
    //验证器错误提示
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
        toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
        @yield('js')
    </body>
</html>