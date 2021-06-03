@extends('layout.login_register')

@section('title', '登录博客系统')

@section('keywords', '登录')

@section('description', '登录博客系统操作')


@section('css')

@endsection

{{--登录表单开始--}}
@section('content')

<form  id="msform"  action="{{ route("admin.login")}}" method="post" >
    {{ csrf_field() }}
    <fieldset>
        <h2>登录</h2>
        <input type="text"   name="email" placeholder="Email" required=""/>
        <p  id="invalid-email" hidden>*邮箱格式错误</p>
        <input type="password" name="password" placeholder="password" required=""/>
        <button  class="next action-button"  type="submit" > 登录</button>
    </fieldset>
</form>

@endsection

{{--登录表单结束--}}


@section('js')

    <script>
        // 验证邮箱格式是否正确
        $('input[name="email"]').on('input', function () {
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var inputValue = $('input[name="email"]').val();
            if (mailformat.test(inputValue) || inputValue === '') {
                $('#invalid-email').hide();
                $('button').prop('disabled', false);
            } else {
                $('#invalid-email').show();
                $('button').prop('disabled', true);
            }
        });
    </script>

@endsection