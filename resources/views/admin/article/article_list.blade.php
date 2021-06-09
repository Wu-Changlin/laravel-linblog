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

        <button type="button" tooltip="添加用户" class="btn btn-sm btn-azure btn-addon" onclick="javascript:window.location.href = '/admin/article/showAddarticleWeb'"> <i class="fa fa-plus"></i> Add
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
                                    <th class="text-center">标题</th>
                                    <th class="text-center">作者</th>
                                    <th class="text-center">推荐</th>
                                    <th class="text-center">所属栏目</th>
                                    <th class="text-center">缩略图</th>
                                    <th class="text-center" width="20%">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td align="center">11</td>
                                    <td align="center">禧玛诺METREA 驱动——现代城市骑行新风尚</td>
                                    <td align="center">光明网</td>
                                    <td align="center"> 已推荐</td>
                                    <td align="center">车身装备</td>
                                    <td align="center">
                                        <img src="\uploads/20210510/33c4dbcf05c841f1116764ac8c7d2cf6.jpg" height="30">

                                    </td>
                                    <td align="center">
                                        <a href="{{ url('admin/article/showUpdatearticleWeb/1') }}" class="btn btn-primary btn-sm shiny">
                                            <i class="fa fa-edit"></i> 编辑
                                        </a>
                                        <a href="#" onclick="warning('确实要删除吗','{{ url('admin/article/deleteArticle/3') }}')" class="btn btn-danger btn-sm shiny">
                                            <i class="fa fa-trash-o"></i> 删除
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div style="padding-top:10px;">
                                <ul class="pagination"><li class="disabled"><span>«</span></li> <li class="active"><span>1</span></li><li><a href="/admin/article/lst.html?page=2">2</a></li> <li><a href="/admin/article/lst.html?page=2">»</a></li></ul>                         </div>
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




