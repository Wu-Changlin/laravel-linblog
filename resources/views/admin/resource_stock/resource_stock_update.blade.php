@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '编辑资源分类')

@section('description', '显示编辑资源分类页面')

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
                <a href="{{ route('resource.index') }}">资源分类管理</a>
            </li>
            <li class="active">编辑资源分类</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body" style="">

        <div class="row" style="">
            <div class="col-lg-12 col-sm-12 col-xs-12" style="">
                <div class="widget" style="">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">新增资源分类</span>
                    </div>
                    <div class="widget-body" style="">
                        <div id="horizontal-form" style="">
                            <form class="form-horizontal" role="form" action="{{ route('resource.updateResource') }}" method="post" style="">
                               {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $data->category_id }}">
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">上级资源分类</label>
                                    <div class="col-sm-6">
                                        <select name="pid">
                                            <option value="0">顶级资源分类</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">资源分类名称</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" placeholder="" name="name" required="" type="text" value="{{ $data->name }}" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">资源分类关键词</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" placeholder="" name="keywords" type="text" value="{{ $data->keywords }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">资源分类描述</label>
                                    <div class="col-sm-6">
                                        <textarea name="description" class="form-control" >{{ $data->description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">下架</label>
                                    <div class="col-sm-6">
                                        <div class="radio" style="float:left;margin-right:10px;">
                                            <label>
                                                <input name="is_pull" value="1" @if( $data->is_pull == 1) checked="checked"  @endif type="radio">
                                                <span class="text">是</span>
                                            </label>
                                        </div>
                                        <div class="radio" style="float:left;margin-right:10px;">
                                            <label>
                                                <input name="is_pull" value="2"  @if( $data->is_pull == 2) checked="checked"  @endif  type="radio">
                                                <span class="text">否</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="group_id" class="col-sm-2 control-label no-padding-right">资源分类类型</label>
                                    <div class="col-sm-6">
                                        <div class="radio" style="float:left;margin-right:10px;">
                                            <label>
                                                <input name="type" value="1" @if( $data->type=='1') checked="checked"  @endif type="radio">
                                                <span class="text">文章列表</span>
                                            </label>
                                        </div>
                                        <div class="radio" style="float:left;margin-right:10px;">
                                            <label>
                                                <input name="type" value="2"  @if( $data->type=='2') checked="checked"  @endif type="radio">
                                                <span class="text">单页资源分类</span>
                                            </label>
                                        </div>
                                        <div class="radio" style="float:left;margin-right:10px;">
                                            <label>
                                                <input name="type" value="3"  @if( $data->type=='3') checked="checked"  @endif type="radio">
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




