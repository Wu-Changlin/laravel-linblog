@extends('layout.home')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '博客,个人博客,博客模板,个人博客模板,技术博客,博客系统,laravel博客,php博客')

@section('description', '霖的php博客,个人技术博客,开源一些thinkphp,laravel相关的博客系统项目,写一些技术文章.')



@section('content')
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
@endsection

