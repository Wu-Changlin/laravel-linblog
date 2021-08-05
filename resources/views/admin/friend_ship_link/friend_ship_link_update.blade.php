@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '编辑友好博客')

@section('description', '显示编辑友好博客页面')

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
                <a href="{{ route('friendshipLink.index') }}">友好博客管理</a>
            </li>
            <li class="active">编辑友好博客</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body" style="">

        <div class="row" style="">
            <div class="col-lg-12 col-sm-12 col-xs-12" style="">
                <div class="widget" style="">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">新增友好博客</span>
                    </div>
                    <div class="widget-body" style="">
                        <div id="horizontal-form" style="">
                            <form class="form-horizontal" role="form" action="{{ route('friendshipLink.update') }}" method="post" style="">
                               {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $data->link_id }}">
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">友链名称</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" placeholder="" name="name" required="" type="text" value="{{ $data->name }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">友链地址</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" placeholder="" name="url" required="" type="url" value="{{ $data->url }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">友链图片</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" placeholder="" name="cover" required="" type="url" value="{{ $data->cover }}" id="in">

                                        <img  id="show_url" style="margin:10px;" src="{{ url($data->cover) }}" height="160">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">下架</label>
                                    <div class="col-sm-6">
                                        <div class="radio" style="float:left;margin-right:10px;">
                                            <label>
                                                <input name="is_pull" value="1" @if ( $data->is_pull==1 ) checked="checked" @endif type="radio">
                                                <span class="text">是</span>
                                            </label>
                                        </div>
                                        <div class="radio" style="float:left;margin-right:10px;">
                                            <label>
                                                <input name="is_pull" value="2" class="inverted"  @if ( $data->is_pull==2 ) checked="checked" @endif type="radio" >
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
                                                <input name="is_verify" value="1" @if ( $data->is_verify==1 ) checked="checked" @endif  type="radio"  resource="">
                                                <span class="text">未通过</span>
                                            </label>
                                        </div>
                                        <div class="radio" style="float:left;margin-right:10px;">
                                            <label>
                                                <input name="is_verify" value="2" class="inverted" @if ( $data->is_verify==2 ) checked="checked" @endif type="radio">
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
    <script>
        $("#in").blur(function(){
            var img_url=this.value;
            if (img_url == '' || img_url == undefined || img_url == null) {
                console.log('空图片地址');
            } else {
                $("#show_url").removeAttr("src").attr("src", img_url);
            }
        })
    </script>
@endsection


