@extends('layouts.home')

@section('title', '资源库')

@section('keywords', '资源库')

@section('description', '资源库')

@section('content')
    <!--资源页开始-->

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


        <!--中间内容开始-->
        <div id="waypoint" class="m-margin- animated fadeIn">
            <div class="ui m-opacity container">

                <div class="ui segment m-opacity" >
                    <div class="ui container" align="center">
                        @foreach($resource_stock_top as $v)
                        <div class="ui labeled button m-margin-tb-tiny" >
                            <a href="#{{ $v->resource_id }}" class="ui basic teal button"> {{ $v->name }}</a>
                            <div class="ui basic teal left pointing label">{{ $v->resource_stock_num }}</div>
                        </div>
                        @endforeach


                        <a onclick="addResource()" class="ui red basic button m-margin-tb-tiny">添加资源</a>

                    </div>
                </div>



                <!--资源区域-->
                <div class="box-shadow-max">
                    <div class="ui top attached teal m-opacity segment box-shadow-max">
                        <div class="ui m-padded-tb-large">
                            <div class="ui stackable m-opacity grid">

                                    @foreach($resource_stock_top as $s)
                                        <h2 id="{{ $s->resource_id }}" style="margin: 0 auto" class="ui header m-margin-top">
                                            <i class="camera icon"></i>
                                            <div class="content">
                                                {{ $s->name }}
                                            </div>
                                        </h2>
                                    <div class="ui stackable four cards m-margin-top grid" style="width: 6000px" >
                                       @foreach($resource_stock_all as $k=>$v)
                                           @if( $s->resource_id==$v['pid'] )
                                            <a target="_blank" href="http://lcoc.top/bizhi/" class="orange card ">
                                                <div class="content" >
                                                    <img class="left circular floated mini ui image" src="{{ $v['cover'] }}" style="width: 45px;height: 45px;">
                                                    <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">{{ $v['name'] }}</div>
                                                    <div class="meta" style="">{{ $v['type'] }}</div>
                                                    <div class="description">{{ $v['description'] }}</div>
                                                </div>
                                            </a>
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--中间内容结束-->

        <!--弹框内容开始-->
        <div class="ui modal" _msthidden="6">
            <form action="{{ url('addResource') }}" method="post" class="ui segment form">
                {{ csrf_field() }}
                <div class="two fields">
                    <div class="field">
                        <label>资源名称</label>
                        <input name="resourceName" type="text" placeholder="资源名称（如：B站）">
                    </div>
                    <div class="field">
                        <label>资源地址</label>
                        <input name="resourceAddress" type="text" placeholder="资源地址（如：https://www.bilibili.com/）">
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label>一级分类</label>
                        <div class="ui fluid selection dropdown">
                            <input type="hidden" name="firstType">
                            <i class="dropdown icon"></i>
                            <div class="default text">一级分类（如：学习资源）</div>
                            <div class="menu">
                                @foreach($resource_stock_top as $i)
                                    <div class="item" data-value="{{ $i->resource_id }}">{{ $i->name }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label>资源类型</label>
                        <input name="secondType" type="text" placeholder="资源类型（如：视频类）">
                    </div>

                </div>
                <div class="field">
                    <input  style="margin:0px 0px 15px 0px;" name="description" type="text" placeholder="资源简介（如：众所周知，B站是一个学习网站）">
                </div>
{{--                      <div class="ui aligned container" align="center">--}}
{{--                           <button class="ui teal submit button">提交</button>--}}
{{--                     </div>--}}


                <div class="actions" _msthidden="2" align="center">
                    <div class="ui black deny button" _msthash="3553550" _msttexthash="44876" _msthidden="1">
                        取消
                    </div>
                    <button style="width:70px" class="ui positive submit icon button" _msthidden="1">
                        提交
                    </button>
                </div>

                <div style="text-align: center;margin-top: 10px;color: red">注：添加成功后，经管理员审核通过，即可在该页面查看添加的资源（目前只收集页面所显示的七大类资源）</div>
                <div class="ui error mini message grid"></div>
            </form>
        </div>
        <!--弹框内容结束-->

        <!--+置顶开始-->
        <div id="toolbar" class="m-padded-tb-large m-fixed m-right-bottom">
            <a href="#" class="ui icon button"><i class="chevron up icon"></i> </a>
        </div>
        <!--置顶结束-->

    <!--资源页结束-->

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
        function addResource() {
            $(".ui.modal")
                .modal({ //各种回调方法
                    onShow: function () {
                        console.log("正在显示");
                    },
                    onVisible: function () {
                        console.log("完全显示");
                    },
                    onHide: function () {
                        console.log("开始隐藏");
                    },
                    onHidden: function () {
                        console.log("完全隐藏");
                    },
                    onApprove:function () { //单击确认按钮
                        console.log("确认");
                        // window.location.href=url;

                    },
                    onDeny:function () {  //单击取消按钮
                        console.log("拒绝")
                    }
                })
                .modal("show");

             // return false;

        }

        $('.ui.dropdown').dropdown({
            on : 'hover'
        });

        // resourceName  resourceAddress  firstType  secondType
        // 非空校验
        $('.ui.form').form({
            fields : {
                title : {
                    identifier: 'resourceName',
                    rules: [{
                        type : 'empty',
                        prompt: '提示：请输入资源名称'
                    }]
                },
                content : {
                    identifier: 'resourceAddress',
                    rules: [{
                        type:'url',
                        prompt: '提示：请输入资源地址或者请输入正确格式的资源地址'
                    }]
                },
                typeId : {
                    identifier: 'firstType',
                    rules: [{
                        type : 'empty',
                        prompt: '提示：请输入一级分类'
                    }]
                },
                firstPicture : {
                    identifier: 'secondType',
                    rules: [{
                        type : 'empty',
                        prompt: '提示：请输入资源类型'
                    }]
                },
                description : {
                    identifier: 'description',
                    rules: [{
                        type : 'empty',
                        prompt: '提示：请输入资源简介'
                    }]
                },
            }
        });
        //消息提示关闭初始化
        $('.message .close')
            .on('click', function () {
                $(this)
                    .closest('.message')
                    .transition('fade');
            });
    </script>



@endsection