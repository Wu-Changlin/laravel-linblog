@extends('layout.login_register')

@section('title', '登录博客系统')

@section('keywords', '登录')

@section('description', '登录博客系统操作')
@section('css')

<style>
#msf {
width: 400px;
margin: 50px auto;
text-align: center;
position: relative;
}
</style>
@endsection

@section('content')


<!--@if ($errors->any())-->
<!--@foreach ($errors->all() as $error)-->
<!--<div class="alert alert-danger ">-->
<!--    <strong>遇到错误: </strong>-->
<!--    {{ $error }}!-->
<!--</div>-->
<!--@endforeach-->
<!--@endif-->

@if(session('msg'))
    <p  id="msf"   class="alert alert-danger " style="color:red" text-align="center">{{ session('msg') }}</p>

@endif


<form  id="msform"  action="{{ url('admin/login/logIn') }}" method="post" >
    {{ csrf_field() }}
    <fieldset>
        <h2>登录</h2>
<!--        <input type="text"   name="name" placeholder="name"   name="" required=""/>-->
        <input type="text"   name="name" placeholder="name" />
        <input type="password" name="password" placeholder="password" required=""/>
        <input name="next"  class="next action-button"  type="submit" value="Next"  />
    </fieldset>

</form>

@endsection


