<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title')</title>
    <meta name="keywords" content=" @yield('keywords')" />
    <meta name="description" content=" @yield('description')"/>
    <meta name="viewport" content="width=device-width">
    <link href="{{asset('admin/style/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/login/login.register.css')}}">
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet" type="text/css" />
    @yield('css')
</head>
<body>


@yield('content')


<script src="{{asset('admin/style/jquery_002.js')}}"></script>
<script src="{{asset('admin/style/bootstrap.js')}}"></script>
<script src="{{asset('admin/style/jquery.js')}}"></script>
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