@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '网站配置页')

@section('description', '网站配置')

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
                            <form action="{{ route('webconfig.updateConfigview') }}" method="post">
                                {{ csrf_field() }}
                                <table class="table table-bordered table-hover">
                                    <thead class="">
                                    <tr>
                                        <th class="text-right" width="10%">配置名称</th>
                                        <th class="text-left">配置值</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $k=>$v)
                                    <tr>
                                        <td align="right">{{ $v->name }}</td>
                                        <td align="left">
{{--                                            1=>'单行文本框',2=>'文本域',3=>'单选按钮',4=>'复选按钮5',5=>'下拉菜单'--}}
                                            @if ($v->type==1)
                                                <input name="{{ $v->config_id }}" type="text" class="form-control" style="width:600px;" value="{{ $v->value }}">
                                            @elseif($v->type==2)
                                                <textarea name="{{ $v->config_id }}" class="form-control" style="width:600px;">{{ $v->value }}</textarea>
                                            @elseif($v->type==3)

                                                    @if($v->values)
                                                        @foreach(explode(',', $v->values) as $radio_k=>$radio_v)
                                                        <label style="margin-right:15px;">
                                                            <input @if($v->value==$radio_v) checked="checked"  @endif  name="{{ $v->config_id }}" value="{{ $radio_v }}" type="radio">
                                                             <span class="text">{{$radio_v}}</span>
                                                        </label>
                                                        @endforeach
                                                    @endif

                                            @elseif($v->type==4)
                                                <label>
                                                    <input  @if($v->value==$v->values) checked="checked"  @endif   name="{{ $v->config_id }}" class="colored-success"  value="{{ $v->values }}" type="checkbox" >
                                                    <span class="text">{{ $v->values }}</span>
                                                </label>
                                            @elseif($v->type==5)
                                                <select name="{{ $v->config_id }}">
                                                @if($v->values)

                                                    @foreach(explode(',', $v->values) as $dropdown_toggle_k=>$dropdown_toggle_v)
                                                        <option @if($v->value == $dropdown_toggle_v) selected="selected"  @endif  value="{{ $dropdown_toggle_v }}" >{{ $dropdown_toggle_v }}</option>

                                                    @endforeach
                                                @endif
                                                </select>
                                            @else

                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach

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




