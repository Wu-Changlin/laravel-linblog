@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '添加分类页')

@section('description', '添加分类.')

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
                <a href="{{route('category.index')}}">分类管理</a>
            </li>
            <li class="active">添加分类</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body" style="">

        <div class="row" style="">
            <div class="col-lg-12 col-sm-12 col-xs-12" style="">
                <div class="widget" style="">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">新增分类</span>
                    </div>
                    <div class="widget-body" style="">
                        <div id="horizontal-form" style="">
                            <form class="form-horizontal" role="form" action="{{ route('category.create') }}" method="post" style="">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">上级分类</label>
                                    <div class="col-sm-6">
                                        <select name="pid">
                                            <option value="0">顶级分类</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">分类名称</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" placeholder="" name="name" required="" type="text" value="{{ old('name') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">分类关键词</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" placeholder="" name="keywords" type="text" value="{{ old('keywords') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">分类描述</label>
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
                                    <label for="group_id" class="col-sm-2 control-label no-padding-right">分类类型</label>
                                    <div class="col-sm-6">
                                        @foreach( $data as $k=>$v)
                                            <div class="radio" style="float:left;margin-right:10px;">
                                                <label>
                                                    <input name="type" value="{{ $k }}" checked="checked" type="radio">
                                                    <span class="text">{{ $v }}</span>
                                                </label>
                                            </div>
                                        @endforeach
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




