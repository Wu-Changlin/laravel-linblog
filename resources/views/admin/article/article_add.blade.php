@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '文章列表')

@section('description', '显示所有文章')

@section('content')
<!-- Page Content -->
<div class="page-content" style="">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.index') }}">系统</a>
            </li>
            <li>
                <a href="{{ route('article.showArticle') }}">文章管理</a>
            </li>
            <li class="active">添加文章</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body" style="">

        <div class="row" style="">
            <div class="col-lg-12 col-sm-12 col-xs-12" style="">
                <div class="widget" style="">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">新增文章</span>
                    </div>
                    <div class="widget-body" style="">
                        <div id="horizontal-form" style="">
                            <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" style="">
                                <div class="form-group" style="">
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">标题</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" placeholder="" name="title" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">关键字</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" placeholder="" name="keywords" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">描述</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="desc"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">作者</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" placeholder="" name="author" type="text">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">推荐</label>
                                        <div class="col-sm-6">
                                            <div class="radio" style="float:left;margin-right:10px;">
                                                <label>
                                                    <input name="rec" value="1" type="radio">
                                                    <span class="text">是</span>
                                                </label>
                                            </div>
                                            <div class="radio" style="float:left;margin-right:10px;">
                                                <label>
                                                    <input name="rec" value="0" class="inverted" checked="checked" type="radio">
                                                    <span class="text">否</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">缩略图</label>
                                        <div class="col-sm-6">
                                            <input placeholder="" name="thumb" type="file">
                                        </div>
                                    </div>


                                    <label for="username" class="col-sm-2 control-label no-padding-right">所属栏目</label>
                                    <div class="col-sm-6">
                                        <select name="cateid">
                                            <option value="1">单车分类</option>
                                            <option value="2">|————————死飞车</option>
                                            <option value="4">|————————山地车</option>
                                            <option value="5">|————————公路车</option>
                                            <option value="6">骑行装备</option>
                                            <option value="7">|————————人身装备</option>
                                            <option value="8">|————————车身装备</option>
                                            <option value="9">单车生活</option>
                                            <option value="10">|————————单车生活2</option>
                                            <option value="11">关于我们</option>
                                            <option value="12">公司简介</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">保存信息</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Body -->
</div>
<!-- /Page Content -->
@endsection




