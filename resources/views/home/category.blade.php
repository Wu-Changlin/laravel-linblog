@extends('layouts.home')

@section('title', '分类')

@section('keywords', '分类')

@section('description', '分类')


@section('content')
    <!-- 分类页开始 -->

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

        <!--居中内容开始-->
        <div  class="m-margin- animated fadeIn">
        <div class="ui container">
            <div class="ui segment m-padded-tb-large m-opacity">
                <div class="ui container" align="center">
                    <div class="ui labeled button m-margin-tb-tiny">
                        <a href="#" class="ui basic  button">好文</a>
                        <div class="ui basic  left pointing label">24</div>
                    </div>
                </div>
            </div>

            <div class="ui top attached teal m-opacity segment">
                <div class="ui padded vertical segment m-padded-tb-large">
                    <div class="ui middle aligned mobile reversed stackable grid" >
                        <div class="eleven wide column">
                            <h3 class="ui header" ><a href="#">大圣，此去欲何?</a></h3>
                            <p class="m-text">戴上金箍，没法爱你；放下金箍，没法保护你。我知道上天不会给我第二次机会，曾经我们说好的永远，原来也仅仅只有，十二画，而已。“大圣，此去欲何?”“踏南天，碎凌霄。”“若一去不回……”“便一去不回” 其实很多时候，我们都是有机会的，最后真正放弃的，是我们自己。......</p>
                            <div class="ui grid">
                                <div class="eleven wide column">
                                    <div class="ui mini horizontal link list">
                                        <div class="item">
                                            <img src="../static/images/me.jpg"  alt="" class="ui avatar image">
                                            <div class="content"><a href="#" target="_blank" class="header">oneStar</a></div>
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

                        <div class="five wide column">
                            <a href="#" target="_blank">
                                <img src="../static/images/backimg1.jpg" alt="" class="ui rounded image">
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <!--分页-->
            <div class="ui bottom attached segment m-opacity stackable grid">
                <div class="three wide column" align="center">
                    <a class="item">上一页</a>
                </div>

                <div class="ten wide column" align="center">
                    <p> <span></span> / <span></span> </p>
                </div>

                <div class="three wide column" align="center">
                    <a class="item">下一页</a>
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

    <!-- 分类页结束 -->
@endsection

