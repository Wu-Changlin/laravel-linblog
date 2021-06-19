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
</head>
<body>


<!--导航开始-->
<nav class="gird-header">
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

<!--顶部图片开始-->
<div class="m-bg-type_outer" style="width: 100%;height: 50%">
  <img src="{{ asset('home/images/bg.jpg') }}" alt="" class="ui m-bg image" style="width: 100%;height: 100%">
  <div class="m-bg-class_cover">
    <div class="ui container" style="position: relative ;bottom: -540px;">
      <h2 class="m-font-size-title-large" align="center">古之燧火，今之星火，明之你我；点燃思想火炬，照亮别人,温暖自己。</h2>
      <div class="ui container" align="center">
        <div class="ui horizontal link list" align="center">
          <div class="item">
            <a href="#" style="color: #ffffff;font-size: 18px">没有人相当英雄，但总要有人去完成使命。</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--顶部图片结束-->

<!--子页面填充开始-->
@yield('content')
<!--子页面填充结束-->

<br>
<br>
<br>
<!--底部栏开始-->
<footer class="ui inverted vertical segment m-padded-tb-massive m-opacity">
    <!--容器-->
    <div class="ui center aligned container">
        <div class="ui inverted divided stackable grid">
            <div class="four wide column">
                <div style="font-size: large;font-weight: bold" class="ui inverted m-text-thin m-text-spaced m-margin-top-max" >联系我</div>
                <div class="ui inverted link list">
                    <div href="#" class="m-text-thin">Email：onestarlr@hotmail.com</div>
                    <div href="#" class="m-text-thin">QQ：316392836</div>
                </div>
            </div>

            <div class="four wide column" >
                <div class="ui inverted link list">
                    <div class="item">
                        <!--微信二维码-->
                        <div style="font-size: large;font-weight: bold" class="ui inverted m-text-thin m-text-spaced " >关注公众号</div>
                        <img src="{{ asset('home/images/oneStar.jpg') }}" th:src="@{/home/images/oneStar.jpg}"  class="ui m-margin-top rounded image" alt="" style="width: 110px">
                    </div>
                </div>
            </div>

            <div class="four wide column">
                <div class="ui inverted link list">
                    <div class="item">
                        <!--微信二维码-->
                        <div style="font-size: large;font-weight: bold" class="ui inverted m-text-thin m-text-spaced " >问题交流（QQ群）</div>
                        <img src="{{ asset('home/images/QQ-question.jpg') }}" th:src="@{/home/images/QQ-question.jpg}"  class="ui m-margin-top rounded image" alt="" style="width: 110px">
                    </div>
                </div>
            </div>
            <!--博客运行时间统计-->
            <div class="four wide column">
                <div style="font-size: large;font-weight: bold" class="ui inverted  m-text-thin m-text-spaced m-margin-top">客栈信息</div>
                <!--<p id="htmer_time" class="item m-text-thin"></p>-->
                <div id="blog-message">
                    <div class="ui inverted link list" style="align-content: center;margin-top: 10px">
                        <div class="m-text-thin" style="text-align: left;margin-left: 75px;">
                            文章总数： <h2 class="ui orange header m-inline-block m-margin-top-null" style="font-size:medium;"> 14 </h2> 篇
                        </div>
                        <div class="m-text-thin" style="text-align: left;margin-left: 75px">
                            访问总数： <h2 class="ui orange header m-inline-block m-margin-top-null" style="font-size:medium;"> 14 </h2> 次
                        </div>
                        <div class="m-text-thin" style="text-align: left;margin-left: 75px">
                            评论总数： <h2 class="ui orange header m-inline-block m-margin-top-null" style="font-size:medium;"> 14 </h2> 条
                        </div>
                        <div class="m-text-thin" style="text-align: left;margin-left: 75px">
                            留言总数： <h2 class="ui orange header m-inline-block m-margin-top-null" style="font-size:medium;"> 14 </h2> 条
                        </div>
                    </div>
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

<script>

    // $('#newblog-container').load(/*[[@{/footer/newblog}]]*/"/footer/newblog");


    // 运行时间统计
    function secondToDate(second) {
        if (!second) {
            return 0;
        }
        var time = new Array(0, 0, 0, 0, 0);
        if (second >= 365 * 24 * 3600) {
            time[0] = parseInt(second / (365 * 24 * 3600));
            second %= 365 * 24 * 3600;
        }
        if (second >= 24 * 3600) {
            time[1] = parseInt(second / (24 * 3600));
            second %= 24 * 3600;
        }
        if (second >= 3600) {
            time[2] = parseInt(second / 3600);
            second %= 3600;
        }
        if (second >= 60) {
            time[3] = parseInt(second / 60);
            second %= 60;
        }
        if (second > 0) {
            time[4] = second;
        }
        return time;
    }
    function setTime() {
        /*此处为网站的创建时间*/
        var create_time = Math.round(new Date(Date.UTC(2020, 01, 25, 15, 15, 15)).getTime() / 1000);
        var timestamp = Math.round((new Date().getTime() + 8 * 60 * 60 * 1000) / 1000);
        currentTime = secondToDate((timestamp - create_time));
        currentTimeHtml = currentTime[0] + '年' + currentTime[1] + '天'
            + currentTime[2] + '时' + currentTime[3] + '分' + currentTime[4]
            + '秒';
        document.getElementById("htmer_time").innerHTML = currentTimeHtml;
    }
    setInterval(setTime, 1000);


    $('.menu.toggle').click(function () {
        $('.m-item').toggleClass('m-mobile-show');
    });

    
    // 导航栏显示
    // var waypoint = new Waypoint({
    //     element: document.getElementById('waypoint'),
    //     // handler: function(direction) {
    //     //     if (direction == 'down') {
    //     //         $('#nav').show(500);
    //     //     } else {
    //     //         $('#nav').hide(500);
    //     //     }
    //     //     console.log('Scrolled to waypoint!  ' + direction);
    //     // }
    // })
</script>
</body>
</html>