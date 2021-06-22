@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '栏目列表')

@section('description', '显示所有栏目')

@section('content')
<!-- Page Content -->
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="{{route('admin.index')}}">系统</a>
            </li>
            <li class="active">栏目管理</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">

        <button type="button" tooltip="添加栏目" class="btn btn-sm btn-azure btn-addon" onclick="javascript:window.location.href = '/admin/category/showAddcategoryWeb'"> <i class="fa fa-plus"></i> Add
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
{{--                                        <th class="text-center" width="10%">排序</th>--}}
                                        <th class="text-center">栏目名称</th>
                                        <th class="text-center">栏目类型</th>
                                        <th class="text-center" width="10%">下架</th>
                                        <th class="text-center" width="20%">操作</th>
                                    </tr>
                                    </thead>
                                    @foreach($data as $v)
                                    <tbody>
                                    <tr>
                                        <td align="center">{{  $v->category_id }}</td>
                                        <td align="center">{{  $v->name }}</td>
                                        <td align="center">{{  $v->type }}</td>
                                        <td align="center">{{  $v->is_pull }}</td>
                                        <td align="center">
                                            <a href="{{ url('admin/category/showUpdatecategoryWeb',[$v->category_id]) }}" class="btn btn-primary btn-sm shiny">
                                                <i class="fa fa-edit"></i> 编辑
                                            </a>
                                            <a href="#" onclick="warning('三思后行，确实要删除吗','{{ url('admin/category/deleteCategory',[$v->category_id]) }}')" class="btn btn-danger btn-sm shiny">
                                                <i class="fa fa-trash-o"></i> 删除
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </form>
                        </div>

                        <div>
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




