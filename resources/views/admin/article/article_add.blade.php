@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '文章列表')

@section('description', '显示所有文章')

@section('css')
    <link href="{{asset('admin/article/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
@endsection


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
                            <form class="form-horizontal" role="form" action="{{ route('article.addArticle') }}" method="post" enctype="multipart/form-data" style="">
                                {{ csrf_field() }}
                                <div class="form-group" style="">

                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">所属栏目</label>
                                        <div class="col-sm-6">
                                            <select name="category_id">
                                                @foreach($categorys as $v)
                                                    <option value="{{ $v->category_id }}">{{ $v->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">所属栏目</label>
                                        <div class="col-sm-6">
                                            <select name="tag_id">
                                                @foreach($tags as $v)
                                                    <option value="{{ $v->tag_id }}">{{ $v->tag_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">标题</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" placeholder="" name="title" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">作者</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" placeholder="" name="author" type="text" value="{{ $author }}">
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
                                        <label for="username" class="col-sm-2 control-label no-padding-right">下架</label>
                                        <div class="col-sm-6">
                                            <div class="radio" style="float:left;margin-right:10px;">
                                                <label>
                                                    <input name="rec_index" value="1" type="radio">
                                                    <span class="text">是</span>
                                                </label>
                                            </div>
                                            <div class="radio" style="float:left;margin-right:10px;">
                                                <label>
                                                    <input name="rec_index" value="2" class="inverted" checked="checked" type="radio">
                                                    <span class="text">否</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    {{--上传图片插件开始--}}
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">封面图</label>
                                        <div class="col-md-9"></div>
                                        <div class="col-md-6">
                                            <div class="fileinput fileinput-new" data-provides="fileinput" id="uploadImageDiv">
                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 220px; height: 150px; line-height: 150px;"></div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-new">选择图片</span>
                                                        <span class="fileinput-exists">更改</span>
                                                        <input type="file" name="cover">
                                                    </span>
                                                    <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">移除</a>
                                                </div>
                                            </div>
                                            <div id="titleImageError" style="color: #a94442"></div>
                                        </div>
                                    </div>
                                    {{--上传图片插件结束--}}
                                </div>


                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">markdown</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="markdown"></textarea>
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

@section('js')
    <script src="{{asset('admin/article/bootstrap-fileinput.js')}}"></script>
@endsection


