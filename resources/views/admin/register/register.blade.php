@extends('layout.login_register')

@section('title', '注册博客系统')

@section('keywords', '注册')

@section('description', '注册博客系统操作')

@section('content')
<form id="msform"  >

    <fieldset>
        <h2>注册</h2>
        <input type="text" name="email" placeholder="Email" />
        <input type="password" name="pass" placeholder="Password" />
        <input type="password" name="cpass" placeholder="Confirm Password" />
        <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>

</form>

@endsection