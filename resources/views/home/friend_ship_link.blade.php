@extends('layouts.home')

@section('title', $head['title'])

@section('keywords', $head['keywords'])

@section('description',  $head['description'])

@section('css')
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!--友链页开始-->

        <!--顶部图片开始-->
        <div  class="m-bg-type_outer" style="width: 100%;height: 50%">
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

        <!--友链内容开始-->
        <div id="waypoint" class="m-margin- animated fadeIn">
        <div class="ui m-opacity container">
            <div class="box-shadow-max">
                <div class="ui segment m-padded-tb-large m-opacity">
                    <div class="ui container">
                        <h1 class="" align="center">友人入帐须知</h1>

                        <ui class="list">
                            <div class="m-margin-left-mini m-margin-tb-tiny" style="font-size: large;font-weight: bold">网站要求</div>
                            <br>
                            <li class="m-margin-left-big m-margin-tb-tiny" style="font-size: medium">无色情内容，无政治敏感内容，网站要能长期正常访问</li>
                            <li class="m-margin-left-big m-margin-tb-tiny" style="font-size: medium">二十篇以上个人原创文章，两个月内有新文章更新</li>
                            <li class="m-margin-left-big m-margin-tb-tiny" style="font-size: medium">原创博客、技术博客、游记博客优先</li>
                            <li class="m-margin-left-big m-margin-tb-tiny" style="font-size: medium">需要交换友链，先把本站添加到你的网站中，然后根据下面的格式，给我发email或在页面底部添加~</li>
                            <br>
                            <div class="m-margin-left-mini m-margin-tb-tiny" style="font-size: large;font-weight: bold">申请格式</div>
                            <br>
                            <li class="m-margin-left-big m-margin-tb-tiny" style="font-size: medium;word-wrap:break-word">博客标题：Lin</li>
                            <li class="m-margin-left-big m-margin-tb-tiny" style="font-size: medium;word-wrap:break-word">博客地址：https://www.linyuxianyu.cn/</li>
                            <li class="m-margin-left-big m-margin-tb-tiny" style="font-size: medium;word-wrap:break-word">图片地址：https://www.linyuxianyu.cn/me.jpg</li>
                        </ui>
                    </div>
                </div>
            </div>

            <!--友人帐区域-->
            <div class="box-shadow-max">
                <div class="ui top attached teal m-opacity segment box-shadow-max">
                    <div class="ui m-padded-tb-large m-container-tiny">
                        <div class="ui stackable m-container-mini m-opacity grid">

                            <!--友人帐显示区域-->

                            @foreach( $friends as $v)
                                <div class="m-margin-tb-tiny four wide column">
                                    <a href="{{ $v->url }}" class="class_outer" target="_blank">
                                        <div align="center">
                                            <div class="friends-link">
                                                <img src="{{ $v->cover?:asset('home/images/default.jpg')}}"  alt="" class="friends-link-image">
                                                <div class="m-margin-top">
                                                    <h4 class="m-font-size-text-friends m-margin-tb-tiny">{{ $v->name}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
        <!--友链内容结束-->

        <!--添加友链开始-->
        <div class="m-container-small m-padded-tb-massive">
            <div class="ui container">
                <form action="{{ url('addFriend') }}" method="post" class="ui form">
                    {{ csrf_field() }}
                    <div class=" field">
                        <div class="ui left labeled input m-margin-top">
                            <label class="ui teal basic label">博客名称</label>
                            <input type="text" required="" name="blogname" placeholder="博客名称">
                        </div>
                        <div class="ui left labeled input m-margin-top">
                            <label class="ui teal basic label">博客地址</label>
                            <input type="url"  required="" name="blogaddress" placeholder="博客地址">
                        </div>
                        <div class="ui left labeled input m-margin-top">
                            <label class="ui teal basic label">图片地址</label>
                            <input type="url"  required="" name="pictureaddress" placeholder="图片地址">
                        </div>
                    </div>

                    <div class="ui error message"></div>
                    <div class="ui mini negative message">提示：不能添加重复的友链注。添加成功后，经管理员审核通过，即可在该页面查看新添加的博客友链</div>
                    <div class="ui right aligned container">
                        <button class="ui teal submit button">提交</button>
                    </div>

                </form>
            </div>
        </div>
        <!--添加友链结束-->

        <!--置顶开始-->
        <div id="toolbar" class="m-padded-tb-large m-fixed m-right-bottom">
            <a href="#" class="ui icon button"><i class="chevron up icon"></i> </a>
        </div>
        <!--置顶结束-->

    <!--友链页结束-->

@endsection

@section('js')
    <script  type="text/javascript">
        var waypoint = new Waypoint({
            element: document.getElementById('waypoint'),
            handler: function(direction) {
                if (direction == 'down') {
                    $('#toolbar').show(100);
                    $('#nav').hide(100);
                } else {
                    $('#toolbar').hide(500);
                    $('#nav').show(500);
                }
                console.log('Scrolled to waypoint!  ' + direction);
            }
        })


    </script>

    <script src="{{asset('js/toastr.min.js')}}"></script> {{-- 弹窗提示框样式--}}
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
        //自定义错误提示
        @if(session('msg'))
        toastr.success("{{ session('msg') }}");
        @endif
        @if(session('err'))
        toastr.error("{{ session('err') }}");
        @endif
        //验证器错误提示
        @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
        toastr.error("{{ $error }}");
        @endforeach
        @endif
    </script>

@endsection