@extends('layout.admin')

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
                <a href="/admin/adminUser">系统</a>
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
                                    <th class="text-center">所属用户组</th>
                                    <th class="text-center"width="20%">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td align="center">12</td>
                                    <td align="center">admin</td>
                                    <td align="center">超级管理员</td>
                                    <td align="center">
                                        <a href="/admin/admin/edit/id/12.html" class="btn btn-primary btn-sm shiny">
                                            <i class="fa fa-edit"></i> 编辑
                                        </a>
                                        <a href="#" onClick="warning('确实要删除吗','/admin/admin/del/id/12.html')" class="btn btn-danger btn-sm shiny">
                                            <i class="fa fa-trash-o"></i> 删除
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">20</td>
                                    <td align="center">admin123456</td>
                                    <td align="center">配置管理员</td>
                                    <td align="center">
                                        <a href="/admin/admin/edit/id/20.html" class="btn btn-primary btn-sm shiny">
                                            <i class="fa fa-edit"></i> 编辑
                                        </a>
                                        <a href="#" onClick="warning('确实要删除吗','/admin/admin/del/id/20.html')" class="btn btn-danger btn-sm shiny">
                                            <i class="fa fa-trash-o"></i> 删除
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">23</td>
                                    <td align="center">adminlink</td>
                                    <td align="center">链接管理员</td>
                                    <td align="center">
                                        <a href="/admin/admin/edit/id/23.html" class="btn btn-primary btn-sm shiny">
                                            <i class="fa fa-edit"></i> 编辑
                                        </a>
                                        <a href="#" onClick="warning('确实要删除吗','/admin/admin/del/id/23.html')" class="btn btn-danger btn-sm shiny">
                                            <i class="fa fa-trash-o"></i> 删除
                                        </a>
                                    </td>
                                </tr>
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




