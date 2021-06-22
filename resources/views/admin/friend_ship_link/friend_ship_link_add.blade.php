@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '添加友链页')

@section('description', '添加友链.')

@section('content')
<!-- Page Content -->
<div class="page-content" style="">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="{{route('admin.index')}}">系统</a>
            </li>
            <li>
                <a href="{{url('admin/category/showCategory')}}">友链管理</a>
            </li>
            <li class="active">添加友链</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body" style="">

        <div class="row" style="">
            <div class="col-lg-12 col-sm-12 col-xs-12" style="">
                <div class="widget" style="">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">新增友链</span>
                    </div>
                    <div class="widget-body" style="">
                        <div id="horizontal-form" style="">
                            <form class="form-horizontal" role="form" action="{{ route('resource.addResources') }}" method="post" style="">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">上级友链</label>
                                    <div class="col-sm-6">
                                        <select name="pid">
                                            <option value="0">顶级友链</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">友链名称</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" placeholder="" name="name" required="" type="text" value="{{ old('name') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">友链关键词</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" placeholder="" name="keywords" type="text" value="{{ old('keywords') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">友链描述</label>
                                    <div class="col-sm-6">
                                        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">下架</label>
                                    <div class="col-sm-6">
                                        <div class="radio" style="float:left;margin-right:10px;">
                                            <label>
                                                <input name="is_pull" value="1" type="radio">
                                                <span class="text">是</span>
                                            </label>
                                        </div>
                                        <div class="radio" style="float:left;margin-right:10px;">
                                            <label>
                                                <input name="is_pull" value="2" class="inverted" checked="checked" type="radio">
                                                <span class="text">否</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="group_id" class="col-sm-2 control-label no-padding-right">友链类型</label>
                                    <div class="col-sm-6">
                                        <div class="radio" style="float:left;margin-right:10px;">
                                            <label>
                                                <input name="type" value="1" checked="checked" type="radio">
                                                <span class="text">文章列表</span>
                                            </label>
                                        </div>
                                        <div class="radio" style="float:left;margin-right:10px;">
                                            <label>
                                                <input name="type" value="2" class="inverted" type="radio">
                                                <span class="text">单页友链</span>
                                            </label>
                                        </div>
                                        <div class="radio" style="float:left;margin-right:10px;">
                                            <label>
                                                <input name="type" value="3" class="inverted" type="radio">
                                                <span class="text">图片列表</span>
                                            </label>
                                        </div>
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




