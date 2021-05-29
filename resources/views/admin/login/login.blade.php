@extends('layout.login_register')

@section('title', '登录博客系统')

@section('keywords', '登录')

@section('description', '登录博客系统操作')

@section('content')
<form  id="msform"  action="{{ url('admin/login/logIn') }}" method="get" >

    <fieldset>
        <h2>登录</h2>
        <input type="text" name="email" placeholder="Email" />
        <input type="password" name="pass" placeholder="Password" />
        <input  name="next" class="next action-button"  type="submit" value="Next" />
    </fieldset>

</form>



@endsection