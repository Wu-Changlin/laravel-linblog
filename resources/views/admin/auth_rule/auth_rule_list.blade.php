@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '权限列表')

@section('description', '显示所有权限')

@section('content')
<!-- Page Content -->
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="{{ route("admin.index") }}">系统</a>
            </li>
            <li class="active">权限管理</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">

        <button type="button" tooltip="添加权限" class="btn btn-sm btn-azure btn-addon" onClick="javascript:window.location.href = '/admin/rule/store'"> <i class="fa fa-plus"></i> Add
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
                                    <th class="text-center" width="10%">排序</th>
                                    <th class="text-center">权限名称</th>
                                    <th class="text-center">控/方</th>
                                    <th class="text-center">级别</th>
                                    <th class="text-center"width="20%">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $k=>$v)
                                    <tr>
                                        <td align="center">{{ $v['rule_id'] }}</td>
                                        <td align="center"><input name="{{ $v['rule_id'] }}" type="text" style="text-align:center;"value="{{ $v['sort'] }}"></td>
                                        <td > @if($v['level']!=0)  {{ '|'.str_repeat('—',$v['level']*3)}}@endif {{ $v['title'] }} </td>
                                        <td align="center">{{$v['name']}}</td>
                                        <td align="center">{{$v['level']}}</td>
                                        <td align="center">
                                            <a href="{{ url('admin/rule/edit',[$v['rule_id']]) }}" class="btn btn-primary btn-sm shiny">
                                                <i class="fa fa-edit"></i> 编辑
                                            </a>
                                            <a href="#" onClick="warning('三思后行，确实要删除吗','{{ url('admin/rule/delete',[$v['rule_id']]) }}')" class="btn btn-danger btn-sm shiny">
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
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Body -->
</div>
<!-- /Page Content -->
@endsection




