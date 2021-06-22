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
                        <div class="ui labeled button m-margin-tb-tiny" >
                            <a href="#studyresource" class="ui basic teal button">学习资源</a>
                            <div class="ui basic teal left pointing label">45</div>
                        </div>
                        <div class="ui labeled button m-margin-tb-tiny">
                            <a href="#pictureresource" class="ui basic teal button">图片资源</a>
                            <div class="ui basic teal left pointing label">11</div>
                        </div>
                        <div class="ui labeled button m-margin-tb-tiny">
                            <a href="#officeresource" class="ui basic teal button">办公资源</a>
                            <div class="ui basic teal left pointing label">26</div>
                        </div>
                        <div class="ui labeled button m-margin-tb-tiny">
                            <a href="#recreationresource" class="ui basic teal button">娱乐资源</a>
                            <div class="ui basic teal left pointing label">31</div>
                        </div>
                        <div class="ui labeled button m-margin-tb-tiny">
                            <a href="#designresource" class="ui basic teal button">设计资源</a>
                            <div class="ui basic teal left pointing label">28</div>
                        </div>
                        <div class="ui labeled button m-margin-tb-tiny">
                            <a href="#searchresource" class="ui basic teal button">搜索资源</a>
                            <div class="ui basic teal left pointing label">14</div>
                        </div>
                        <div class="ui labeled button m-margin-tb-tiny">
                            <a href="#toolresource" class="ui basic teal button">工具资源</a>
                            <div class="ui basic teal left pointing label">48</div>
                        </div>

                        <a onclick="addResource()" class="ui red basic button m-margin-tb-tiny">添加资源</a>

                    </div>
                </div>



                <!--资源区域-->
                <div class="box-shadow-max">
                    <div class="ui top attached teal m-opacity segment box-shadow-max">
                        <div class="ui m-padded-tb-large">
                            <div class="ui stackable m-opacity grid">

                                <h2 id="studyresource" style="margin: 0 auto" class="ui header">
                                    <i class="book icon"></i>
                                    <div class="content">
                                        <span>学习资源</span>
                                    </div>
                                </h2>

                                <div class="ui stackable four cards m-margin-top grid" style="width: 6000px" >
                                    <a href="https://www.bilibili.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214160701358.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">B站</div>
                                            <div class="meta" style="">视屏类</div>
                                            <div class="description">众所周知，B站是一个学习网站</div>
                                        </div>
                                    </a><a href="https://www.imooc.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214160721192.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">慕课网</div>
                                            <div class="meta" style="">视屏类</div>
                                            <div class="description">互联网IT技能免费学习网站</div>
                                        </div>
                                    </a><a href="https://www.xuetangx.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214160744900.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">学堂在线</div>
                                            <div class="meta" style="">视屏类</div>
                                            <div class="description">中文大规模开发在线课程</div>
                                        </div>
                                    </a><a href="http://www.dxzy163.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214160820923.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">大学资源网</div>
                                            <div class="meta" style="">视屏类</div>
                                            <div class="description">考研、外语、电脑等课程视频</div>
                                        </div>
                                    </a><a href="https://www.mooc.cn/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214161128810.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">MOOC中国</div>
                                            <div class="meta" style="">视屏类</div>
                                            <div class="description">致力于分享最好的慕课</div>
                                        </div>
                                    </a><a href="https://www.jikexueyuan.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214161148780.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">极客学院</div>
                                            <div class="meta" style="">视屏类</div>
                                            <div class="description">国内领先的IT在线咨询及教育平台</div>
                                        </div>
                                    </a><a href="https://open.163.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214161215628.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">网易公开课</div>
                                            <div class="meta" style="">视屏类</div>
                                            <div class="description">一个公开的免费课程平台</div>
                                        </div>
                                    </a><a href="https://www.yxgapp.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214161315931.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">译学馆</div>
                                            <div class="meta" style="">视屏类</div>
                                            <div class="description">一个专注于译制知识视频的平台</div>
                                        </div>
                                    </a><a href="https://www.doyoudo.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214161355991.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">doyoudo</div>
                                            <div class="meta" style="">视屏类</div>
                                            <div class="description">设计领域在线学习平台</div>
                                        </div>
                                    </a><a href="https://www.51zxw.net/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214161440036.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">我要自学网</div>
                                            <div class="meta" style="">视屏类</div>
                                            <div class="description">提高全民的电脑水平</div>
                                        </div>
                                    </a><a href="https://www.ted.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/1607961043(1).jpg" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">TED</div>
                                            <div class="meta" style="">视屏类</div>
                                            <div class="description">最优质的演讲</div>
                                        </div>
                                    </a><a href="https://www.runoob.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214161505432.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">菜鸟教程</div>
                                            <div class="meta" style="">文章类</div>
                                            <div class="description">提供了基础编程技术教程</div>
                                        </div>
                                    </a><a href="https://www.yiibai.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214155702735.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">易百教程</div>
                                            <div class="meta" style="">文章类</div>
                                            <div class="description">IT技术入门学习实例教程网站</div>
                                        </div>
                                    </a><a href="http://www.manongjc.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214155610415.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">码农教程</div>
                                            <div class="meta" style="">文章类</div>
                                            <div class="description">IT免费学习平台</div>
                                        </div>
                                    </a><a href="https://www.twle.cn/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214155526681.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">简单教程</div>
                                            <div class="meta" style="">文章类</div>
                                            <div class="description">简洁明了的IT教程</div>
                                        </div>
                                    </a><a href="https://www.zhihu.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214155331548.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">知乎</div>
                                            <div class="meta" style="">文章类</div>
                                            <div class="description">国内最大的知识问答平台</div>
                                        </div>
                                    </a><a href="https://www.jianshu.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214155253763.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">简书</div>
                                            <div class="meta" style="">文章类</div>
                                            <div class="description">一个优质的创作社区</div>
                                        </div>
                                    </a><a href="https://www.csdn.net/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214155219293.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">CSDN</div>
                                            <div class="meta" style="">文章类</div>
                                            <div class="description">国内最大的IT技术交流平台</div>
                                        </div>
                                    </a><a href="https://juejin.cn/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214155132395.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">掘金</div>
                                            <div class="meta" style="">文章类</div>
                                            <div class="description">一个帮助开发者成长的社区</div>
                                        </div>
                                    </a><a href="https://www.cnblogs.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214155037052.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">博客园</div>
                                            <div class="meta" style="">文章类</div>
                                            <div class="description">简洁大气的阅读体验</div>
                                        </div>
                                    </a><a href="https://www.oschina.net/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214154909714.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">开源中国</div>
                                            <div class="meta" style="">文章类</div>
                                            <div class="description">国内最大的开源技术社区</div>
                                        </div>
                                    </a><a href="https://segmentfault.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214154823027.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">思否</div>
                                            <div class="meta" style="">文章类</div>
                                            <div class="description">交流和分享任何技术编程相关知识</div>
                                        </div>
                                    </a><a href="https://www.bookstack.cn/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214154747581.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">书栈网</div>
                                            <div class="meta" style="">书籍类</div>
                                            <div class="description">一个开源书籍和文档分享站点</div>
                                        </div>
                                    </a><a href="https://www.jiumodiary.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214154702245.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">鸠摩搜书</div>
                                            <div class="meta" style="">书籍类</div>
                                            <div class="description">文档书籍搜索引擎</div>
                                        </div>
                                    </a><a href="http://www.pdfbook.cn/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214154342600.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">云海电子图书馆</div>
                                            <div class="meta" style="">书籍类</div>
                                            <div class="description">各类书籍免费下载</div>
                                        </div>
                                    </a><a href="https://www.xz577.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214153632698.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">码农之家</div>
                                            <div class="meta" style="">书籍类</div>
                                            <div class="description">计算机电子书下载网站</div>
                                        </div>
                                    </a><a href="https://new.shuge.org/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214153557305.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">书格</div>
                                            <div class="meta" style="">书籍类</div>
                                            <div class="description">在线古籍图书</div>
                                        </div>
                                    </a><a href="https://www.shiyisoushu.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214153507534.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">时宜搜书</div>
                                            <div class="meta" style="">书籍类</div>
                                            <div class="description">专业电子书搜索引擎</div>
                                        </div>
                                    </a><a href="https://book.zhishikoo.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214153345514.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">知识库</div>
                                            <div class="meta" style="">书籍类</div>
                                            <div class="description">书籍、电子书分享的资源网站</div>
                                        </div>
                                    </a><a href="https://ebook2.lorefree.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214153303673.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">LoreFree</div>
                                            <div class="meta" style="">书籍类</div>
                                            <div class="description">各种格式电子书免费下载</div>
                                        </div>
                                    </a><a href="http://shuxiangjia.cn/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214153215116.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">书享家</div>
                                            <div class="meta" style="">书籍类</div>
                                            <div class="description">电子书下载导航</div>
                                        </div>
                                    </a><a href="https://ebook.chongbuluo.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214153059539.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">电子书搜索</div>
                                            <div class="meta" style="">书籍类</div>
                                            <div class="description">提供各种电子书搜索网站</div>
                                        </div>
                                    </a><a href="https://leetcode-cn.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214152947095.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">力扣</div>
                                            <div class="meta" style="">刷题类</div>
                                            <div class="description">海量技术面试资源、算法题</div>
                                        </div>
                                    </a><a href="https://www.nowcoder.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214152718579.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">牛客网</div>
                                            <div class="meta" style="">刷题类</div>
                                            <div class="description">笔面试、题库、课程、招聘内推</div>
                                        </div>
                                    </a><a href="https://www.lintcode.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214152554992.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">LintCode</div>
                                            <div class="meta" style="">刷题类</div>
                                            <div class="description">在线编程训练系统</div>
                                        </div>
                                    </a><a href="https://algorithm-visualizer.org/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214152506414.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">algorithm</div>
                                            <div class="meta" style="">刷题类</div>
                                            <div class="description">动态算法演示</div>
                                        </div>
                                    </a><a href="https://www.shiyanlou.com/" target="_blank" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214152422403.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">实验楼</div>
                                            <div class="meta" style="">其他</div>
                                            <div class="description">实训平台，提供编程环境</div>
                                        </div>
                                    </a>
                                </div>

                                <h2 id="pictureresource" style="margin: 0 auto" class="ui header m-margin-top">
                                    <i class="camera icon"></i>
                                    <div class="content">
                                        图片资源
                                    </div>
                                </h2>

                                <!--<div class="ui inverted divided stackable grid">-->
                                <div class="ui stackable four cards m-margin-top grid" style="width: 6000px" >
                                    <a target="_blank" href="http://lcoc.top/bizhi/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214152059669.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">电脑壁纸</div>
                                            <div class="meta" style="">图片类</div>
                                            <div class="description">高清电脑壁纸</div>
                                        </div>
                                    </a><a target="_blank" href="http://pic.netbian.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214151818037.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">彼岸图网</div>
                                            <div class="meta" style="">图片类</div>
                                            <div class="description">4K超清图片</div>
                                        </div>
                                    </a><a target="_blank" href="https://bz.zzzmh.cn/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214151745052.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">极简壁纸</div>
                                            <div class="meta" style="">图片类</div>
                                            <div class="description">海量电脑桌面4K超清壁纸</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.logosc.cn/so/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214151653173.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">搜图神器</div>
                                            <div class="meta" style="">图片类</div>
                                            <div class="description">免费版权图片一键搜索</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.pexels.com/zh-cn/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214150902163.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">Pexels</div>
                                            <div class="meta" style="">图片类</div>
                                            <div class="description">免费图片素材</div>
                                        </div>
                                    </a><a target="_blank" href="https://stocksnap.io/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214150800370.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">StockSnap</div>
                                            <div class="meta" style="">图片类</div>
                                            <div class="description">免费图片素材高清资源库</div>
                                        </div>
                                    </a><a target="_blank" href="https://unsplash.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214150600302.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">Unsplash</div>
                                            <div class="meta" style="">图片类</div>
                                            <div class="description">免费无版权高清图片</div>
                                        </div>
                                    </a><a target="_blank" href="https://pixabay.com/zh/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201215191445494.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">Pixabay</div>
                                            <div class="meta" style="">图片类</div>
                                            <div class="description">免费正版高清图片素材库</div>
                                        </div>
                                    </a><a target="_blank" href="https://visualhunt.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214144200466.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">visualhunt</div>
                                            <div class="meta" style="">图片类</div>
                                            <div class="description">可以通过颜色来查找图片</div>
                                        </div>
                                    </a>
                                </div>

                                <h2 id="officeresource" style="margin: 0 auto" class="ui header m-margin-top">
                                    <i class="laptop icon"></i>
                                    <div class="content">
                                        办公资源
                                    </div>
                                </h2>

                                <!--<div class="ui inverted divided stackable grid">-->
                                <div class="ui stackable four cards m-margin-top grid" style="width: 6000px" >
                                    <a target="_blank" href="https://convertio.co/zh/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214143834268.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">文件转换器</div>
                                            <div class="meta" style="">文件转换器</div>
                                            <div class="description">任意文件格式转换</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.alltoall.net/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214143748540.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">All To All</div>
                                            <div class="meta" style="">文件转换器</div>
                                            <div class="description">在线格式转换</div>
                                        </div>
                                    </a><a target="_blank" href="https://cn.office-converter.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214143600571.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">Office-Converter</div>
                                            <div class="meta" style="">文件转换器</div>
                                            <div class="description">在线文件转换器</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.onlinedoctranslator.com/zh-CN/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214134038067.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">DocTranslator</div>
                                            <div class="meta" style="">文件转换器</div>
                                            <div class="description">免费在线文件翻译器</div>
                                        </div>
                                    </a><a target="_blank" href="https://lightpdf.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214133158808.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">lightPDF</div>
                                            <div class="meta" style="">PDF编辑</div>
                                            <div class="description">在线PDF编辑和转换</div>
                                        </div>
                                    </a><a target="_blank" href="https://smallpdf.com/cn" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214133031770.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">Smallpdf</div>
                                            <div class="meta" style="">PDF编辑</div>
                                            <div class="description">简单好用的线上PDF工具</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.pdfpai.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214132938596.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">PDF派</div>
                                            <div class="meta" style="">PDF编辑</div>
                                            <div class="description">在线PDF免费工具</div>
                                        </div>
                                    </a><a target="_blank" href="https://app.xunjiepdf.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214132859707.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">迅捷PDF转换器</div>
                                            <div class="meta" style="">PDF编辑</div>
                                            <div class="description">PDF文件转换器</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.ilovepdf.com/zh-cn" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214132812862.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">ilovepdf</div>
                                            <div class="meta" style="">PDF编辑</div>
                                            <div class="description">丰富的PDF处理工具</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.hipdf.cn" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214132728567.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">hipdf</div>
                                            <div class="meta" style="">PDF编辑</div>
                                            <div class="description">一站式在线PDF解决方案</div>
                                        </div>
                                    </a><a target="_blank" href="https://tools.pdf24.org/zh/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214132634402.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">PDF24 Tools</div>
                                            <div class="meta" style="">PDF编辑</div>
                                            <div class="description">免费且易于使用的在线PDF工具</div>
                                        </div>
                                    </a><a target="_blank" href="http://www.ypppt.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214132527742.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">优品PPT</div>
                                            <div class="meta" style="">PPT模板</div>
                                            <div class="description">免费PPT模板下载</div>
                                        </div>
                                    </a><a target="_blank" href="http://ppt.sotary.com/web/wxapp/index.html" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214132346986.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">PPT超级市场</div>
                                            <div class="meta" style="">PPT模板</div>
                                            <div class="description">免费、优质、高效、安全PPT下载</div>
                                        </div>
                                    </a><a target="_blank" href="http://www.1ppt.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214132305062.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">第一PPT</div>
                                            <div class="meta" style="">PPT模板</div>
                                            <div class="description">PPT免费模板下载</div>
                                        </div>
                                    </a><a target="_blank" href="http://www.pptbz.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214132225542.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">PPT宝藏</div>
                                            <div class="meta" style="">PPT模板</div>
                                            <div class="description">高质量的PPT模板下载</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.processon.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214132143784.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">Processon</div>
                                            <div class="meta" style="">在线作图</div>
                                            <div class="description">免费在线作图，实时协作</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.liuchengtu.com/lct/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214132106075.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">流程图</div>
                                            <div class="meta" style="">在线作图</div>
                                            <div class="description">免费在线创建流程图</div>
                                        </div>
                                    </a><a target="_blank" href="https://app.diagrams.net/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214131933284.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">Untitled Diagram</div>
                                            <div class="meta" style="">在线作图</div>
                                            <div class="description">在线制作流程图</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.wenshushu.cn/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214131822963.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">文叔叔传文件</div>
                                            <div class="meta" style="">文件传输</div>
                                            <div class="description">大文件传输，不限速</div>
                                        </div>
                                    </a><a target="_blank" href="https://cp.anyknew.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214131515776.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">拷贝兔</div>
                                            <div class="meta" style="">文件传输</div>
                                            <div class="description">快速分享的实用工具</div>
                                        </div>
                                    </a><a target="_blank" href="https://airportal.cn/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214131420640.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">AirPortal</div>
                                            <div class="meta" style="">文件传输</div>
                                            <div class="description">文件在线接收</div>
                                        </div>
                                    </a><a target="_blank" href="https://edit.foxitcloud.cn/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214131347480.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">福昕在线编辑器</div>
                                            <div class="meta" style="">其他</div>
                                            <div class="description">PDF在线编辑</div>
                                        </div>
                                    </a><a target="_blank" href="https://jianwai.youdao.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214131014043.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">网易见外工作台</div>
                                            <div class="meta" style="">其他</div>
                                            <div class="description">视频文档处理，可添加字幕</div>
                                        </div>
                                    </a><a target="_blank" href="https://online.easyscreenocr.com/zh" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214130935817.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">EasyScreenOCR</div>
                                            <div class="meta" style="">其他</div>
                                            <div class="description">免费在线将图像转换为纯文本</div>
                                        </div>
                                    </a><a target="_blank" href="https://duomu.tv/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214130922099.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">夺目</div>
                                            <div class="meta" style="">其他</div>
                                            <div class="description">企业视频在线制作工具</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.apowersoft.cn/free-online-screen-recorder" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214130645063.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">Apowersoft</div>
                                            <div class="meta" style="">其他</div>
                                            <div class="description">免费在线录屏</div>
                                        </div>
                                    </a>
                                </div>

                                <h2 id="recreationresource" style="margin: 0 auto" class="ui header m-margin-top">
                                    <i class="camera retro icon"></i>
                                    <div class="content">
                                        娱乐资源
                                    </div>
                                </h2>

                                <!--<div class="ui inverted divided stackable grid">-->
                                <div class="ui stackable four cards m-margin-top grid" style="width: 6000px" >
                                    <a target="_blank" href="https://www.novipnoad.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214085750707.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">NO视频</div>
                                            <div class="meta" style="">影视剧</div>
                                            <div class="description">没有广告看电影视频</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.mvcat.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214085712112.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">电影推荐</div>
                                            <div class="meta" style="">影视剧</div>
                                            <div class="description">分类搜索电影</div>
                                        </div>
                                    </a><a target="_blank" href="http://ifkdy.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201215194753192.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">疯狂影视搜索</div>
                                            <div class="meta" style="">影视剧</div>
                                            <div class="description">根据影视关键字搜索</div>
                                        </div>
                                    </a><a target="_blank" href="http://www.ziliao6.com/tv/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214085419139.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">牛牛TV</div>
                                            <div class="meta" style="">影视剧</div>
                                            <div class="description">根据影视名称搜索</div>
                                        </div>
                                    </a><a target="_blank" href="http://dy.27234.cn/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214085357538.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">在线看剧</div>
                                            <div class="meta" style="">影视剧</div>
                                            <div class="description">搜索影视</div>
                                        </div>
                                    </a><a target="_blank" href="http://www.shipinyu.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214085307102.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">视屏鱼</div>
                                            <div class="meta" style="">影视剧</div>
                                            <div class="description">视屏下载</div>
                                        </div>
                                    </a><a target="_blank" href="https://app.movie/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214085212884.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">APP影院</div>
                                            <div class="meta" style="">影视剧</div>
                                            <div class="description">在线影视</div>
                                        </div>
                                    </a><a target="_blank" href="http://www.yyetss.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214085024320.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">人人影视</div>
                                            <div class="meta" style="">影视剧</div>
                                            <div class="description">在线看剧</div>
                                        </div>
                                    </a><a target="_blank" href="http://www.kuhuiv.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214084749903.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">酷绘视屏</div>
                                            <div class="meta" style="">影视剧</div>
                                            <div class="description">在线看剧</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.qukantv.net/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214084658852.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">去看TV</div>
                                            <div class="meta" style="">影视剧</div>
                                            <div class="description">在线看剧</div>
                                        </div>
                                    </a><a target="_blank" href="http://www.92xiaoyouxi.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214084526596.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">神马电影网</div>
                                            <div class="meta" style="">影视剧</div>
                                            <div class="description">影视在线看</div>
                                        </div>
                                    </a><a target="_blank" href="http://www.yc2050.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214084300191.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">爱爱客电影网</div>
                                            <div class="meta" style="">影视剧</div>
                                            <div class="description">免费影视</div>
                                        </div>
                                    </a><a target="_blank" href="https://neets.cc/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214084104201.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">neets搜索站</div>
                                            <div class="meta" style="">影视剧</div>
                                            <div class="description">影视作品</div>
                                        </div>
                                    </a><a target="_blank" href="http://www.zzzfun.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213233905994.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">ZzzFun</div>
                                            <div class="meta" style="">影视剧</div>
                                            <div class="description">动漫视屏网</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.wanmeikk.me/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20210118204603046.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">完美看看</div>
                                            <div class="meta" style="">影视剧</div>
                                            <div class="description">免费高清电影、电视剧</div>
                                        </div>
                                    </a><a target="_blank" href="http://www.gequdaquan.net/gqss/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213233724237.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">歌曲大全</div>
                                            <div class="meta" style="">听音乐</div>
                                            <div class="description">音乐聚合搜索引擎</div>
                                        </div>
                                    </a><a target="_blank" href="https://flac.life/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213233652814.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">无损生活</div>
                                            <div class="meta" style="">听音乐</div>
                                            <div class="description">无损音乐下载，很赞</div>
                                        </div>
                                    </a><a target="_blank" href="http://47.112.23.238/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213233604114.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">天天静听</div>
                                            <div class="meta" style="">听音乐</div>
                                            <div class="description">在线下载无损音乐</div>
                                        </div>
                                    </a><a target="_blank" href="http://music.moresound.tk/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213233539595.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">MS-魔声</div>
                                            <div class="meta" style="">听音乐</div>
                                            <div class="description">解析VIP音乐免费下载</div>
                                        </div>
                                    </a><a target="_blank" href="http://music.ifkdy.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201215201016976.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">疯狂音乐搜索</div>
                                            <div class="meta" style="">听音乐</div>
                                            <div class="description">多平台音乐聚合型网站</div>
                                        </div>
                                    </a><a target="_blank" href="http://www.musictool.top/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213233221756.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">音乐搜索器</div>
                                            <div class="meta" style="">听音乐</div>
                                            <div class="description">多站合一音乐搜索</div>
                                        </div>
                                    </a><a target="_blank" href="https://muxiv.com/sc/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213233127406.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">muxiv</div>
                                            <div class="meta" style="">听音乐</div>
                                            <div class="description">好像是网易的另一个版本</div>
                                        </div>
                                    </a><a target="_blank" href="http://music.jsososo.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213233031208.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">一起听音乐呀</div>
                                            <div class="meta" style="">听音乐</div>
                                            <div class="description">在线听歌及下载</div>
                                        </div>
                                    </a><a target="_blank" href="http://tool.liumingye.cn/music/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213232930273.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">MyFreeMP3</div>
                                            <div class="meta" style="">听音乐</div>
                                            <div class="description">在线音乐、视频解析</div>
                                        </div>
                                    </a><a target="_blank" href="http://ivi.bupt.edu.cn/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213233803097.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">电视直播</div>
                                            <div class="meta" style="">直播类</div>
                                            <div class="description">在线看电视</div>
                                        </div>
                                    </a><a target="_blank" href="http://www.nba01.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20210118204236024.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">足球巴巴</div>
                                            <div class="meta" style="">直播类</div>
                                            <div class="description">NBA直播|足球直播|体育直播</div>
                                        </div>
                                    </a><a target="_blank" href="http://fm.xinli001.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213232847719.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">心理FM</div>
                                            <div class="meta" style="">其他</div>
                                            <div class="description">治愈系网络电台</div>
                                        </div>
                                    </a><a target="_blank" href="http://www.dbbqb.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213232831880.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">逗比拯救世界</div>
                                            <div class="meta" style="">其他</div>
                                            <div class="description">丰富的表情包</div>
                                        </div>
                                    </a>
                                </div>

                                <h2 id="designresource" style="margin: 0 auto" class="ui header m-margin-top">
                                    <i class="pencil alternate icon"></i>
                                    <div class="content">
                                        设计资源
                                    </div>
                                </h2>

                                <!--<div class="ui inverted divided stackable grid">-->
                                <div class="ui stackable four cards m-margin-top grid" style="width: 6000px" >
                                    <a target="_blank" href="https://www.maliquankai.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213232817491.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">码力全开</div>
                                            <div class="meta" style="">设计类</div>
                                            <div class="description">产品/设计/独立开发者的资源库</div>
                                        </div>
                                    </a><a target="_blank" href="https://icons8.cn/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213232802099.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">ICONS8</div>
                                            <div class="meta" style="">设计类</div>
                                            <div class="description">图标、插图、照片、音乐设计工具</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.maka.im/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213232542666.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">MAKA</div>
                                            <div class="meta" style="">设计类</div>
                                            <div class="description">在线设计</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.logosc.cn/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213232428931.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">LOGO神器</div>
                                            <div class="meta" style="">设计类</div>
                                            <div class="description">在线人工智能logo设计</div>
                                        </div>
                                    </a><a target="_blank" href="http://www.uugai.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213232329113.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">钙网</div>
                                            <div class="meta" style="">设计类</div>
                                            <div class="description">免费的LOGO在线设计制作工具</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.gaoding.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201217211440498.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">搞定设计</div>
                                            <div class="meta" style="">设计类</div>
                                            <div class="description">商业视觉在线设计平台</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.chuangkit.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201217211534748.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">创客贴</div>
                                            <div class="meta" style="">设计类</div>
                                            <div class="description">在线设计平台</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.fotor.com.cn/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201217211613795.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">Fotor懒设计</div>
                                            <div class="meta" style="">设计类</div>
                                            <div class="description">图片编辑和平面设计产品</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.canva.cn/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201217211655047.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">Canva</div>
                                            <div class="meta" style="">设计类</div>
                                            <div class="description">在线平面设计平台</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.iconfont.cn/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213232257546.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">iconfont</div>
                                            <div class="meta" style="">图标类</div>
                                            <div class="description">丰富的矢量图标管理</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.easyicon.net/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213232233959.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">easyicon</div>
                                            <div class="meta" style="">图标类</div>
                                            <div class="description">图标搜索下载网站</div>
                                        </div>
                                    </a><a target="_blank" href="https://fonts.safe.360.cn/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213232148519.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">360查字体</div>
                                            <div class="meta" style="">字体类</div>
                                            <div class="description">查看字体能否商用</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.hellofont.cn/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213232036880.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">字由</div>
                                            <div class="meta" style="">字体类</div>
                                            <div class="description">字体应用管理神器</div>
                                        </div>
                                    </a><a target="_blank" href="http://www.diyiziti.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213232012134.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">第一字体</div>
                                            <div class="meta" style="">字体类</div>
                                            <div class="description">书法字体在线转换生成器</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.100font.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213231958882.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">100font</div>
                                            <div class="meta" style="">字体类</div>
                                            <div class="description">免费商用字体</div>
                                        </div>
                                    </a><a target="_blank" href="https://clipchamp.com/zh-hans/video-editor/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213231908159.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">Clipchamp</div>
                                            <div class="meta" style="">音视频类</div>
                                            <div class="description">专业免费在线视频编辑器</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.aigei.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src=" http://images.newstar.net.cn/img/image-20201213231757497.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">爱给</div>
                                            <div class="meta" style="">音视频类</div>
                                            <div class="description">音效配乐、视频素材</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.newcger.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213231722473.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">NEWCGER</div>
                                            <div class="meta" style="">音视频类</div>
                                            <div class="description">视频素材免费下载</div>
                                        </div>
                                    </a><a target="_blank" href="https://mixkit.co/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213231255048.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">mixkit</div>
                                            <div class="meta" style="">音视频类</div>
                                            <div class="description">免费音视频模板</div>
                                        </div>
                                    </a><a target="_blank" href="https://ps.gaoding.com/#/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201217211725189.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">稿定</div>
                                            <div class="meta" style="">在线PS</div>
                                            <div class="description">稿定设计在线PS</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.photopea.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201217211842276.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">Photopea</div>
                                            <div class="meta" style="">在线PS</div>
                                            <div class="description">高级图片编辑器</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.uupoop.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201217211924558.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">在线PS</div>
                                            <div class="meta" style="">在线PS</div>
                                            <div class="description">在线PS</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.remove.bg/zh" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201217212043606.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">removebg</div>
                                            <div class="meta" style="">抠图类</div>
                                            <div class="description">消除图片中的背景</div>
                                        </div>
                                    </a><a target="_blank" href="https://koutu.gaoding.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201217211440498.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">稿定抠图</div>
                                            <div class="meta" style="">抠图类</div>
                                            <div class="description">在线删除图片背景</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.jing.fm/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213231153129.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">JING.FM</div>
                                            <div class="meta" style="">其他</div>
                                            <div class="description">免费库存剪贴画和剪影</div>
                                        </div>
                                    </a><a target="_blank" href="https://huaban.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201217211326049.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">花瓣网</div>
                                            <div class="meta" style="">其他</div>
                                            <div class="description">做生活的设计师</div>
                                        </div>
                                    </a><a target="_blank" href="https://undraw.co/illustrations" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201217211234793.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">unDraw</div>
                                            <div class="meta" style="">其他</div>
                                            <div class="description">插图下载</div>
                                        </div>
                                    </a><a target="_blank" href="https://magicmockups.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201217213242903.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">MAGIC</div>
                                            <div class="meta" style="">其他</div>
                                            <div class="description">将产品放在逼真的环境中</div>
                                        </div>
                                    </a>
                                </div>

                                <h2 id="searchresource" style="margin: 0 auto" class="ui header m-margin-top">
                                    <i class="search icon"></i>
                                    <div class="content">
                                        搜索资源
                                    </div>
                                </h2>

                                <!--<div class="ui inverted divided stackable grid">-->
                                <div class="ui stackable four cards m-margin-top grid" style="width: 6000px" >
                                    <a target="_blank" href="https://goobe.io/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213230950269.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">Goobe</div>
                                            <div class="meta" style="">引擎类</div>
                                            <div class="description">一个好用的&quot;程序员搜索&quot;</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.dogedoge.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213230920144.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">DogeDoge</div>
                                            <div class="meta" style="">引擎类</div>
                                            <div class="description">不追踪、不误导搜索</div>
                                        </div>
                                    </a><a target="_blank" href="https://mijisou.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213230812704.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">秘迹搜索</div>
                                            <div class="meta" style="">引擎类</div>
                                            <div class="description">不追踪你的搜索引擎</div>
                                        </div>
                                    </a><a target="_blank" href="https://mengso.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201215204356710.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">mengso</div>
                                            <div class="meta" style="">引擎类</div>
                                            <div class="description">不追踪你的搜索引擎</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.xiaomapan.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213230701783.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">小马盘搜索</div>
                                            <div class="meta" style="">网盘类</div>
                                            <div class="description">简洁好用的百度网盘搜索</div>
                                        </div>
                                    </a><a target="_blank" href="http://magnet.chongbuluo.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213230623161.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">资源搜索</div>
                                            <div class="meta" style="">网盘类</div>
                                            <div class="description">网盘资源搜索</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.baimapan.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213230542035.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">白马盘</div>
                                            <div class="meta" style="">网盘类</div>
                                            <div class="description">更新最及时的百度网盘资源</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.feifeipan.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213230457970.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">飞飞盘</div>
                                            <div class="meta" style="">网盘类</div>
                                            <div class="description">百度网盘搜索引擎</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.58wangpan.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213230402793.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">58盘搜索</div>
                                            <div class="meta" style="">网盘类</div>
                                            <div class="description">提供网盘资源搜索、网盘资源分享</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.yunpanjingling.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213230320980.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">面包树</div>
                                            <div class="meta" style="">网盘类</div>
                                            <div class="description">资源搜索</div>
                                        </div>
                                    </a><a target="_blank" href="https://gfsoso.99lb.net/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213230243073.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">谷粉学术</div>
                                            <div class="meta" style="">学术资源</div>
                                            <div class="description">快速地利用谷歌学术搜索查找文献</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.termonline.cn/index" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213230137690.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">术语在线</div>
                                            <div class="meta" style="">学术资源</div>
                                            <div class="description">术语知识公共服务平台</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.cn-ki.net/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213230039210.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">iData </div>
                                            <div class="meta" style="">学术资源</div>
                                            <div class="description">学术文献有限浏览下载</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.jiandati.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/jiandati.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">简答题</div>
                                            <div class="meta" style="">其他</div>
                                            <div class="description">安全、高效试题答案检索服务</div>
                                        </div>
                                    </a>
                                </div>

                                <h2 id="toolresource" style="margin: 0 auto" class="ui header m-margin-top">
                                    <i class="wrench  icon"></i>
                                    <div class="content">
                                        工具资源
                                    </div>
                                </h2>

                                <!--<div class="ui inverted divided stackable grid">-->
                                <div class="ui stackable four cards m-margin-top grid" style="width: 6000px" >
                                    <a target="_blank" href="http://www.toolnb.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/aiziliao.jpg" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">爱资料工具</div>
                                            <div class="meta" style="">工具类</div>
                                            <div class="description">提供开发上的便捷工具</div>
                                        </div>
                                    </a><a target="_blank" href="https://jingzhunyun.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213222715460.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">精准云工具</div>
                                            <div class="meta" style="">工具类</div>
                                            <div class="description">在线工具导航站</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.toolfk.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213222609790.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">ToolFK</div>
                                            <div class="meta" style="">工具类</div>
                                            <div class="description">在线开发工具箱</div>
                                        </div>
                                    </a><a target="_blank" href="http://www.gjw123.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213222420203.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">工具123</div>
                                            <div class="meta" style="">工具类</div>
                                            <div class="description">在线工具大全</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.shulijp.com/index.html" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213222315932.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">小心点</div>
                                            <div class="meta" style="">工具类</div>
                                            <div class="description">在线工具站</div>
                                        </div>
                                    </a><a target="_blank" href="https://bigjpg.com/zh" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213222154094.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">BigJPG</div>
                                            <div class="meta" style="">图片处理</div>
                                            <div class="description">图片无损放大</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.tutieshi.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213221940425.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">图贴士</div>
                                            <div class="meta" style="">图片处理</div>
                                            <div class="description">GIF工具</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.imgbot.ai/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213221101658.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">IMGBOT</div>
                                            <div class="meta" style="">图片处理</div>
                                            <div class="description">在线图片处理</div>
                                        </div>
                                    </a><a target="_blank" href="https://docsmall.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201214131219401.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">docsmall</div>
                                            <div class="meta" style="">图片处理</div>
                                            <div class="description">在线文件处理</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.toyaml.com/index.html" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201224192142951.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">yaml与properties互转</div>
                                            <div class="meta" style="">转化工具</div>
                                            <div class="description">yaml与properties文件在线转换工具</div>
                                        </div>
                                    </a><a target="_blank" href="https://mubu.com/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213220753486.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">幕布</div>
                                            <div class="meta" style="">其他</div>
                                            <div class="description">大纲一键生成思维导图</div>
                                        </div>
                                    </a><a target="_blank" href="https://www.uedbox.com/post/54776/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/guge.jpg" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">谷歌镜像大全</div>
                                            <div class="meta" style="">其他</div>
                                            <div class="description">维护率最高、可用率最好的谷歌镜像</div>
                                        </div>
                                    </a><a target="_blank" href="https://cli.im/" class="orange card">
                                        <div class="content" >
                                            <img class="left circular floated mini ui image" src="http://images.newstar.net.cn/img/image-20201213212745140.png" style="width: 45px;height: 45px;">
                                            <div class="left" style="font-size: medium;font-weight: bold;color: #2C7EEA">草料二维码</div>
                                            <div class="meta" style="">其他</div>
                                            <div class="description">二维码生成工具</div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <!--</div>-->

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--中间内容结束-->

        <!--弹框内容开始-->
        <div class="ui modal" _msthidden="6">
            <form action="http://192.168.164.134:1133/article/1" method="get" class="ui segment form">

                <div class="two fields">
                    <div class="field">
                        <label>资源名称</label>
                        <input name="resourceName" type="text" placeholder="资源名称（如：CSDN）">
                    </div>
                    <div class="field">
                        <label>资源地址</label>
                        <input name="resourceAddress" type="text" placeholder="资源地址（如：https://www.csdn.net/）">
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
                                <div class="item" data-value="学习资源">学习资源</div>
                                <div class="item" data-value="图片资源">图片资源</div>
                                <div class="item" data-value="办公资源">办公资源</div>
                                <div class="item" data-value="娱乐资源">娱乐资源</div>
                                <div class="item" data-value="设计资源">设计资源</div>
                                <div class="item" data-value="搜索资源">搜索资源</div>
                                <div class="item" data-value="工具资源">工具资源</div>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label>资源类型</label>
                        <input name="secondType" type="text" placeholder="资源类型（如：视频类）">
                    </div>

                </div>
                <input  style="margin:0px 0px 15px 0px;" name="description" type="text" placeholder="资源简介（如：众所周知，B站是一个学习网站）">
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
                        prompt: '标题：请输入资源名称'
                    }]
                },
                content : {
                    identifier: 'resourceAddress',
                    rules: [{
                        type:'url',
                        prompt: '标题：请输入资源地址或者请输入正确格式的资源地址'
                    }]
                },
                typeId : {
                    identifier: 'firstType',
                    rules: [{
                        type : 'empty',
                        prompt: '标题：请输入一级分类'
                    }]
                },
                firstPicture : {
                    identifier: 'secondType',
                    rules: [{
                        type : 'empty',
                        prompt: '标题：请输入资源类型'
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