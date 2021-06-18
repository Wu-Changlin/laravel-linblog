<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.w3.org/1999/xhtml">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONESTAR-首页</title>
    <link rel="stylesheet" href="../static/css/app.css" th:href="@{/css/app.css}">
    <!-- <link href="../static/images/me.jpg" th:href="@{/images/me.jpg}" rel="icon" type="image/x-ico"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.4/semantic.min.css"> -->
    <link rel="stylesheet" href="../static/lib/semantic/semantic.min.css">
    <link rel="stylesheet" href="../static/css/me.css" th:href="@{/css/me.css}">
   <style type="text/css">

   </style>


</head>
<body>


<!--导航-->
<nav class="gird-header">
  <div class="ui container">
    <div class="ui inverted secondary stackable menu">
      <h2 class="ui olive header item" style="font-family: STSong">ONESTAR</h2>
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


<!--顶部图片-->
<div class="m-bg-type_outer" style="width: 100%;height: 50%">
  <img src="../static/images/bg.jpg" alt="" class="ui m-bg image" style="width: 100%;height: 100%">
  <div class="m-bg-class_cover">
    <div class="ui container" style="position: relative ;bottom: -540px;">
      <h2 class="m-font-size-title-large" align="center">Markdown编辑</h2>
      <div class="ui container" align="center">
        <div class="ui horizontal link list" align="center">
          <div class="item">
            <div class="ui orange basic label" style="font-size: 7px">原创</div>
          </div>
          <div class="item">
            <i class="user outline outline icon m-font-size-text-mini"></i>
            <a href="#" style="color: #ffffff;font-size: 18px">oneStar</a>
          </div>
          <div class="item">
            <i class="calendar icon m-font-size-text-mini"></i>
            <span class="m-font-size-text-mini">2020-01-01</span>
          </div>
          <div class="item">
            <i class="clone icon m-font-size-text-mini"></i>
            <a href="#" target="_blank" style="color: #ffffff;font-size: 16px">我的故事</a>
          </div>
          <div class="item">
            <i class="eye icon m-font-size-text-mini"></i> <span class="m-font-size-text-mini">2222</span>
          </div>
          <div class="item">
            <i class="comment outline icon m-font-size-text-mini"></i>
            <span class="m-font-size-text-mini">2222</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!--最新推荐-->
<div class="ui m-padded-tb-large">
    <div class="ui m-container-small m-opacity">
        <div class="ui secondary segment " align="center">
            <i class="bookmark icon"></i>最新推荐
        </div>
    </div>
    <div class="ui stackable m-container-mini m-opacity grid">
        <div class="m-margin-tb-tiny four wide column">
            <a href="#" class="class_outer" target="_blank">
                <img src="../static/images/backimg1.jpg" alt="" class="ui rounded image">
                <span class="class_cover" >
                     <h4 class="m-font-size-blog-text m-margin-tb-tiny">大圣，此去欲何?</h4>
                  </span>
            </a>
        </div>
        <div class="m-margin-tb-tiny four wide column">
            <a href="#" class="class_outer" target="_blank">
                <img src="../static/images/backimg1.jpg" alt="" class="ui rounded image">
                <span class="class_cover" >
                     <h4 class="m-font-size-blog-text m-margin-tb-tiny">此去欲何?</h4>
                  </span>
            </a>
        </div>
    </div>
</div>


<!--中间内容-->
<div class="m-padded-tb-big animated fadeIn">
    <div class="ui container">
        <div class="ui stackable grid">
            <!--博客内容-->
            <div class="ui vertical segment">
                <div class="ui m-container-small m-opacity">
                    <div class="ui secondary segment " align="center">
                        <i class="bookmark icon"></i>最新文章
                    </div>
                </div>
                <!--博文列表-->
                <div class="ui padded segment m-padded-tb-large m-opacity">
                    <div class="ui large aligned mobile reversed stackable grid">
                        <!--博文信息-->
                        <div class="eleven wide column ">
                            <h3 class="ui header" ><a href="#" target="_blank" class="m-black">大圣，此去欲何?</a></h3>
                            <p class="m-text m-margin-top-max">戴上金箍，没法爱你；放下金箍，没法保护你。我知道上天不会给我第二次机会，曾经我们说好的永远，原来也仅仅只有，十二画，而已。“大圣，此去欲何?”“踏南天，碎凌霄。”“若一去不回……”“便一去不回” 其实很多时候，我们都是有机会的，最后真正放弃的，是我们自己。......</p>
                            <div class="ui m-margin-top-max grid">
                                <div class="eleven wide column">
                                    <div class="ui mini horizontal link list">
                                        <div class="item">
                                            <img src="../static/images/me.jpg"  alt="" class="ui avatar image">
                                            <div class="content"><a href="#" target="_blank" class="header" >oneStar</a></div>
                                        </div>
                                        <div class="item">
                                            <i class="calendar icon"></i><span>2020-01-01</span>
                                        </div>
                                        <div class="item">
                                            <i class="eye icon"></i> <span>2222</span>
                                        </div>
                                        <div class="item">
                                            <i class="comment outline icon"></i> <span>2222</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="right aligned five wide column">
                                    <a href="#" target="_blank" class="ui teal basic label m-padded-tiny m-text-thin">好文</a>
                                </div>
                            </div>
                        </div>
                        <!--博文图片-->
                        <div class="five wide column">
                            <a href="#" target="_blank">
                                <img src="../static/images/backimg1.jpg" alt="" class="ui rounded image">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <!--分页-->

<div class="row">

    <div class="col-xs-12 col-md-12 col-lg-12 b-page text-center">
    <ul class="pagination">
        <li class="disabled"><span>上一页</span></li>
        <li class="active"><span>1</span></li>
        <li><a href="https://baijunyao.com?page=2">2</a></li>
        <li><a href="https://baijunyao.com?page=3">3</a></li>
        <li><a href="https://baijunyao.com?page=4">4</a></li>
        <li><a href="https://baijunyao.com?page=5">5</a></li>
        <li><a href="https://baijunyao.com?page=6">6</a></li>
        <li><a href="https://baijunyao.com?page=7">7</a></li>
        <li><a href="https://baijunyao.com?page=8">8</a></li>
        <li><a href="https://baijunyao.com?page=9">9</a></li>
        <li><a href="https://baijunyao.com?page=10">10</a></li>
        <li class="disabled"><span>...</span></li>
        <li><a href="https://baijunyao.com?page=19">19</a></li>
        <li><a href="https://baijunyao.com?page=20">20</a></li>
        <li><a href="https://baijunyao.com?page=2" rel="next">下一页</a></li>
    </ul>
    </div>
</div>

 

        </div>
    </div>

</div>


<!--置顶图标-->
<div class="m-padded-tb-large m-fixed m-right-bottom">
    <a href="#" class="ui icon button"><i class="chevron up icon"></i> </a>
</div>



<br>
<br>
<br>
<!--底部栏-->
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
                        <img src="../static/images/oneStar.jpg" th:src="@{/images/oneStar.jpg}"  class="ui m-margin-top rounded image" alt="" style="width: 110px">
                    </div>
                </div>
            </div>

            <div class="four wide column">
                <div class="ui inverted link list">
                    <div class="item">
                        <!--微信二维码-->
                        <div style="font-size: large;font-weight: bold" class="ui inverted m-text-thin m-text-spaced " >问题交流（QQ群）</div>
                        <img src="../static/images/QQ-question.jpg" th:src="@{/images/QQ-question.jpg}"  class="ui m-margin-top rounded image" alt="" style="width: 110px">
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



<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.2/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/semantic-ui/2.2.4/semantic.min.js"></script> -->
<script src="../static/js/jquery.min.js"></script>
<script src="../static/lib/semantic/semantic.min.js"></script>
<script src="../static/lib/waypoints/jquery.waypoints.min.js" th:src="@{/lib/waypoints/jquery.waypoints.min.js}"></script>

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