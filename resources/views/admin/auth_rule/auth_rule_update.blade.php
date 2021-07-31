@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '编辑权限')

@section('description', '显示编辑权限页面')

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
                <a href="{{ route("rule.index") }}">权限管理</a>
            </li>
            <li class="active">权限修改</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">修改权限</span>
                    </div>
                    <div class="widget-body">
                        <div id="horizontal-form">
                            <form class="form-horizontal" role="form" action="{{ route('rule.update') }}" method="post">
                                <input type="text" name="rule_id" value="{{ $rule['rule_id'] }}" hidden>
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">上级权限</label>
                                    <div class="col-sm-6">
                                        <select name="pid">
                                            <option value="0">顶级权限</option>
                                            @foreach($data as $k=>$v)
                                                <option value="{{$v['rule_id']}}" @if($v['rule_id']==$rule['pid'])  selected="selected" @endif>@if($v['level']!=0)  {{ '|'.str_repeat('—',$v['level']*3)}}@endif {{ $v['title'] }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">权限名称</label>
                                    <div class="col-sm-6">
                                        <input class="form-control"  placeholder="" name="title"  type="text" value="{{ $rule['title'] }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">控/方</label>
                                    <div class="col-sm-6">
                                        <input class="form-control"  placeholder="" name="name"  type="text" value="{{ $rule['name'] }}">
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


