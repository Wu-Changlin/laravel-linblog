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
    @yield('css')
</head>
<body>

@yield('content')

@yield('js')
<script src="{{asset('admin/style/jquery_002.js')}}"></script>

<script src="{{asset('admin/style/bootstrap.js')}}"></script>
<script src="{{asset('admin/style/jquery.js')}}"></script>
</body>
</html>