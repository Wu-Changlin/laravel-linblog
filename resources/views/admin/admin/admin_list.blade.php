@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '管理员列表')

@section('description', '显示所有管理员')

@section('content')
<!-- Page Content -->
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="{{ route("admin.index") }}">系统</a>
            </li>
            <li class="active">用户管理</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">

        <button type="button" tooltip="添加用户" class="btn btn-sm btn-azure btn-addon" onClick="javascript:window.location.href = '/admin/adminUser/showAddadminWeb'"> <i class="fa fa-plus"></i> Add
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
                                    <th class="text-center">用户名称</th>
                                    <th class="text-center">邮箱</th>
                                    <th class="text-center"width="20%">操作</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ( $data as $v)
                                    <tr>
                                        <td align="center">{{ $v->admin_id }}</td>
                                        <td align="center">{{ $v->name }}</td>
                                        <td align="center">{{ $v->email }}</td>
                                        <td align="center">
                                            <a href="{{ url('admin/adminUser/showUpdateAdminWeb', [$v->admin_id]) }}" class="btn btn-primary btn-sm shiny">
                                                <i class="fa fa-edit"></i> 编辑
                                            </a>
                                            <a href="#" onClick="warning('三思后行，确实要删除吗','{{ url('admin/adminUser/deleteAdminUser', [$v->admin_id]) }}')" class="btn btn-danger btn-sm shiny">
                                                <i class="fa fa-trash-o"></i> 删除
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div style="padding-top:10px;">
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




