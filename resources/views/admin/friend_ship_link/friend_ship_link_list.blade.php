@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '友好博客列表')

@section('description', '显示所有友好博客')

@section('content')
<!-- Page Content -->
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="{{route('admin.index')}}">系统</a>
            </li>
            <li class="active">友好博客管理</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">

        <button type="button" tooltip="添加友好博客" class="btn btn-sm btn-azure btn-addon" onclick="javascript:window.location.href = '/admin/friendshipLink/store'"> <i class="fa fa-plus"></i> Add
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
                                        <th class="text-center" width="5%">ID</th>
                                        <th class="text-center">友好博客名称</th>
                                        <th class="text-center">友好博客地址</th>
                                        <th class="text-center">资源图片</th>
                                        <th class="text-center">添加时间</th>
                                        <th class="text-center" width="5%">验证</th>
                                        <th class="text-center" width="5%">下架</th>
                                        <th class="text-center" width="10%">操作</th>
                                    </tr>
                                    </thead>
                                    @foreach($data as $v)
                                    <tbody>
                                    <tr>
                                        <td align="center">{{  $v->link_id }}</td>
                                        <td align="center">{{  $v->name }}</td>
                                        <td style="word-break:break-all; word-wrap:break-word; white-space:inherit" align="center">{{  $v->url }}</td>
                                        <td align="center">
                                            <img src="{{url($v->cover)}}" height="30">
                                        </td>
                                        <td align="center">{{  $v->created_at }}</td>
                                        <td align="center">{{  $v->is_verify }}</td>
                                        <td align="center">{{  $v->is_pull }}</td>
                                        <td align="center">
                                            <a href="{{ url('admin/friendshipLink/edit',[$v->link_id]) }}" class="btn btn-primary btn-sm shiny">
                                                <i class="fa fa-edit"></i> 编辑
                                            </a>
                                            <a href="#" onclick="warning('三思后行，确实要删除吗','{{ url('admin/friendshipLink/delete',[$v->link_id]) }}')" class="btn btn-danger btn-sm shiny">
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




