<!DOCTYPE html>
@extends('Runningshoes/layouts.default')
@section('Runningshoes/content')
@if ($errors)
	@foreach ($errors->all() as $error)
		<h4>{{ $error }}</h4>
	@endforeach
@endif

@if(Session::get('Error'))
	<h4>{{ Session::get('Error') }}</h4>
 		{{ Session::forget('Error') }}
 		<br />
@endif

@if (session('RegUser'))
	{{ session('RegUser') }}
	{{ Session::forget('RegUser') }}
	<br />
@endif

<button class="show-reg" id="showreg-btn" onclick="toggleClock()">Register</button>
<div class="log-group-in" id="log-in">
	{!! Form::open(array('method' => 'POST', 'url' => 'makelogin')) !!}
	        {!! Form::text('username', null, ['class' => 'username-log-in', 'name' => 'login_username', 'placeholder' =>'Username goes here']) !!}
	        {!! Form::password('password', ['class' => 'password-log-in', 'name' => 'login_password', 'placeholder' => 'Password goes here']) !!}
	       	{!! Form::submit('Log in', ['class' => 'btn-login','name' => 'btn-login', 'value' => 'hej']) !!}
	{!! Form::close() !!}
</div>
<script type="text/javascript" src="{{ asset('/js/script.js') }}"></script>
<div class="reg-group-in" id="reg-in">
	{!! Form::open(array('method' => 'POST', 'url' => 'reguser')) !!}
	        {!! Form::text('Regusername', null, ['class' => 'username-Reg-in', 'name' => 'Reg_username', 'placeholder' =>'Register your username']) !!}
	        {!! Form::email('Regemail', null, ['class' => 'email-Reg-in', 'name' => 'Reg_email', 'placeholder' =>'Register your email']) !!}
	        {!! Form::password('Regpassword', ['class' => 'password-Reg-in', 'name' => 'Reg_password', 'placeholder' => 'Register your password']) !!}
	        {!! Form::password('Regpassword_again', ['class' => 'password-Reg-in', 'name' => 'Reg_password_confirmation', 'placeholder' => 'Register your password again']) !!}
	       	{!! Form::submit('Register', ['class' => 'btn-login','name' => 'btn-login']) !!}
	{!! Form::close() !!}
</div>
@stop