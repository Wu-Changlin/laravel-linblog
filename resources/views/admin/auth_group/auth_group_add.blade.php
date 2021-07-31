@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '添加角色页')

@section('description', '添加角色.')

@section('content')
<!-- Page Content -->
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="{{route("admin.index")}}">系统</a>
            </li>
            <li>
                <a href="{{ route("group.index") }}">角色管理</a>
            </li>
            <li class="active">添加角色</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">新增角色组</span>
                    </div>
                    <div class="widget-body">
                        <div id="horizontal-form">
                            <form class="form-horizontal" role="form" action="{{ route('group.create') }}" method="post">
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
                                                {volist name="authRuleRes" id="authRule"}
                                                <tr>
                                                    <td>
                                                        <label>
                                                            <?php echo str_repeat('&nbsp',$authRule['level']*5);?>

                                                                <input name="rules[]" value="{$authRule.id}" dataid="id-{$authRule.dataid}" class="inverted checkbox-parent {if condition="$authRule['level'] neq 0"}checkbox-child{/if}" type="checkbox" value="true">
                                                            <span {if condition="$authRule['level'] eq 0"}style="font-weight:bold"{/if} class="text">{$authRule.title}</span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                {/volist}


                                                <tr>
                                                    <td>
                                                        <label>
                                                            @foreach($data as $k=>$v)
                                                                <option value="{{$v['rule_id']}}">@if($v['level']!=0)  {{ '|'.str_repeat('—',$v['level']*3)}}@endif {{ $v['title'] }}</option>


                                                           {{ str_repeat('&nbsp',$v['level']*5) }}

                                                            <input name="rules[]" value="{$authRule.id}" dataid="id-{$authRule.dataid}" class="inverted checkbox-parent {if condition="$authRule['level'] neq 0"}checkbox-child{/if}" type="checkbox" value="true">
                                                            <span {if condition="$authRule['level'] eq 0"}style="font-weight:bold"{/if} class="text">{$authRule.title}</span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                @endforeach

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




