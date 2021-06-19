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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" th:href="@{/css/app.css}">
    <link rel="stylesheet" href="{{ asset('home/static/semantic/semantic.min.css') }}">
    <link rel="stylesheet" href="{{asset('home/css/me.css')}}" th:href="@{/home/css/me.css}">
    @yield('css')
</head>
<body>


<!--导航开始-->
<nav  class="gird-header">
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
{{--<footer class="ui inverted vertical segment m-padded-tb-massive m-opacity">--}}
{{--    <!--容器-->--}}
{{--    <div class="ui center aligned container">--}}
{{--        <div class="ui inverted divided stackable grid">--}}
{{--            <div class="four wide column">--}}
{{--                <div style="font-size: large;font-weight: bold" class="ui inverted m-text-thin m-text-spaced m-margin-top-max" >联系我</div>--}}
{{--                <div class="ui inverted link list">--}}
{{--                    <div href="#" class="m-text-thin">Email：onestarlr@hotmail.com</div>--}}
{{--                    <div href="#" class="m-text-thin">QQ：316392836</div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="four wide column" >--}}
{{--                <div class="ui inverted link list">--}}
{{--                    <div class="item">--}}
{{--                        <!--微信二维码-->--}}
{{--                        <div style="font-size: large;font-weight: bold" class="ui inverted m-text-thin m-text-spaced " >关注公众号</div>--}}
{{--                        <img src="{{ asset('home/images/oneStar.jpg') }}" th:src="@{/home/images/oneStar.jpg}"  class="ui m-margin-top rounded image" alt="" style="width: 110px">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="four wide column">--}}
{{--                <div class="ui inverted link list">--}}
{{--                    <div class="item">--}}
{{--                        <!--微信二维码-->--}}
{{--                        <div style="font-size: large;font-weight: bold" class="ui inverted m-text-thin m-text-spaced " >问题交流（QQ群）</div>--}}
{{--                        <img src="{{ asset('home/images/QQ-question.jpg') }}" th:src="@{/home/images/QQ-question.jpg}"  class="ui m-margin-top rounded image" alt="" style="width: 110px">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--博客运行时间统计-->--}}
{{--            <div class="four wide column">--}}
{{--                <div style="font-size: large;font-weight: bold" class="ui inverted  m-text-thin m-text-spaced m-margin-top">客栈信息</div>--}}
{{--                <!--<p id="htmer_time" class="item m-text-thin"></p>-->--}}
{{--                <div id="blog-message">--}}
{{--                    <div class="ui inverted link list" style="align-content: center;margin-top: 10px">--}}
{{--                        <div class="m-text-thin" style="text-align: left;margin-left: 75px;">--}}
{{--                            文章总数： <h2 class="ui orange header m-inline-block m-margin-top-null" style="font-size:medium;"> 14 </h2> 篇--}}
{{--                        </div>--}}
{{--                        <div class="m-text-thin" style="text-align: left;margin-left: 75px">--}}
{{--                            访问总数： <h2 class="ui orange header m-inline-block m-margin-top-null" style="font-size:medium;"> 14 </h2> 次--}}
{{--                        </div>--}}
{{--                        <div class="m-text-thin" style="text-align: left;margin-left: 75px">--}}
{{--                            评论总数： <h2 class="ui orange header m-inline-block m-margin-top-null" style="font-size:medium;"> 14 </h2> 条--}}
{{--                        </div>--}}
{{--                        <div class="m-text-thin" style="text-align: left;margin-left: 75px">--}}
{{--                            留言总数： <h2 class="ui orange header m-inline-block m-margin-top-null" style="font-size:medium;"> 14 </h2> 条--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="ui inverted section divider"></div>--}}
{{--        <div style="color: #F08047;margin-top: -18px" class="ui inverted m-text-thin m-text-spaced">我的客栈已营业：<span id="htmer_time" class="item m-text-thin"></span> (*๓´╰╯`๓)</div>--}}
{{--        <a rel="nofollow" href="http://www.beian.miit.gov.cn" target="_blank">赣ICP备20004408号-1</a>--}}
{{--    </div>--}}
{{--    </div>--}}

{{--</footer>--}}
<!--底部栏结束-->

<footer id="b-foot">
    <div class="container">
        <div class="row b-content">
            <dl class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <dt>权益</dt>
                <dd>许可协议：<a rel="nofollow" href="https://creativecommons.org/licenses/by-nc-nd/4.0/deed.en" target="_blank">CC BY-NC 4.0</a></dd>
                <dd>版权所有：© 2014-2021</dd>
                <dd>联系邮箱：<a href="mailto:baijunyao@baijunyao.com">baijunyao@baijunyao.com</a></dd>
                <dd>ICP 备案：<a rel="nofollow" href="http://www.beian.miit.gov.cn" target="_blank">豫ICP备14009546号-3</a></dd>
            </dl>

            <dl class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <dt>架构</dt>
                <dd>项目名称：<a rel="nofollow" href="https://github.com/baijunyao/laravel-bjyblog" target="_blank">laravel-bjyblog</a></dd>
                <dd>博客版本：<a rel="nofollow" href="https://github.com/baijunyao/laravel-bjyblog" target="_blank">v15.0.11-develop</a></dd>
                <dd>框架版本：<a rel="nofollow" href="https://github.com/laravel/framework" target="_blank">laravel-v8.40.0</a></dd>
                <dd>项目作者：<a href="https://baijunyao.com">白俊遥</a></dd>
                <dd>主题名称：<a rel="nofollow" href="https://github.com/baijunyao/blog-theme-blueberry">blog-theme-blueberry</a></dd>
                <dd>主题作者：<a href="https://baijunyao.com">白俊遥</a></dd>
            </dl>

            <dl class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <dt>统计</dt>
                <dd>文章总数：198</dd>
                <dd>评论总数：4582</dd>
                <dd>登录用户：4376</dd>
                <dd>随言碎语：41</dd>
            </dl>

            <dl class="col-xs-12 col-sm-12 col-md-3 col-lg-3 b-social">
                <dt>Social</dt>
                <dd class="b-small-logo">
                    <a rel="nofollow" href="https://github.com/baijunyao" ><img src="https://baijunyao.com/images/home/social-github.png" alt="github"></a>
                </dd>
            </dl>
        </div>
    </div>
</footer>



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