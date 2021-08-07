@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '文章列表')

@section('description', '显示所有文章')

@section('content')
<!-- Page Content -->
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.index') }}">系统</a>
            </li>
            <li class="active">文章管理</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">

        <button type="button" tooltip="添加用户" class="btn btn-sm btn-azure btn-addon" onclick="javascript:window.location.href = '/admin/article/store'"> <i class="fa fa-plus"></i> Add
        </button>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="flip-scroll">
                            <table class="table table-bordered table-hover">
                                <thead class="">
                                <tr>
                                    <th class="text-center" width="10%">ID</th>
                                    <th class="text-center">所属栏目</th>
                                    <th class="text-center">所属标签</th>
                                    <th class="text-center">标题</th>
                                    <th class="text-center">作者</th>
                                    <th class="text-center">访问量</th>
                                    <th class="text-center">下架</th>
                                    <th class="text-center">缩略图</th>
                                    <th class="text-center" width="20%">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $data as $v)
                                    <tr>
                                        <td align="center">{{ $v->article_id }}</td>
                                        <td align="center">{{ $v->category_name }}</td>
                                        <td align="center">{{ $v->tag_name }}</td>
                                        <td align="center">{{ $v->title }}</td>
                                        <td align="center">{{ $v->author }}</td>
                                        <td align="center">{{ $v->Visits }}</td>
                                        <td align="center">{{ $v->is_pull }}</td>
                                        <td align="center">
                                            <img src="{{url($v->cover)}}" height="30">

                                        </td>
                                        <td align="center">
                                            <a href="{{ url('admin/article/edit',[$v->article_id]) }}" class="btn btn-primary btn-sm shiny">
                                                <i class="fa fa-edit"></i> 编辑
                                            </a>
                                            <a href="#" onclick="warning('三思后行，确实要删除吗','{{ url('admin/article/delete',[$v->article_id]) }}')" class="btn btn-danger btn-sm shiny">
                                                <i class="fa fa-trash-o"></i> 删除
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div style="padding-top:10px;">
                            {{ $data->links() }}
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




