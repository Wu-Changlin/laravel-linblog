@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '角色列表')

@section('description', '显示所有角色')

@section('content')
<!-- Page Content -->
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="{{ route("admin.index") }}">系统</a>
            </li>
            <li class="active">角色管理</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">

        <button type="button" tooltip="添加角色" class="btn btn-sm btn-azure btn-addon" onClick="javascript:window.location.href = '/admin/group/store'"> <i class="fa fa-plus"></i> Add
        </button>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="flip-scroll">
                            <form action=""method="post">
                                <table class="table table-bordered table-hover">
                                    <thead class="">
                                    <tr>
                                        <th class="text-center" width="10%">ID</th>
                                        <th class="text-center">角色组名称</th>
                                        <th class="text-center">启用状态</th>
                                        <th class="text-center"width="20%">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $k=>$v)
                                        <tr>
                                            <td align="center">{{ $v->group_id }}</td>
                                            <td align="center">{{ $v->title }}</td>
                                            <td align="center">
                                                @if($v->status==1)
                                                    <a class="btn btn-success btn-sm" href="javascript:void(0);">启用</a>
                                                @else
                                                    <a class="btn btn-darkorange btn-sm" href="javascript:void(0);">禁用
                                                @endif
                                            </td>
                                            <td align="center">
                                                <a href="{{ url('admin/group/edit',[  $v->group_id ]) }}" class="btn btn-primary btn-sm shiny">
                                                    <i class="fa fa-edit"></i> 编辑
                                                </a>
                                                <a href="#" onClick="warning('三思后行，确实要删除吗','{{ url('admin/group/delete',[ $v->group_id ]) }}')" class="btn btn-danger btn-sm shiny">
                                                    <i class="fa fa-trash-o"></i> 删除
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
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




