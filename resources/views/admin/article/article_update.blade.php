@extends('layouts.admin')

@section('title', '霖博客,技术博客,个人博客模板,php博客系统')

@section('keywords', '文章列表')

@section('description', '显示所有文章')

@section('css')
    <link href="{{asset('admin/article/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin/article/editormd/css/editormd.min.css') }}">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <style>
        #lin-content{
            z-index: 1000;
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
                                            <th>内容</th>
                                            <td>
                                                <div id="lin-content">
                                                    <textarea name="markdown">{{ old('markdown') }}</textarea>
                                                </div>
                                            </td>
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
    <script src="{{ asset('admin/article/editormd/editormd.min.js') }}"></script>

    <script type="text/javascript">
        var testEditor;
        $(function() {
            // You can custom @link base url.
            editormd.urls.atLinkBase = "https://github.com/";

            testEditor = editormd("lin-content", {
                autoFocus : false,
                width     : "100%",
                height    : 720,
                toc       : true,
                //atLink    : false,    // disable @link
                //emailLink : false,    // disable email address auto link
                todoList  : true,
                placeholder: "请输入内容",
                toolbarAutoFixed: false,
                path      : '{{ asset('/admin/article/editormd/lib') }}/',
                emoji: true,
                toolbarIcons : ['undo', 'redo', 'bold', 'del', 'italic', 'quote', 'uppercase', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'list-ul', 'list-ol', 'hr', 'link', 'reference-link', 'image', 'code', 'code-block', 'table', 'emoji', 'html-entities', 'watch', 'preview', 'search', 'fullscreen'],
                imageUpload: true,
                imageUploadURL : '{{url('admin/article/uploadArticleImage')}}',
            });
        });

    </script>
@endsection



