@extends('Runningshoes/layouts.default')
@section ('Runningshoes/content')
	<div id="inner-wrapper-forum">	
		<div id="forum-id">
		<br /><p class="fly-cat">{{ $categori }}</p>
		@foreach($postsubjects as $postsubject)
				<br /><a href="Games/{{ $postsubject->subjects_id }}">{{ $postsubject->subjects_name }}</a><br /><br />
				From: <a href="Games/username"> {{ $postsubject->subjects_username }}</a> <br /><br /><span>Date: {{ $postsubject->subjects_date }}</span>
			<br /><br /><hr />
		@endforeach
	</div>
</div>
@stop