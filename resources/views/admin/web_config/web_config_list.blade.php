@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '网站配置列表')

@section('description', '显示所有网站配置')

@section('content')
<!-- Page Content -->
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="{{route('admin.index')}}">系统</a>
            </li>
            <li class="active">网站配置管理</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">

        <button type="button" tooltip="添加网站配置" class="btn btn-sm btn-azure btn-addon" onclick="javascript:window.location.href = '/admin/category/showAddcategoryWeb'"> <i class="fa fa-plus"></i> Add
        </button>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="flip-scroll">
                            <form action="" method="post">
                                <table class="table table-bordered table-hover">
                                    <thead class="">
                                    <tr>
                                        <th class="text-center" width="10%">ID</th>
                                        <th class="text-center">中文名称</th>
                                        <th class="text-center">英文名称</th>
                                        <th class="text-center">配置类型</th>
                                        <th class="text-center">可选值</th>
                                        <th class="text-center"width="20%">操作</th>
                                    </tr>
                                    </thead>
                                    @foreach($data as $v)
                                    <tbody>
                                    <tr>
                                        <td align="center">{{  $v->config_id }}</td>
                                        <td align="center">{{  $v->name }}</td>
                                        <td align="center">{{  $v->enname }}</td>
                                        <td align="center">{{  $v->type }}</td>
                                        <td align="center">{{  $v->values }}</td>
                                        <td align="center">
                                            <a href="{{ url('admin/web/showUpdatewebConfig',[$v->config_id]) }}" class="btn btn-primary btn-sm shiny">
                                                <i class="fa fa-edit"></i> 编辑
                                            </a>
                                            <a href="#" onclick="warning('三思后行，确实要删除吗','{{ url('admin/web/deleteWebconfig',[$v->config_id]) }}')" class="btn btn-danger btn-sm shiny">
                                                <i class="fa fa-trash-o"></i> 删除
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </form>
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




