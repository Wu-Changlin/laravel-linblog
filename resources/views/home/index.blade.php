@extends('layouts.home')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '博客,个人博客,博客模板,个人博客模板,技术博客,博客系统,laravel博客,php博客')

@section('description', '霖的php博客,个人技术博客,开源一些thinkphp,laravel相关的博客系统项目,写一些技术文章.')



@section('content')
<!-- 首页内容开始 -->


    <!--顶部图片开始-->
    <div id="top_img" class="m-bg-type_outer" style="width: 100%;height: 50%">
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

    <!--最新推荐开始-->
    <div   class="ui m-padded-tb-large">
        <div class="ui m-container-small m-opacity">
            <div class="ui secondary segment " align="center">
                <i class="bookmark icon"></i>最新推荐
            </div>
        </div>
        <div class="ui stackable m-container-mini m-opacity grid">
            <div class="m-margin-tb-tiny four wide column">
                <a href="#" class="class_outer" target="_blank">
                    <img src="{{ asset('home/images/backimg1.jpg') }}" alt="" class="ui rounded image">
                    <span class="class_cover" >
                         <h4 class="m-font-size-blog-text m-margin-tb-tiny">大圣，此去欲何?</h4>
                      </span>
                </a>
            </div>
            <div class="m-margin-tb-tiny four wide column">
                <a href="#" class="class_outer" target="_blank">
                    <img src="{{ asset('home/images/backimg1.jpg') }}" alt="" class="ui rounded image">
                    <span class="class_cover" >
                         <h4 class="m-font-size-blog-text m-margin-tb-tiny">此去欲何?</h4>
                      </span>
                </a>
            </div>
        </div>
    </div>
    <!--最新推荐结束-->

    <!--居中内容开始-->
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
                                                <img src=" {{ asset('home/images/me.jpg ') }}"  alt="" class="ui avatar image">
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
                                    <img src=" {{ asset('home/images/backimg1.jpg ') }}" alt="" class="ui rounded image">
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
    <!--居中内容结束-->



    <!--置顶图标-->
    <div class="m-padded-tb-large m-fixed m-right-bottom">
        <a href="#" class="ui icon button"><i class="chevron up icon"></i> </a>
    </div>
    <!--置顶图标结束-->


<!-- 首页内容结束 -->
@endsection

