@extends('layouts.home')

@section('title', '首页')

@section('keywords', '首页')

@section('description', '首页')



@section('content')
    <!-- 首页开始 -->

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

                                            <div class="ui  horizontal  list">
                                                <div class="item">
                                                    <div class="middle aligned top">
                                                        <i class="user icon"></i>
                                                        <span>Lin</span>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="middle aligned top">
                                                        <i class="calendar alternate outline icon"></i>
                                                        <span>2019-03-17 14:11:56</span>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="middle aligned top">
                                                        <i class="clipboard list icon"></i>
                                                        <span>分类</span>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="middle aligned top">
                                                        <i class="tag icon"></i></i>
                                                        <span>标签</span>
                                                    </div>
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

                    <!--分页开始-->
{{--                    <div style="width: 100%">--}}
{{--                        {{$category->links()}}--}}
{{--                    </div>--}}
                    <!--分页结束-->

                </div>
            </div>

        </div>
        <!--居中内容结束-->

        <!--置顶图标-->
        <div class="m-padded-tb-large m-fixed m-right-bottom">
            <a href="#" class="ui icon button"><i class="chevron up icon"></i> </a>
        </div>
        <!--置顶图标结束-->

    <!-- 首页结束 -->
@endsection

