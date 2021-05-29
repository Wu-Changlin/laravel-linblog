<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title')</title>
    <meta name="keywords" content=" @yield('keywords')" />
    <meta name="description" content=" @yield('description')"/>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="{{asset('admin/login/login.register.css')}}">
    @yield('css')
</head>
<body>


@yield('content')




@yield('js')
</body>
</html>