@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '添加管理员页')

@section('description', '添加管理员.')

@section('content')
<!-- Page Content -->
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="/admin/index/index.html">系统</a>
            </li>
            <li>
                <a href="/admin/admin/lst.html">管理员管理</a>
            </li>
            <li class="active">添加管理员</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">新增管理员</span>
                    </div>
                    <div class="widget-body">
                        <div id="horizontal-form">
                            <form class="form-horizontal" role="form" action="/admin/admin/add.html" method="post">
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">管理员名称</label>
                                    <div class="col-sm-6">
                                        <input class="form-control"  placeholder="" name="name" required="" type="text">
                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">所属用户组</label>
                                    <div class="col-sm-6">
                                        <select name="group_id">
                                            <option value="1">超级管理员</option>
                                            <option value="3">配置管理员</option>
                                            <option value="4">链接管理员</option>
                                        </select>
                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>

                                <div class="form-group">
                                    <label for="group_id" class="col-sm-2 control-label no-padding-right">管理员密码</label>
                                    <div class="col-sm-6">
                                        <input class="form-control"  placeholder="" name="password" required="" type="text">
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




