@extends('layouts.home')

@section('title', $head['title'])

@section('keywords', $head['keywords'])

@section('description',  $head['description'])

@section('css')
    <link rel="stylesheet" href="{{asset('home/css/typo.css')}}" th:href="@{/home/css/typo.css}">
    <link rel="stylesheet" href="{{asset('home/css/animate.css')}}" th:href="@{/home/css/animate.css}">
    <link rel="stylesheet" href="{{asset('home/static/prism/prism.css')}}" th:href="@{/home/static/prism/prism.css}">
    <link rel="stylesheet" href="{{asset('home/static/tocbot/tocbot.css')}}" th:href="@{/home/static/tocbot/tocbot.css}">
    <link rel="stylesheet" href="{{asset('home/static/timeline/timeline.css')}}" th:href="@{/home/static/timeline/timeline.css}">
@endsection


@section('content')
    <!--文章页开始-->

        <!--顶部图片开始-->
        <div  class="m-bg-type_outer" style="width: 100%;height: 50%">
            <img src="{{ asset('home/images/bg.jpg') }}" alt="" class="ui m-bg image" style="width: 100%;height: 100%">
            <div class="m-bg-class_cover">
                <div class="ui container" style="position: relative ;bottom: -540px;">
                    <h2 class="m-font-size-title-large" align="center">{{ $article->title}}</h2>
                    <div class="ui container" align="center">
                        <div class="ui horizontal link list" align="center">
                            <div class="item">
                                <div class="ui orange basic label" style="font-size: 7px">原创</div>
                            </div>
                            <div class="item">
                                <i class="user outline outline icon m-font-size-text-mini"></i>
                                <a href="#" style="color: #ffffff;font-size: 15px">{{ $article->author}}</a>
                            </div>
                            <div class="item">
                                <i class="calendar icon m-font-size-text-mini"></i>
                                <span class="m-font-size-text-mini">{{ $article->created_at}}</span>
                            </div>
                            <div class="item">
                                <i class="clone icon m-font-size-text-mini"></i>
                                <a href="{{ url('showTag',[$category_id,$tag_id]) }}" target="_blank" style="color: #ffffff;font-size: 16px">{{ $article->tags_name}}</a>
                            </div>
                            <div class="item">
                                <i class="eye icon m-font-size-text-mini"></i> <span class="m-font-size-text-mini">{{ $article->visits}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--顶部图片结束-->

        <!--文章内容开始-->
        <div id="waypoint" class="m-margin- animated fadeIn">
            <div class="ui container m-opacity box-shadow-max">
                <!--内容-->
                <div class="ui attached padded segment">


                    <!--中间主要内容部分-->
                    <div id="content" class="typo  typo-selection js-toc-content m-padded-lr-responsive m-padded-tb-large">
                       
                        {!! $article->html !!}
                    </div>
                    <div class="ui horizontal divider">end</div>

                </div>
                <div id="goto" class="ui attached positive message">
                    <!--博客信息-->
                    <div class="ui middle aligned ">
                        <div class="nine wide column">
                            <ui class="list">
                                <li>作者：<span>{{ $article->author}}</span><a href="#" target="_blank">（联系作者）</a></li>
                                <li>发表时间：<span>{{ $article->created_at}}</span></li>
                                <li>版权声明：自由转载-非商用-非衍生-保持署名（创意共享3.0许可证）</li>
                                <li>转载声明：如果是转载栈主转载的文章，请附上原文链接</li>
                            </ui>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--文章内容结束-->

        <!--目录+置顶开始-->
        <div id="toolbar" class="m-padded m-fixed m-right-bottom" style="display: none">
            <div class="ui vertical icon buttons ">
                <button type="button" class="ui toc teal button" >目录</button>
                <div id="toTop-button" class="ui icon button" ><i class="chevron up icon"></i></div>
            </div>
        </div>
        <!--目录弹出开始-->
        <div class="ui toc-container flowing popup transition hidden" style="width: 250px!important;">
            <ol class="js-toc">

            </ol>
        </div>
        <!--目录弹出结束-->
        <!--目录+置顶结束-->

    <!--文章页结束-->

@endsection

@section('js')
    <script src="{{ asset('home/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('home/static/tocbot/tocbot.min.js') }}"></script>
    <script src="{{ asset('home/static/prism/prism.js') }}"></script>
    <script  type="text/javascript">

        tocbot.init({
            // Where to render the table of contents.
            tocSelector: '.js-toc',
            // Where to grab the headings to build the table of contents.
            contentSelector: '.js-toc-content',
            // Which headings to grab inside of the contentSelector element.
            headingSelector: 'h1, h2, h3',
        });

        $('.toc.button').popup({
            popup : $('.toc-container.popup'),
            on : 'click',
            position: 'left center'
        });

        $('#toTop-button').click(function () {
            $(window).scrollTo(0,500);
        });



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



@endsection