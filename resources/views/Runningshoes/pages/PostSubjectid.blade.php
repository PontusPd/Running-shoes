@extends('Runningshoes/layouts.default')
@section ('Runningshoes/content')

<div id="inner-wrapper-forum">
	<div id="forum-id">
		
		<p>{{ session('reply') }}</p>
		<p>{{ Session::forget('reply') }}</p>

		@foreach ($postsubjectsid as $postsubjectid)
			<br><p>{{ $postsubjectid->post_by }}</p>	
			<p>{{ $postsubjectid->post_name }}</p>	
			<p>{{ $postsubjectid->post_date }}</p>
			<p>{{ $postsubjectid->post_content }}</p>
			<form action="http://localhost/sites/Running-shoes/public/Forum/Games/reply/{{ $postsubjectid->post_subject_id }}" method="POST">
				{!! Form::hidden('hidden', $postsubjectid->post_subject_id,['class' => 'hidden-reply','name' => 'hidden_reply']) !!}
				{!! Form::submit('Reply', ['class' => 'btn-reply','name' => 'btn_reply']) !!}
			</form> <br />
			<hr />
		@endforeach

		@foreach ($replys as $reply)
		<br />
			<p>{{$reply->reply_text}}</p>
			<p>{{$reply->reply_date}}</p>
			<p>{{$reply->reply_by}}</p>
			<br /><hr />
		@endforeach
	</div>
	</div>	
@stop