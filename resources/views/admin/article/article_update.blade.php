@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '文章列表')

@section('description', '显示所有文章')

@section('css')
    <link href="{{asset('admin/article/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="http://cdn.bootcss.com/highlight.js/8.0/styles/monokai_sublime.min.css" rel="stylesheet">
    <style>
        .w-e-text-container {
            height: auto !important;
            width: 80% !important;
        }

        .w-e-toolbar{
            flex-wrap:wrap;
        }

    </style>
@endsection


@section('content')
    <!-- Page Content -->
    <div class="page-content" style="">
        <!-- Page Breadcrumb -->
        <div class="page-breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('admin.index') }}">系统</a>
                </li>
                <li>
                    <a href="{{ route('article.showArticle') }}">文章管理</a>
                </li>
                <li class="active">修改文章</li>
            </ul>
        </div>
        <!-- /Page Breadcrumb -->

        <!-- Page Body -->
        <div class="page-body" style="">

            <div class="row" style="">
                <div class="col-lg-12 col-sm-12 col-xs-12" style="">
                    <div class="widget" style="">
                        <div class="widget-header bordered-bottom bordered-blue">
                            <span class="widget-caption">修改文章</span>
                        </div>
                        <div class="widget-body">
                            <div class="flip-scroll">
                                <form action="{{ route('article.updateArticle') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <table class="table table-bordered table-hover">
                                        <tbody>

                                        <tr>
                                            <td align="right">所属栏目</td>
                                            <td align="left">
                                                <select name="category_id">
                                                    @foreach($categorys as $v)
                                                        <option @if( $articles->category_id == $v->category_id) selected="selected"  @endif  value="{{ $v->category_id }}">{{ $v->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="right">标签</td>
                                            <td align="left">
                                                @foreach($tags as $v)
                                                    <label style="margin-right:15px;">
                                                        <input  class="form-field-radio"  name="tag_id" value="{{ $v->tag_id }}" type="radio" @if( $articles->tag_id == $v->tag_id) checked="checked"  @endif>
                                                        <span class="text">{{ $v->tag_name }}</span>
                                                    </label>
                                                @endforeach
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="right">标题</td>
                                            <td align="left">
                                                <textarea name="title" class="form-control"style="width:600px;">{{$articles->title }} </textarea>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="right">作者</td>
                                            <td align="left">
                                                <input name="author" type="text" class="form-control" style="width:600px;" value="{{$articles->author }}">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="right">关键词</td>
                                            <td align="left">
                                                <input name="keywords" type="text" class="form-control" style="width:600px;" value="{{ $articles->keywords }}">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="right">描述</td>
                                            <td align="left">
                                                <textarea name="desc" class="form-control"style="width:600px;">{{ $articles->description }}</textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="right">下架</td>
                                            <td align="left">
                                                <label style="margin-right:15px;">
                                                    <input name="rec_index" value="1" type="radio" @if( $articles->is_pull == '1') checked="checked"  @endif>
                                                    <span class="text">是</span>
                                                </label>
                                                <label style="margin-right:15px;">
                                                    <input name="rec_index" value="2" type="radio"  @if( $articles->is_pull == '2') checked="checked"  @endif>
                                                    <span class="text">否</span>
                                                </label>
                                            </td>
                                        </tr>



                                        <tr>
                                            <td align="right">封面图</td>
                                            <td align="left">
                                                <div class="fileinput fileinput-new" data-provides="fileinput" id="uploadImageDiv">
                                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 220px; height: 150px; line-height: 150px;">

                                                        <img src="{{ url($articles->cover) }}" alt="">
                                                        <input type="hidden" name="cover" value="{{ $articles->cover }}">
                                                    </div>
                                                    <div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-new">选择图片</span>
                                                        <span class="fileinput-exists">更改</span>
                                                        <input type="file" name="cover">
                                                    </span>
                                                        <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">移除</a>
                                                    </div>
                                                </div>
                                                <div id="titleImageError" style="color: #a94442"></div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="right">内容</td>
                                            <td align="left" >

                                                <div  id="lin-content" >

                                                </div>
                                                <textarea style="display: none" name="content" id="txtIntro"></textarea>
                                        </tr>



                                        </tbody>
                                    </table>
                                    <div>
                                        <input class="btn btn-success shiny" style="margin-left:140px; margin-top:10px" type="submit" value="修改文章">
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
    <script src="{{ asset('admin/article/bootstrap-fileinput.js')}}"></script>  {{--上传图片插件--}}
    <script type="text/javascript" src="{{asset('admin/article/wangEditor.min.js')}}"></script>
    <script src="http://cdn.bootcss.com/highlight.js/8.0/highlight.min.js"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
    <!-- 引入 wangEditor.min.js -->
    <script type="text/javascript">
        var E = window.wangEditor;
        var editor = new E('#lin-content')


        editor.config.pasteIgnoreImg = true; //开启文件上传服务器
        editor.config.customUploadImg = function (files, insert) {
            var data = new FormData();
            data.append("file", files[0]);
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } //laravle Token验证
            });
            $.ajax({
                type: "POST",
                url: "{{url('admin/article/uploadArticleImage')}}", //laravel 文件上传的流程见上一篇文章
                data: data,
                dataType: 'json',
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    insert(data.url);// insert 是获取图片 url 后，插入到编辑器的方法
                }

            })
        };



        var $content = $('#txtIntro');

        // 监控wangEditor中的内容变化，并将html内容同步更新到 textarea
        editor.config.onchange = function (html) {
            $content.val(html);
        }

        editor.highlight = hljs;
        editor.create()

        // 初始化 textarea 的值
        $content.val(editor.txt.html())

    </script>
@endsection



