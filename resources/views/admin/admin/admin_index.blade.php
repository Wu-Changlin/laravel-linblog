@extends('layout.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '博客,个人博客,博客模板,个人博客模板,技术博客,博客系统,laravel博客,php博客')

@section('description', '霖的php博客,个人技术博客,开源一些thinkphp,laravel相关的博客系统项目,写一些技术文章.')

@section('content')
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="{{ route("admin.index") }}">控制面板</a>
            </li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
</div>
@endsection

