@extends('Runningshoes/layouts.default')
@section ('Runningshoes/content')
@if ($errors)
	@foreach ($errors->all() as $error)
		<h4>{{ $error }}</h4>
	@endforeach
@endif
{{ session('reply') }}
{{ Session::forget('reply') }}
@foreach ($postsubjects as $postsubject)		
	<form action="http://localhost/sites/Running-shoes/public/Forum/reply/createReply" method="POST">
		{!! Form::hidden('hidden', $postsubject->post_subject_id,['class' => 'hidden-reply','name' => 'hidden_reply']) !!}
		{!! Form::textarea('content', null, ['class' => 'form-control', 'name' => 'reply_content']) !!}
		{!! Form::hidden('hidden',  $postsubject->post_subject_id, ['class' => 'form-control_hidden', 'name' => 'reply_content_hidden']) !!}
		{!! Form::submit('Reply', ['class' => 'btn-reply','name' => 'btn_reply']) !!}
	</form>
@endforeach	
@stop