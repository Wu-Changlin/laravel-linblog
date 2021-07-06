<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.w3.org/1999/xhtml">
<head >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>@yield('title')</title>
    <meta name="keywords" content=" @yield('keywords')" />
    <meta name="description" content=" @yield('description')"/>
    <!--Basic Styles-->

    <link rel="stylesheet" href="{{ asset('home/static/semantic/semantic.min.css') }}">
    <link rel="stylesheet" href="{{asset('home/css/me.css')}}" th:href="@{/home/css/me.css}">
    @yield('css')
</head>
<body>


<!--导航开始-->
<nav id="nav" class="gird-header">
  <div class="ui container">
    <div class="ui inverted secondary stackable menu">
      <h2 class="ui olive header item" style="font-family: STSong">Lin</h2>
      <!--<div class="right m-item item m-mobile-hide">-->

        @foreach($category as $v)
            @if ($v->category_id == 1 &&  $v->type==1)
                <a href="/"  @if($category_id==$v->category_id) class="active m-item item m-mobile-hide" @else  class="m-item item m-mobile-hide" @endif><i class="home icon"></i>首页</a>
            @elseif($v->category_id>1 && $v->type==1 )
                <a href="{{ url('category',[$v->category_id]) }}" @if($category_id==$v->category_id) class="active m-item item m-mobile-hide" @else  class="m-item item m-mobile-hide" @endif><i class="clone outline icon"></i>{{ $v->name }}</a>
            @else

                <a href="{{ url("$v->val") }}" @if($category_val==$v->val) class="active m-item item m-mobile-hide" @else  class="m-item item m-mobile-hide" @endif><i class="clone outline icon"></i>{{ $v->name }}</a>
            @endif
        @endforeach
      <!--</div>-->
      <div class="right m-item item m-mobile-hide">
        <form name="search" action="#" method="post" target="_blank">
          <div class="ui icon transparent input m-margin-tb-tiny" style="color: white">
            <input style="color: white" type="text" name="query" placeholder="Search....">
            <i onclick="document.forms['search'].submit()" class="search link icon"></i>
          </div>
        </form>
      </div>
    </div>
  </div>
  <a href="#" class="ui menu toggle black icon button m-right-top m-mobile-show">
    <i class="sidebar icon"></i>
  </a>
</nav>
<!--导航结束-->


<!--子页面填充开始-->
@yield('content')
<!--子页面填充结束-->

<br>
<br>
<br>
<!--底部栏开始-->
<footer class="ui inverted vertical segment m-padded-tb-massive m-opacity">
    <!--容器-->
    <div class="ui center aligned container" >
        <div class="ui inverted divided stackable grid" style=" display: -webkit-flex;display: flex;-webkit-justify-content: center; justify-content: center;width: 100%">
            <div class="four wide column" >
                <div style="font-size: large;" class="ui inverted m-text-thin m-text-spaced m-margin-top-max" >联系我</div>
                <div class="ui inverted link list">
                    <div href="#" class="m-text-thin;">Email：840832887@qq.com</div>
                    <div href="#" class="m-text-thin;">QQ：840832887</div>
                </div>
            </div>

            <div class="four wide column">
                <div style="font-size: large;font-weight: bold;" class="ui inverted m-text-thin m-text-spaced m-margin-top-max" >统计</div>
                <div class="ui inverted link list" >
                	<div href="#" class="m-text-thin">项目名称：<a href="https://github.com/Wu-Changlin/laravel-linblog" class="ui  m-inline-block m-margin-top-null" style="font-size:medium;"> laravel-linblog</a> </div>
                	<div href="#" class="m-text-thin">框架版本：<h2  class="ui  m-inline-block m-margin-top-null" style="font-size:medium;">laravel-v5.50.</h2> </div>
                    <div href="#" class="m-text-thin">主题名称：<a href="https://github.com/oneStarLR/myblog-page" class="ui  m-inline-block m-margin-top-null" style="font-size:medium;">  myblog-page </a> </div>
                </div>
            </div>


            <div class="four wide column">
                <div style="font-size: large;font-weight: bold" class="ui inverted m-text-thin m-text-spaced m-margin-top-max" >统计</div>
                <div class="ui inverted link list">
                    <div href="#" class="m-text-thin">文章总数：<h2 class="ui orange header m-inline-block m-margin-top-null" style="font-size:medium;"> {{ $article_count }} </h2> 篇</div>
                    <div href="#" class="m-text-thin">访问总数：<h2 class="ui orange header m-inline-block m-margin-top-null" style="font-size:medium;"> {{ $article_visits }} </h2> 次</div>
                </div>
            </div>
        </div>
        <div class="ui inverted section divider"></div>
        <div style="color: #F08047;margin-top: -18px" class="ui inverted m-text-thin m-text-spaced"><span id="htmer_time" class="item m-text-thin"></span>已经到谷底了，每一步都是向上</div>
    </div>
</footer>
<!--底部栏结束-->



<script src="{{ asset('home/js/jquery.min.js') }}"></script>
<script src="{{ asset('home/static/semantic/semantic.min.js') }}"></script>
<script src="{{ asset('home/static/waypoints/jquery.waypoints.min.js') }}" th:src="@{/home/static/waypoints/jquery.waypoints.min.js}"></script>

<script type="text/javascript">

    $('.menu.toggle').click(function () {
        $('.m-item').toggleClass('m-mobile-show');
    });

</script>
@yield('js')
</body>
</html>