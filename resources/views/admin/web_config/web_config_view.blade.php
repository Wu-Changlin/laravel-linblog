@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '网站配置页')

@section('description', '网站配置.')

@section('content')
<!-- Page Content -->
<div class="page-content" style="">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="{{route('admin.index')}}">系统</a>
            </li>
            <li class="active">管理网站配置</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">

        <button type="button"  class="btn btn-sm btn-azure btn-addon">网站配置项
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
                                        <th class="text-right" width="10%">配置名称</th>
                                        <th class="text-left">配置值</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td align="right">Bick</td>
                                        <td align="left">
                                            <input name="Name" type="text" class="form-control" style="width:600px;" value="站点名称">

                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="right">网站关键词</td>
                                        <td align="left">
                                            <input name="Keywords" type="text" class="form-control" style="width:600px;" value="网络关键词">

                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="right">网站描述</td>
                                        <td align="left">
                                            <textarea name="Description" class="form-control" style="width:600px;">                                                                                                 我范围范围                                                                                                                                                                                                                                                     </textarea>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="right">是否关闭网站</td>
                                        <td align="left">
                                            <label style="margin-right:15px;">
                                                <input name="Stop" value="是" type="radio">
                                                <span class="text">是</span>
                                            </label>
                                            <label style="margin-right:15px;">
                                                <input checked="checked" name="Stop" value="否" type="radio">
                                                <span class="text">否</span>
                                            </label>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="right">启动验证码</td>
                                        <td align="left">
                                            <label>
                                                <input checked="checked" class="colored-success" name="Code" value="是" type="checkbox">
                                                <span class="text">是</span>
                                            </label>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="right">自动清空缓存</td>
                                        <td align="left">
                                            <select name="Cache">
                                                <option value="1个小时"> 1个小时</option>
                                                <option value="2个小时" selected="selected"> 2个小时</option>
                                            </select>



                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                                <div>
                                    <input class="btn btn-primary btn-sm shiny" style="margin-left:140px; margin-top:10px" type="submit" value="修改配置">
                                </div>
                            </form>
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




