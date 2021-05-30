@extends('layout.login_register')

@section('title', '登录博客系统')

@section('keywords', '登录')

@section('description', '登录博客系统操作')

@section('content')
<form  id="msform"  action="{{ url('admin/login/logIn') }}" method="post" >
    {{ csrf_field() }}
    <fieldset>
        <h2>登录</h2>
        <input type="text"   name="email" placeholder="Email" required=""/>
        <input type="password" name="pass" placeholder="Password" required=""/>
        <input name="next"  class="next action-button"  type="submit" value="Next"  />
    </fieldset>

</form>

@endsection


