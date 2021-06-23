@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '编辑资源分类')

@section('description', '显示编辑资源分类页面')

@section('css')
    <link href="{{asset('admin/article/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />  {{--上传图片插件--}}
@endsection


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
                        <span class="widget-caption">编辑资源分类</span>
                    </div>
                    <div class="widget-body" style="">
                        <div id="horizontal-form" style="">
                            <form class="form-horizontal" role="form" action="{{ route('resource.updateResource') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="text" name="resource_stock_id" value="{{ $resource->resource_stock_id }}" hidden>
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">上级资源分类</label>

                                    <div class="col-sm-6">
                                        <select name="pid">
                                            @if ( $resource->pid==0 )
                                            <option value="0">顶级资源</option>
                                            @else
                                                    @foreach($pid_res as $v)
                                                        <option  value="{{ $v->resource_stock_id }}"  @if ( $resource->pid==$v->resource_stock_id ) selected="selected" @endif >{{ $v->name }}</option>
                                                    @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="group_id" class="col-sm-2 control-label no-padding-right">资源分类类型</label>
                                    <div class="col-sm-6">

                                        @foreach($data as $k=>$v)
                                            @if ( $k==1 )
                                                @if (  $resource->type==1 )
                                                    <div class="radio" style="float:left;margin-right:10px;">
                                                        <label>
                                                            <span class="text" style="color: #0e9e1a">{{$v}}</span>
                                                        </label>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="radio" style="float:left;margin-right:10px;">
                                                    <label>
                                                            <input name="type" value="{{$k}}" @if ( $resource->type==$k ) checked="checked" @endif    type="radio">
                                                            <span class="text"  >{{$v}}</span>
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">资源分类名称</label>
                                    <div class="col-sm-6">
                                        <input  class="form-control" placeholder="" name="name" required="" type="text" value="{{ $resource->name }}">{{ old('name') }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">资源地址</label>
                                    <div class="col-sm-6">
                                        <input type="url" class="form-control" placeholder="" name="url" required="" type="text" value="{{ $resource->url }}">{{ old('url') }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">资源分类描述</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" placeholder="" name="description" required="" type="text" value="{{ $resource->description }}">{{ old('description') }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">资源图片</label>
                                    <div class="col-sm-6">
                                        <div class="fileinput fileinput-new" data-provides="fileinput" id="uploadImageDiv">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 220px; height: 150px; line-height: 150px;">
                                                <img src="{{ url($resource->cover) }}" alt="">
                                                <input type="hidden" name="cover" value="{{ $resource->cover }}">
                                            </div>
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

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">下架</label>
                                    <div class="col-sm-6">
                                        <div class="radio" style="float:left;margin-right:10px;">
                                            <label>
                                                <input name="is_pull" value="1" @if ( $resource->is_pull==1 ) checked="checked" @endif type="radio">
                                                <span class="text">是</span>
                                            </label>
                                        </div>
                                        <div class="radio" style="float:left;margin-right:10px;">
                                            <label>
                                                <input name="is_pull" value="2" class="inverted"  @if ( $resource->is_pull==2 ) checked="checked" @endif type="radio" >
                                                <span class="text">否</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">验证</label>
                                    <div class="col-sm-6">
                                        <div class="radio" style="float:left;margin-right:10px;">
                                            <label>
                                                <input name="is_verify" value="1" @if ( $resource->is_verify==1 ) checked="checked" @endif  type="radio"  resource="">
                                                <span class="text">未通过</span>
                                            </label>
                                        </div>
                                        <div class="radio" style="float:left;margin-right:10px;">
                                            <label>
                                                <input name="is_verify" value="2" class="inverted" @if ( $resource->is_verify==2 ) checked="checked" @endif type="radio">
                                                <span class="text">通过</span>
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

@section('js')
    <script src="{{ asset('admin/article/bootstrap-fileinput.js')}}"></script>  {{--上传图片插件--}}
@endsection



