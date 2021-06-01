@extends('layouts.home')

@section('title', '最适合入门的Laravel初级教程(十)集合Collections - 白俊遥博客,技术博客,个人博客模板,php博客系统,设计模式')

@section('keywords', 'laravel,collect,collection,集合')

@section('description', '我们从数据库查出来了数据；但是我们发现它并不是我们以为的数组形式；这就要讲讲 collection 对象了；laravel 中 collection 是比数组更高等公民般的存在；我们可以像对待数组一样的来操作 collection；而且它还能以链式操作的方式便捷易读的处理数据；所有文字都苍白；所有语言都无力；咱直接举几筐栗子更直观的来讲解；我们定义一个数组；...')


<!-- 左侧文章开始 -->
@section('content')
<div class="col-xs-12 col-md-12 col-lg-8">

    <div class="row b-article">
        <h1 class="col-xs-12 col-md-12 col-lg-12 b-title">最适合入门的Laravel初级教程(十)集合Collections</h1>
        <div class="col-xs-12 col-md-12 col-lg-12">
            <ul class="row b-metadata">
                <li class="col-xs-5 col-md-2 col-lg-3"><i class="fa fa-user"></i> 白俊遥</li>
                <li class="col-xs-7 col-md-3 col-lg-3"><i class="fa fa-calendar"></i> 2018-02-04 16:13:21</li>
                <li class="col-xs-5 col-md-2 col-lg-2"><i class="fa fa-list-alt"></i> <a href="https://baijunyao.com/category/27">PHP</a>
                <li class="col-xs-7 col-md-5 col-lg-4 "><i class="fa fa-tags"></i>
                    <a class="b-tag-name" href="https://baijunyao.com/tag/42">Laravel</a>
                </li>
            </ul>
        </div>
        <div class="col-xs-12 col-md-12 col-lg-12 b-content-word">
            <div class="js-content"><p>我们从数据库查出来了数据；<br>但是我们发现它并不是我们以为的数组形式；<br><img src="https://baijunyao.com/uploads/article/20180205/5a7731072b108.jpg" alt="" title=""><br>这就要讲讲 collection 对象了；<br>laravel 中 collection 是比数组更高等公民般的存在；<br>我们可以像对待数组一样的来操作 collection；<br>而且它还能以链式操作的方式便捷易读的处理数据；<br>所有文字都苍白；所有语言都无力；<br>咱直接举几筐栗子更直观的来讲解；</p><p>我们定义一个数组；</p><pre><code class="lang-php">        $array = [
            '', '帅', '白', 0, '俊', false, '遥', null, '博', '客'
        ];</code></pre><p>把上面这个数组变成 cllection 很简单；<br>直接调用 <code>collect</code> 函数即可；</p><pre><code class="lang-php">        $collect = collect($array);</code></pre><p>然后我们就能像数组一样取值循环了；</p><pre><code class="lang-php">        dump($collect[0]);
        foreach ($collect as $K =&gt; $v) {
            dump($v);
        }</code></pre><p>但如果仅仅是这就不值得追捧了；<br>下面才是见证奇迹的时候；<br>我有这么一系列操作；<br>把 <code>$array</code> 中的帅字去掉；<br>接着过滤掉其中为假的值；<br>最后用 <code>-</code> 连接起来拼成 '白俊遥博客';<br>我们先用数组函数来实现；</p><pre><code class="lang-php">        // unset() 删除 '帅' 字
        // array_filter() 过滤为假的值
        // implode() 用 - 连接
        unset($array[1]);
        dump(implode('-', array_filter($array)));</code></pre><p>我们再用 collect 再实现一遍；</p><pre><code class="lang-php">        // forget() 删除 '帅字'
        // filter() 过滤为假的值
        // implode() 用 - 连接
        dump($collect-&gt;forget(1)-&gt;filter()-&gt;implode('-'));</code></pre><p>两种方式打印出来的结果是一样的；<br><img src="https://baijunyao.com/uploads/article/20180205/5a7731128781b.jpg" alt="" title=""><br>如果操作再复杂点；<br>都用函数一层一层的的套的话；<br>想想都让人崩溃；<br>还是链式操作即直观又美观；<br>有木有再次开始感受到 laravel 的优雅了；<br>这只是拿出了 3 个方法示例；<br>collection 其实有一大堆的功能可以供我们使用；<br><img src="https://baijunyao.com//uploads/article/20180205/5a77311da5c99.jpg" alt="" title=""><br>完整的文档链接在这里；<br>童鞋们可以挨个自行体验了；<br><a href="https://d.laravel-china.org/docs/5.5/collections#method-reverse">Laravel 的集合 Collection</a><br>由于从数据库取出的数据本身就是一个 collection ;<br>所以可以直接使用这些方法；</p><pre><code class="lang-php">DB::table('articles')-&gt;where('id', '&gt;', 1)-&gt;get()-&gt;pluck('title')-&gt;implode('-');</code></pre><p>我当年刚学 laravel 的时候还是习惯数组；<br>所以每次都用 <code>-&gt;toArray()</code> 把 collection 转成数组了；<br>甚至都在改造框架以达到从数据库取出来直接是数组的数据类型；<br>直到后来我慢慢了理解 collection 的强大；<br>才深深的明白了我的愚蠢；<br>所以我特意把 collection 拎出来写一篇文章；<br>希望能引导童鞋们正确并善于使用集合；</p></div>
            <p class="b-h-20"></p>
            <p class="b-copyright">
                本文为白俊遥原创文章,转载无需和我联系,但请注明来自<a href="http://baijunyao.com">白俊遥博客</a>https://baijunyao.com 欢迎捐赠赞赏加入组织<a href="https://baijunyao.com/article/124">创建QQ群及捐赠渠道</a>
            </p>
            <div class="b-share-plugin">
                <div id="b-share-js"></div>
            </div>
            <ul class="b-prev-next">
                <li class="b-prev">
                    上一篇：
                    <a href="https://baijunyao.com/article/140">最适合入门的Laravel初级教程(九)数据库查询Query Builder</a>

                </li>
                <li class="b-next">
                    下一篇：
                    <a href="https://baijunyao.com/article/142">最适合入门的Laravel初级教程(十一)模型Eloquent ORM</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- 引入通用评论开始 -->
    <script>
        var userEmail='';
        tuzkiNumber=1;
    </script>
    <div class="row b-like">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <ul class="row">
                <div class="col-xs-2 col-md-1 col-lg-1 b-thumbs-up">
                    <i class="fa fa-thumbs-up b-liked  hidden " data-article-id="141"></i>
                    <i class="fa fa-thumbs-o-up " data-article-id="141"></i>
                </div>
                <ul class="col-xs-10 col-md-11 col-lg-11 js-like-box">
                </ul>
            </ul>
        </div>
    </div>
<!--    <div class="row b-comment">-->
<!--        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 b-comment-box">-->
<!--            <img class="b-head-img" src="https://baijunyao.com/images/home/default_head_img.gif" alt="白俊遥博客" title="白俊遥博客">-->
<!--            <div class="b-box-textarea">-->
<!--                <div class="b-box-content js-hint" >请先登录后发表评论</div>-->
<!--                <ul class="b-emote-submit">-->
<!--                    <li class="b-emote">-->
<!--                        <i class="fa fa-smile-o js-get-tuzki"></i>-->
<!--                        <input class="form-control b-email" type="text" name="email" placeholder="接收回复的邮箱" value="">-->
<!--                        <div class="b-tuzki">-->
<!---->
<!--                        </div>-->
<!--                    </li>-->
<!--                    <li class="b-submit-button">-->
<!--                        <input class="js-comment-btn" type="button" value="提 交" article_id="141" parent_id="0" depth="0">-->
<!--                    </li>-->
<!--                    <li class="b-clear-float"></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <div class="b-clear-float"></div>-->
<!--        </div>-->
<!--        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 b-comment-title">-->
<!--            <ul class="row">-->
<!--                <li class="col-xs-6 col-sm-6 col-md-6 col-lg-6">latest comments</li>-->
<!--                <li class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">总共<span>34</span>条评论</li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 b-user-comment">-->
<!---->
<!--            <div id="comment-4245" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/3435.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">随心。 <i class="fa fa-qq"></i></span>：大佬，如果是做微信小程序之类的，就不能在视图中设置{{csrf_field()}}这个来防止外站提交了，这个时候该怎么做呢<img src="https://baijunyao.com/statics/emote/tuzki/10.gif" title="瞌睡" alt="白俊遥博客">-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2019-02-20 09:58:19-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="4245"-->
<!--                           username="随心。"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div id="comment-4314" class="row b-user b-depth-padding-1 ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/49.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">建奇A <i class="fa fa-qq"></i></span>：小程序属于api类操作，用户信息提交的时候要带上uid和token等加密参数 来验证用户是否合法用户，验证参数可以放到body体也可以放到header头-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2019-03-30 11:03:35-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id="4245"-->
<!--                           comment_id="4314"-->
<!--                           username="建奇A"-->
<!--                           depth="1"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-4012" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2622.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">天青色等烟雨 <i class="fa fa-qq"></i></span>：很棒的文章！支持！-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-10-05 14:18:02-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="4012"-->
<!--                           username="天青色等烟雨"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3830" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2946.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">花舞千魂殇 <i class="fa fa-weibo"></i></span>：我也是 一看到集合就想转为数组 ， 但是经过阿婆主介绍 发现这个集合真的很潮啊-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-08-01 01:23:16-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3830"-->
<!--                           username="花舞千魂殇"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3324" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2500.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">老铁 echo(&quot;&quot;); <i class="fa fa-qq"></i></span>：666啊-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-03-04 01:53:00-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3324"-->
<!--                           username="老铁 echo(&quot;&quot;);"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3323" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2498.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">心雨 <i class="fa fa-qq"></i></span>：4bcb76924cfd670d92010a19f6af5a4d感谢分享分-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-03-03 09:44:18-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3323"-->
<!--                           username="心雨"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3322" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2498.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">心雨 <i class="fa fa-qq"></i></span>：6f92c250d196793b6475f0d3f2dd3cc2感谢分享-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-03-03 09:43:09-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3322"-->
<!--                           username="心雨"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3321" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2151.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">二十三岁的九局下半丶 <i class="fa fa-weibo"></i></span>：元宵节快乐！！！-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-03-02 07:49:59-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3321"-->
<!--                           username="二十三岁的九局下半丶"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div id="comment-3330" class="row b-user b-depth-padding-1 ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/1.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                    <img class="b-crown" src="https://baijunyao.com/images/home/crown.png" alt="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">云淡风晴 <i class="fa fa-qq"></i></span>：同乐；哈哈；-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-03-04 14:29:48-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id="3321"-->
<!--                           comment_id="3330"-->
<!--                           username="云淡风晴"-->
<!--                           depth="1"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3320" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2493.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">mrhopelee <i class="fa fa-github"></i></span>：从一看到十,很棒的入门文章,感谢~-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-03-02 07:37:58-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3320"-->
<!--                           username="mrhopelee"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div id="comment-3926" class="row b-user b-depth-padding-1 ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/912.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">=͟͟͞͞若=͟͟͞͞水 <i class="fa fa-qq"></i></span>：+1-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-08-24 03:54:05-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id="3320"-->
<!--                           comment_id="3926"-->
<!--                           username="=͟͟͞͞若=͟͟͞͞水"-->
<!--                           depth="1"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3319" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2495.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">cantinzing <i class="fa fa-github"></i></span>：坐等更新-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-03-02 02:40:19-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3319"-->
<!--                           username="cantinzing"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div id="comment-3331" class="row b-user b-depth-padding-1 ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/1.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                    <img class="b-crown" src="https://baijunyao.com/images/home/crown.png" alt="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">云淡风晴 <i class="fa fa-qq"></i></span>：不用等了；更新完了；-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-03-04 14:30:02-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id="3319"-->
<!--                           comment_id="3331"-->
<!--                           username="云淡风晴"-->
<!--                           depth="1"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3316" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2490.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">yymmhh <i class="fa fa-github"></i></span>：<img src="https://baijunyao.com/statics/emote/tuzki/31.gif" title="扔桌子" alt="白俊遥博客">laravel中的集合功能强大的一笔-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-28 11:52:36-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3316"-->
<!--                           username="yymmhh"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3312" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2039.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">加藤非 <i class="fa fa-qq"></i></span>：非常谢谢大佬分享-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-27 13:46:15-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3312"-->
<!--                           username="加藤非"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3309" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2472.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">徐逸以轩  <i class="fa fa-qq"></i></span>：感谢分享-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-25 13:28:19-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3309"-->
<!--                           username="徐逸以轩 "-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3308" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2479.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">国飞Zhang。 <i class="fa fa-qq"></i></span>：b645c683ae94c55de46d50bde1477ae3   出现这个代码怎么回事-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-24 08:42:01-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3308"-->
<!--                           username="国飞Zhang。"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3304" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2474.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">青衫拂袖 <i class="fa fa-qq"></i></span>：<img src="https://baijunyao.com/statics/emote/tuzki/39.gif" title="在笼子里" alt="白俊遥博客">-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-23 14:40:54-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3304"-->
<!--                           username="青衫拂袖"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div id="comment-3313" class="row b-user b-depth-padding-1 ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2039.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">加藤非 <i class="fa fa-qq"></i></span>：哈哈哈-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-27 13:50:22-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id="3304"-->
<!--                           comment_id="3313"-->
<!--                           username="加藤非"-->
<!--                           depth="1"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3298" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2456.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">等待 <i class="fa fa-qq"></i></span>：哈哈哈-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-12 16:23:28-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3298"-->
<!--                           username="等待"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3290" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2449.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">为人生而奋斗！ <i class="fa fa-qq"></i></span>：不错啊-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-09 14:32:16-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3290"-->
<!--                           username="为人生而奋斗！"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3289" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2448.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">flyingdreams1111 <i class="fa fa-github"></i></span>：博主,后续还会有嘛?前头的已学完-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-09 12:35:08-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3289"-->
<!--                           username="flyingdreams1111"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div id="comment-3332" class="row b-user b-depth-padding-1 ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/1.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                    <img class="b-crown" src="https://baijunyao.com/images/home/crown.png" alt="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">云淡风晴 <i class="fa fa-qq"></i></span>：更新完了；-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-03-04 14:30:24-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id="3289"-->
<!--                           comment_id="3332"-->
<!--                           username="云淡风晴"-->
<!--                           depth="1"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3272" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2440.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">Jerry <i class="fa fa-qq"></i></span>：<img src="https://baijunyao.com/statics/emote/tuzki/2.gif" title="Love" alt="白俊遥博客">-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-08 07:16:35-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3272"-->
<!--                           username="Jerry"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3268" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/470.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">快乐远〖航〗 <i class="fa fa-qq"></i></span>：相当透彻-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-06 12:13:35-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3268"-->
<!--                           username="快乐远〖航〗"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3267" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2428.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">J <i class="fa fa-qq"></i></span>：<img src="https://baijunyao.com/statics/emote/tuzki/2.gif" title="Love" alt="白俊遥博客">-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-06 09:38:31-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3267"-->
<!--                           username="J"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div id="comment-3273" class="row b-user b-depth-padding-1 ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2410.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">uw <i class="fa fa-qq"></i></span>：<img src="https://baijunyao.com/statics/emote/tuzki/6.gif" title="顶" alt="白俊遥博客">-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-08 07:58:31-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id="3267"-->
<!--                           comment_id="3273"-->
<!--                           username="uw"-->
<!--                           depth="1"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div id="comment-3280" class="row b-user b-depth-padding-1 ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2447.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">你 <i class="fa fa-qq"></i></span>：想看一下你这边的回复是无限级的吗？-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-09 10:53:40-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id="3267"-->
<!--                           comment_id="3280"-->
<!--                           username="你"-->
<!--                           depth="1"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div id="comment-3305" class="row b-user b-depth-padding-1 ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2477.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">i++ <i class="fa fa-qq"></i></span>：是的吧-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-24 06:31:32-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id="3267"-->
<!--                           comment_id="3305"-->
<!--                           username="i++"-->
<!--                           depth="1"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3263" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/12.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">null <i class="fa fa-qq"></i></span>：<img src="https://baijunyao.com/statics/emote/tuzki/2.gif" title="Love" alt="白俊遥博客"> 腻害-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-05 09:52:15-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3263"-->
<!--                           username="null"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3262" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2423.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">微链源码网 <i class="fa fa-weibo"></i></span>：5G云网络-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-05 07:52:25-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3262"-->
<!--                           username="微链源码网"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3261" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/1274.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">nothing. <i class="fa fa-qq"></i></span>：厉害-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-05 04:03:29-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3261"-->
<!--                           username="nothing."-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                    <div class="b-border"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="comment-3259" class="row b-user b-depth-padding-0  b-parent ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2422.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">木-微博 <i class="fa fa-weibo"></i></span>：<img src="https://baijunyao.com/statics/emote/tuzki/2.gif" title="Love" alt="白俊遥博客">-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-02-04 17:29:46-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id=""-->
<!--                           comment_id="3259"-->
<!--                           username="木-微博"-->
<!--                           depth="0"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div id="comment-3411" class="row b-user b-depth-padding-1 ">-->
<!--                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">-->
<!--                    <img class="b-user-pic bjy-lazyload" src="https://baijunyao.com/images/default/avatar.jpg" data-src="https://baijunyao.com/uploads/avatar/2572.jpg" alt="白俊遥博客" title="白俊遥博客">-->
<!--                </div>-->
<!--                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">-->
<!--                    <p class="b-content">-->
<!--                        <span class="b-user-name">火你大哥 <i class="fa fa-qq"></i></span>：<img src="https://baijunyao.com/statics/emote/tuzki/2.gif" title="Love" alt="白俊遥博客">看看-->
<!--                    </p>-->
<!--                    <p class="b-date">-->
<!--                        2018-03-21 12:59:46-->
<!--                        <a class="js-reply"-->
<!--                           href="javascript:;"-->
<!--                           article_id="141"-->
<!--                           parent_id="3259"-->
<!--                           comment_id="3411"-->
<!--                           username="火你大哥"-->
<!--                           depth="1"-->
<!--                        >回复</a>-->
<!--                    </p>-->
<!--                    <div class="b-clear-float"></div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </div>-->
    <!-- 引入通用评论结束 -->
</div>
<!-- 左侧文章结束 -->
@endsection

@section('js')

<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?c3338ec467285d953aba86d9bd01cd93";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

<script src="{{asset('statics/layer-2.4/layer.js')}}"></script>
@endsection