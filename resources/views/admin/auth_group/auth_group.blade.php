@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '编辑角色')

@section('description', '显示编辑角色页面')

@section('content')
<!-- Page Content -->
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="{{ route("admin.index") }}">系统</a>
            </li>
            <li>
                <a href="{{ route("admin.showAdminUser") }}">角色管理</a>
            </li>
            <li class="active">角色修改</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">角色修改</span>
                    </div>
                    <div class="widget-body">
                        <div id="horizontal-form">
                            <form class="form-horizontal" role="form" action="{{ route("admin.updateAdminUser") }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $data->admin_id }}">
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">角色昵称</label>
                                    <div class="col-sm-6">
                                        <input class="form-control"  placeholder="" name="name" value="{{ $data->name }}" type="text">
                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">角色邮箱</label>
                                    <div class="col-sm-6">
                                        <input class="form-control"  placeholder="" name="email" value="{{ $data->email }}" type="text">
                                    </div>
                                    <p class="help-block col-sm-2 red">* 必填</p>
                                    <p id="invalid-email"  class="col-sm-2 red" hidden>*邮箱格式错误</p>
                                </div>

                                <div class="form-group">
                                    <label for="group_id" class="col-sm-2 control-label no-padding-right">角色密码</label>
                                    <div class="col-sm-6">
                                        <input class="form-control"  placeholder="" name="password" value="{{ $data->password }}" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">修改信息</button>
                                    </div>
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

@section('js')

    <script>
        // 验证邮箱格式是否正确
        $('input[name="email"]').on('input', function () {
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; //邮箱正则
            var inputValue = $('input[name="email"]').val();                  //input框name="email"的值
            if (mailformat.test(inputValue) || inputValue === '') {           // email格式错误或者input框name="email"的值为空
                $('#invalid-email').hide();
                $('button').prop('disabled', false);
            } else {                                                          // email格式正确或者input框name="email"的值不为空
                $('#invalid-email').show();
                $('button').prop('disabled', true);
            }
        });
    </script>

@endsection


