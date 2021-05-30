
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录 - 管理后台</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('admin/login/admin.css ')}}" rel="stylesheet">
    <style>
        .login_content {
            text-shadow: none;
        }
    </style>


</head>
<body class="nav-md">


<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action=" {{ url('register/registerUser') }}" method="post">
                    <input class="hidden" type="checkbox" name="remember" checked>
                    {{ csrf_field() }}
                    <h1>Admin</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Email" required="" name="email" value="">
                        <p id="invalid-email" class="text-danger text-left" hidden><span>*</span>邮箱格式错误</p>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" name="password">
                    </div>
                    <div>
                        <button class="btn btn-default submit" type="submit">登录</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div class="clearfix"></div>
                        <div>
                            <h1><i class="fa fa-paw"></i> 霖博客!</h1>
                            <p>©2017 All Rights Reserved. 霖博客! is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>


<script src="{{asset('admin/login/admin.js')}}"></script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })
</script>

<script>
    // validate email format
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



</body>
</html>
