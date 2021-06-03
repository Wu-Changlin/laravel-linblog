<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>白俊遥博客,技术博客,个人博客模板,php博客系统</title>
    <meta name="keywords" content="博客,个人博客,博客模板,个人博客模板,技术博客,博客系统,laravel博客,php博客" />
    <meta name="description" content="白俊遥的php博客,个人技术博客,分享免费个人博客模板,开源一些thinkphp,laravel相关的博客系统项目,bjy,blog和bjy,admin官网,写一些技术文章." />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="author" content="baijunyao,baijunyao@baijunyao.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href=" {{asset('home/dist/css/app.css')}}">
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet" type="text/css" />
</head>

<body>
<!-- 顶部导航开始 -->
<header id="b-public-nav" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <div class="hidden-xs b-nav-background"></div>
                <ul class="b-logo-code">
                    <li class="b-lc-start">&lt;?php</li>
                    <li class="b-lc-echo">echo</li>
                </ul>
                <p class="b-logo-word">'白俊遥博客'</p>
                <p class="b-logo-end">;</p>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav b-nav-parent">
                <li class="hidden-xs b-nav-mobile"></li>
                <li class="b-nav-cname   b-nav-active ">
                    <a href="/">首页</a>
                </li>
                <li class="b-nav-cname ">
                    <a href="https://baijunyao.com/category/27">PHP</a>
                </li>
                <li class="b-nav-cname ">
                    <a href="https://baijunyao.com/category/28">前端</a>
                </li>
                <li class="b-nav-cname ">
                    <a href="https://baijunyao.com/category/29">Linux</a>
                </li>
                <li class="b-nav-cname ">
                    <a href="https://baijunyao.com/category/30">技术之外</a>
                </li>
                <li class="b-nav-cname ">
                    <a href="https://baijunyao.com/category/31">乱七八糟</a>
                </li>
                <li class="b-nav-cname ">
                    <a href="https://baijunyao.com/chat">随言碎语</a>
                </li>
                <li class="b-nav-cname hidden-sm  ">
                    <a href="https://baijunyao.com/git">开源项目</a>
                </li>
            </ul>
            <ul id="b-login-word" class="nav navbar-nav navbar-right">
                <li class="b-nav-cname b-nav-login">
                    <div class="hidden-xs b-login-mobile"></div>
                    <a class="js-login-btn" href="javascript:;">登录</a>
                </li>
            </ul>
        </div>
    </div>
</header>
<!-- 顶部导航结束 -->
<div class="b-h-70"></div>
<div id="b-content" class="container">
    <div class="row">
        <!-- 左侧列表开始 -->
        <div class="col-xs-12 col-md-12 col-lg-8">
            <!-- 循环文章列表开始 -->
            <div class="row b-one-article">
                <h3 class="col-xs-12 col-md-12 col-lg-12">
                    <a class="b-oa-title" href="https://baijunyao.com/article/154" target="_blank">laravel下TNTSearch+jieba-php实现全文搜索</a>
                </h3>
                <div class="col-xs-12 col-md-12 col-lg-12 b-date">
                    <ul class="row">
                        <li class="col-xs-5 col-md-2 col-lg-3">
                            <i class="fa fa-user"></i> 白俊遥
                        </li>
                        <li class="col-xs-7 col-md-3 col-lg-3">
                            <i class="fa fa-calendar"></i> 2018-05-27 14:37:39
                        </li>
                        <li class="col-xs-5 col-md-2 col-lg-2">
                            <i class="fa fa-list-alt"></i> <a href="https://baijunyao.com/category/27" target="_blank">PHP</a>
                        </li>
                        <li class="col-xs-7 col-md-5 col-lg-4 "><i class="fa fa-tags"></i>
                            <a class="b-tag-name" href="https://baijunyao.com/tag/42" target="_blank">laravel</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="row">
                        <!-- 文章封面图片开始 -->
                        <div class="col-sm-6 col-md-6 col-lg-4 hidden-xs">
                            <figure class="b-oa-pic b-style1">
                                <a href="https://baijunyao.com/article/154" target="_blank">
                                    <img src="https://baijunyao.com/uploads/article/20180527/5b0a5232d696f.jpg" alt="白俊遥博客" title="白俊遥博客">
                                </a>
                                <figcaption>
                                    <a href="https://baijunyao.com/article/154" target="_blank"></a>
                                </figcaption>
                            </figure>
                        </div>
                        <!-- 文章封面图片结束 -->
                        <!-- 文章描述开始 -->
                        <div class="col-xs-12 col-sm-6  col-md-6 col-lg-8 b-des-read">
                            上篇文章我们简单介绍了全文搜索的方案；；TNTSearch+jiebaphp这套组合可以在不依赖第三方的情况下实现中文全文搜索；特别的适合博客这种小项目；我新建一个项目用于演示；```bashlaravel new tntsearch```创建一个文章表和文章模型；```bashphp artisan make:model Models/Article m...
                        </div>
                        <!-- 文章描述结束 -->
                    </div>
                </div>
                <a class=" b-readall" href="https://baijunyao.com/article/154" target="_blank">阅读全文</a>
            </div>
            <div class="row b-one-article">
                <h3 class="col-xs-12 col-md-12 col-lg-12">
                    <a class="b-oa-title" href="https://baijunyao.com/article/145" target="_blank">php编辑word内容通过unoconv调用LibreOffice输出pdf打印</a>
                </h3>
                <div class="col-xs-12 col-md-12 col-lg-12 b-date">
                    <ul class="row">
                        <li class="col-xs-5 col-md-2 col-lg-3">
                            <i class="fa fa-user"></i> 白俊遥
                        </li>
                        <li class="col-xs-7 col-md-3 col-lg-3">
                            <i class="fa fa-calendar"></i> 2018-03-25 21:58:21
                        </li>
                        <li class="col-xs-5 col-md-2 col-lg-2">
                            <i class="fa fa-list-alt"></i> <a href="https://baijunyao.com/category/27" target="_blank">PHP</a>
                        </li>
                        <li class="col-xs-7 col-md-5 col-lg-4 "><i class="fa fa-tags"></i>
                            <a class="b-tag-name" href="https://baijunyao.com/tag/51" target="_blank">word</a>
                            <a class="b-tag-name" href="https://baijunyao.com/tag/52" target="_blank">pdf</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="row">
                        <!-- 文章封面图片开始 -->
                        <div class="col-sm-6 col-md-6 col-lg-4 hidden-xs">
                            <figure class="b-oa-pic b-style1">
                                <a href="https://baijunyao.com/article/145" target="_blank">
                                    <img src="https://baijunyao.com/uploads/article/20180325/5ab7aaf894623.jpeg" alt="白俊遥博客" title="白俊遥博客">
                                </a>
                                <figcaption>
                                    <a href="https://baijunyao.com/article/145" target="_blank"></a>
                                </figcaption>
                            </figure>
                        </div>
                        <!-- 文章封面图片结束 -->
                        <!-- 文章描述开始 -->
                        <div class="col-xs-12 col-sm-6  col-md-6 col-lg-8 b-des-read">
                            关于我把 word 和 pdf 来回整的故事；我有一段血泪史；惊天地；泣鬼神；痛彻心扉；穿越前世今生；今天我准备熬夜把它控诉一遍；之前有一些愚蠢的人类给了伟大的程序猿一份 word 文档；里面就一段文字；需求是能动态的替换其中的部分内容；然后转成 pdf 供用户下载；这简单啊；还要啥 word 文档啊；直接手动把内容复制出来；放好占位符用 php...
                        </div>
                        <!-- 文章描述结束 -->
                    </div>
                </div>
                <a class=" b-readall" href="https://baijunyao.com/article/145" target="_blank">阅读全文</a>
            </div>
            <!-- 循环文章列表结束 -->
            <!-- 列表分页开始 -->
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
                        <li class="disabled"><span>...</span></li>
                        <li><a href="https://baijunyao.com?page=13">13</a></li>
                        <li><a href="https://baijunyao.com?page=14">14</a></li>
                        <li><a href="https://baijunyao.com?page=2" rel="next">下一页</a></li>
                    </ul>
                </div>
            </div>
            <!-- 列表分页结束 -->
        </div>
        <!-- 左侧列表结束 -->
        <!-- 通用右部区域开始 -->
        <div id="b-public-right" class="col-lg-4 hidden-xs hidden-sm hidden-md">
            <div class="b-search">
                <form class="form-inline" role="form" action="https://baijunyao.com/search" method="get">
                    {{ csrf_field() }}
                    <input class="b-search-text" type="text" name="wd">
                    <input class="b-search-submit" type="submit" value="全站搜索">
                </form>
            </div>
            <div class="b-qun">
                <h4 class="b-title">加入组织</h4>
                <ul class="b-all-tname">
                    <li class="b-qun-or-code">
                        <img src="" alt="QQ">
                    </li>
                    <li class="b-qun-word">
                        <p class="b-qun-nuber">
                            1. 手Q扫左侧二维码
                        </p>
                        <p class="b-qun-nuber">
                            2. 搜Q群：88199093
                        </p>
                        <p class="b-qun-code">
                            3. 点击<a href="https://shang.qq.com/wpa/qunwpa?idkey=bba3fea90444ee6caf1fb1366027873fe14e86bada254d41ce67768fadd729ee" target="_blank" rel="nofollow"><img border="0" src="https://pub.idqqimg.com/wpa/images/group.png" alt="白俊遥博客群" title="白俊遥博客群"></a>
                        </p>
                        <p class="b-qun-article">
                            <a href="https://baijunyao.com/article/124" target="_blank">创建QQ群及捐赠渠道</a>
                        </p>
                    </li>
                </ul>
            </div>
            <div class="b-tags">
                <h4 class="b-title">热门标签</h4>
                <ul class="b-all-tname">
                    <li class="b-tname">
                        <a class="tstyle-1" href="https://baijunyao.com/tag/20">Linux (7)</a>
                    </li>
                    <li class="b-tname">
                        <a class="tstyle-2" href="https://baijunyao.com/tag/21">Centos (3)</a>
                    </li>
                    <li class="b-tname">
                        <a class="tstyle-3" href="https://baijunyao.com/tag/22">Apache (5)</a>
                    </li>
                    <li class="b-tname">
                        <a class="tstyle-4" href="https://baijunyao.com/tag/23">虚拟主机 (5)</a>
                    </li>
                    <li class="b-tname">
                        <a class="tstyle-1" href="https://baijunyao.com/tag/24">wamp (3)</a>
                    </li>
                    <li class="b-tname">
                        <a class="tstyle-2" href="https://baijunyao.com/tag/25">励志 (2)</a>
                    </li>
                </ul>
            </div>
            <div class="b-recommend">
                <h4 class="b-title">置顶推荐</h4>
                <p class="b-recommend-p">
                    <a class="b-recommend-a" href="https://baijunyao.com/article/131" target="_blank"><span class="fa fa-th-list b-black"></span> 最适合入门的laravel初级教程(一)序言</a>
                </p>
            </div>
            <div class="b-comment-list">
                <h4 class="b-title">最新评论</h4>
                <div>
                    <ul class="b-new-comment ">
                        <img class="b-head-img js-head-img"  alt="taoguangc">
                        <li class="b-nickname">
                            taoguangc<span>1天前</span>
                        </li>
                        <li class="b-nc-article">
                            在<a href="https://baijunyao.com/article/132" target="_blank">本地开发自定义域名后缀</a>中评论
                        </li>
                        <li class="b-content">
                            我懒癌。。。不写后缀。
                        </li>
                    </ul>
                </div>
            </div>
            <div class="b-link">
                <h4 class="b-title">友情链接</h4>
                <p>
                    <a class="b-link-a" href="https://baijunyao.com" target="_blank">
                        <span class="fa fa-link b-black"></span> 白俊遥博客
                    </a>
                </p>
            </div>
        </div>
        <!-- 通用右部区域结束 -->
    </div>
</div>
<!-- 主体部分结束 -->

<!-- 通用底部开始 -->
<footer id="b-foot">
    <div class="container">
        <div class="row b-content">
            <dl class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <dt>权益</dt>
                <dd>许可协议：<a href="https://creativecommons.org/licenses/by-nc/4.0/deed.zh">CC BY-NC 4.0</a></dd>
                <dd>版权所有：© 2014-2018 baijunyao.com</dd>
                <dd>网站备案：豫ICP备14009546号-3</dd>
                <dd>联系邮箱：<a href="mailto:baijunyao@baijunyao.com">baijunyao@baijunyao.com</a></dd>
            </dl>

            <dl class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <dt>架构</dt>
                <dd>项目名称：<a rel="nofollow" href="https://github.com/baijunyao/laravel-bjyblog" target="_blank">laravel-bjyblog</a></dd>
                <dd>版本分支：v5.5.2.0-test</dd>
                <dd>项目作者：<a href="https://baijunyao.com">白俊遥</a></dd>
                <dd>主题名称：<a rel="nofollow" href="https://github.com/baijunyao/blog-theme-blueberry">blog-theme-blueberry</a></dd>
                <dd>主题作者：<a href="https://baijunyao.com">白俊遥</a></dd>
            </dl>

            <dl class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <dt>统计</dt>
                <dd>文章总数：140</dd>
                <dd>评论总数：3581</dd>
                <dd>登录用户：2920</dd>
                <dd>随言碎语：38</dd>
            </dl>
        </div>
    </div>
    <a class="go-top fa fa-angle-up animated jello" href="javascript:;"></a>
</footer>
<!-- 通用底部结束 -->

<!-- 登录模态框开始 -->
<div class="modal fade" id="b-modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title b-ta-center" id="myModalLabel">无需注册，用以下帐号即可直接登录</h4>
                </div>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12 b-login-row">
                <ul class="row">
                    <li class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                        <a href="https://baijunyao.com/auth/oauth/redirectToProvider/qq"><img src="https://baijunyao.com/images/home/qq-login.png" alt="QQ登录" title="QQ登录"></a>
                    </li>
                    <li class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                        <a href="https://baijunyao.com/auth/oauth/redirectToProvider/weibo"><img src="https://baijunyao.com/images/home/sina-login.png" alt="微博登录" title="微博登录"></a>
                    </li>
                    <li class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                        <a href="https://baijunyao.com/auth/oauth/redirectToProvider/github"><img src="https://baijunyao.com/images/home/github-login.jpg" alt="github登录" title="github登录"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- 登录模态框结束 -->


</body>
<script src="{{asset('home/dist/js/app.js')}}"></script>
<script src="{{asset('home/statics/jquery-2.2.4/jquery.min.js')}}"></script>
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
    @if(session('msg'))
    toastr.error("{{ session('msg') }}");
    @endif
</script>
</html>