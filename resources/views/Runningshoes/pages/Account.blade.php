@extends('Runningshoes.layouts.default')
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

@if (session('Updated'))
	{{ session('Updated') }}
	{{ Session::forget('Updated') }}
	<br />
@endif
<div class="page-account">
<div class="center">
	<div id="updateUser"> 	
		{!! Form::open(array('method' => 'POST', 'url' => 'updateAcc')) !!}
			{!! Form::text('username', null, ['class' => 'username-log-in', 'name' => 'update_username', 'placeholder' =>'Username goes here']) !!}
			{!! Form::password('password', ['class' => 'password-log-in', 'name' => 'update_password', 'placeholder' => 'Password goes here']) !!}
			{!! Form::password('password', ['class' => 'password-log-in', 'name' => 'update_password_confirmation', 'placeholder' => 'Password goes here again']) !!}
			{!! Form::email('email', ['class' => 'email-log-in', 'name' => 'update_email', 'placeholder' => 'email goes here']) !!}
			{!! Form::submit('Log in', ['class' => 'btn-login','name' => 'btn-login']) !!}
		{!! Form::close() !!}
	</div>	
</div>
</div>
@stop