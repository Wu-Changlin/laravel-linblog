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
            <li class="active">修改角色</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">修改角色</span>
                    </div>
                    <div class="widget-body">
                        <div id="horizontal-form">
                            <form class="form-horizontal" role="form" action="" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">角色组名称</label>
                                    <div class="col-sm-6">
                                        <input class="form-control"  placeholder="" name="title"  type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">启用状态</label>
                                    <div class="col-sm-6">
                                        <p class="help-block col-sm-4 red">
                                            <label>
                                                <input class="checkbox-slider colored-darkorange" checked="checked"  name="status" value="1" type="checkbox">
                                                <span class="text"></span>
                                            </label>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">配置权限</label>
                                    <div class="col-sm-6">
                                        <table class="table table-hover" style="background-color: rgb(242, 242, 242);">
                                            <thead class="bordered-darkorange">
                                            <tr>
                                                <th>
                                                    明细表
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            {{--                                            {volist name="authRuleRes" id="authRule"}--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <label>--}}
                                            {{--                                                        <?php echo str_repeat('&nbsp',$authRule['level']*5);?><input name="rules[]" value="{$authRule.id}" dataid="id-{$authRule.dataid}" class="inverted checkbox-parent {if condition="$authRule['level'] neq 0"}checkbox-child{/if}" type="checkbox" value="true">--}}
                                            {{--                                                        <span {if condition="$authRule['level'] eq 0"}style="font-weight:bold"{/if} class="text">{$authRule.title}</span>--}}
                                            {{--                                                    </label>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            {/volist}--}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">保存信息</button>
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


