@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '修改网站配置')

@section('description', '修改网站配置')

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
                <a href="{{route('webconfig.index')}}">网站配置管理</a>
            </li>
            <li class="active">修改网站配置</li>
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
                            <form class="form-horizontal" role="form" action="{{ route('webconfig.update') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $data->config_id }}">
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">中文名称</label>
                                    <div class="col-sm-6">
                                        <input class="form-control"  placeholder="" name="cnname"  type="text" value="{{ $data->name }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">英文名称</label>
                                    <div class="col-sm-6">
                                        <input class="form-control"  placeholder="" name="enname"  type="text" value="{{ $data->enname }}">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">配置类型</label>
                                    <div class="col-sm-6" >
                                        <select name="type">
                                            <option value="0"  @if ($data->type==0)   selected="selected"     @endif>请选择</option>
                                            <option value="1"  @if ($data->type==1)   selected="selected"     @endif>单行文本</option>
                                            <option value="2"  @if ($data->type==2)   selected="selected"     @endif>文本域</option>
                                            <option value="3"  @if ($data->type==3)   selected="selected"     @endif>单选按钮</option>
                                            <option value="4"  @if ($data->type==4)   selected="selected"     @endif>复选按钮</option>
                                            <option value="5"  @if ($data->type==5)   selected="selected"     @endif>下拉菜单</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">配置可选值</label>
                                    <div class="col-sm-6">
                                        <input class="form-control"  placeholder="" name="values"  type="text" value="{{ $data->values }}">
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




