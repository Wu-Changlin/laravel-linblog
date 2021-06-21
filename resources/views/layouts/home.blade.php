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
        <a href="#" class="m-item item m-mobile-hide "><i class="home icon"></i>首页</a>
        <a href="#" class="m-item item m-mobile-hide"><i class="clone outline icon"></i>分类</a>
        <a href="#" class="m-item item m-mobile-hide"><i class="clock icon"></i>时间轴</a>
        <a href="#" class="m-item item m-mobile-hide"><i class="music icon"></i>音乐盒</a>
        <a href="#" class="m-item item m-mobile-hide"><i class="book icon"></i>留言板</a>
        <a href="#" class="m-item item m-mobile-hide"><i class="pencil alternate icon"></i>友人帐</a>
        <a href="#" class="m-item item m-mobile-hide"><i class="image icon"></i>照片墙</a>
        <a href="#" class="m-item item m-mobile-hide"><i class="info icon"></i>关于我</a>
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
                    <div href="#" class="m-text-thin">Email：onestarlr@hotmail.com</div>
                    <div href="#" class="m-text-thin">QQ：316392836</div>
                </div>
            </div>


            <div class="four wide column">
                <div style="font-size: large;font-weight: bold" class="ui inverted m-text-thin m-text-spaced m-margin-top-max" >网站信息</div>
                <div class="ui inverted link list">
                    <div href="#" class="m-text-thin">文章总数：<h2 class="ui orange header m-inline-block m-margin-top-null" style="font-size:medium;"> 14 </h2> 篇</div>
                    <div href="#" class="m-text-thin">访问总数：<h2 class="ui orange header m-inline-block m-margin-top-null" style="font-size:medium;"> 14 </h2> 次</div>
                    <div href="#" class="m-text-thin">文章总数：<h2 class="ui orange header m-inline-block m-margin-top-null" style="font-size:medium;"> 14 </h2> 篇</div>
                </div>
            </div>

        </div>
        <div class="ui inverted section divider"></div>
        <div style="color: #F08047;margin-top: -18px" class="ui inverted m-text-thin m-text-spaced">我的客栈已营业：<span id="htmer_time" class="item m-text-thin"></span> (*๓´╰╯`๓)</div>
        <a rel="nofollow" href="http://www.beian.miit.gov.cn" target="_blank">赣ICP备20004408号-1</a>
    </div>
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