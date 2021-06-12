<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>上传</title>
    <script type="text/javascript" src="{{asset('admin/article/wangEditor.min.js')}}"></script>
</head>

<body>
<div id="div1">
    <p>欢迎使用 <b>wangEditor</b> 富文本编辑器</p>
</div>



<!-- 引入 wangEditor.min.js -->
<script type="text/javascript">
    var E = window.wangEditor;
    var editor = new E('#div1')  // 两个参数也可以传入 elem 对象，class 选择器 ， 这个是将菜单与编辑分开 ，可以看文档
    editor.config.pasteIgnoreImg = true; //开启文件上传服务器
    editor.config.customUploadImg = function (files, insert) {
        var data = new FormData();
        data.append("file", files[0]);
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } //laravle Token验证
        });
        $.ajax({
            type: "POST",
            url: "{{url('UploadImg')}}", //laravel 文件上传的流程见上一篇文章
            data: data,
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                insert(data.path);// insert 是获取图片 url 后，插入到编辑器的方法
            }
        })
    };
    editor.create();
</script>
</body>

</html>