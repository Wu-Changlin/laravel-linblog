@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '添加网站配置')

@section('description', '添加网站配置')

@section('content')

<!-- Page Content -->
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="{{route('admin.index')}}">系统</a>
            </li>
            <li>
                <a href="{{ route('webconfig.index') }}">管理配置</a>
            </li>
            <li class="active">添加配置</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">新增配置</span>
                    </div>
                    <div class="widget-body">
                        <div id="horizontal-form">
                            <form class="form-horizontal" role="form" action="{{ route('webconfig.create') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">中文名称</label>
                                    <div class="col-sm-6">
                                        <input class="form-control"  placeholder="" required="" name="cnname"  type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">英文名称</label>
                                    <div class="col-sm-6">
                                        <input class="form-control"  placeholder="" name="enname"  type="text">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">配置类型</label>
                                    <div class="col-sm-6" >
                                        <select name="type">
                                            <option value="0">请选择</option>
                                            <option value="1">单行文本</option>
                                            <option value="2">文本域</option>
                                            <option value="3">单选按钮</option>
                                            <option value="4">复选按钮</option>
                                            <option value="5">下拉菜单</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">配置可选值</label>
                                    <div class="col-sm-6">
                                        <input class="form-control"  placeholder="" name="values"  type="text">
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




