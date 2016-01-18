@extends('Runningshoes.layouts.default')
@section ('Runningshoes/content')

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

@if(Session::get('resived'))
	<h4>{{ Session::get('resived') }}</h4>
 		{{ Session::forget('resived') }}
 		<br />
@endif


<div class="wrap-contact-us">
	<div id="fly-header">
	<br /> <br />
	<div id="fly-inner">
		<ul>
			<li><h2>Contact us</h2></li>
			<li><label for="email">Email:</label></li>
			<li><label for="phone">Phone:</label></li>
			<li><label for="Adress">Adress:</label></li>
			{!! Form::open(array('method' => 'POST', 'url' => 'http://localhost/sites/Running-shoes/public/contact-us/email')) !!}
	   			<li>{!! Form::text('name', '', ['class' => 'name-contact','name' => 'name_contact', 'placeholder' => 'Your Name']) !!}</li><br />
	   			<li>{!! Form::email('email', '', ['class' => 'email-contact','name' => 'email_contact', 'placeholder' => 'Your email']) !!}</li><br />
	   			<li>{!! Form::textarea('text', '', ['class' => 'text-contact','name' => 'text_contact', 'Your text']) !!}</li><br />
	   			<li>{!! Form::submit('Send', ['class' => 'btn-sub','name' => 'btn_sub']) !!}</li>
			{!! Form::close() !!}
		</ul>
	</div>	
	</div>
</div>
<br /> <br /><br />
@stop