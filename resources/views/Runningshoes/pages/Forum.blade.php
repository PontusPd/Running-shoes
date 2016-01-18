@extends('Runningshoes/layouts.default')
@section ('Runningshoes/content')
	<div id="forum-center">
		<div class="center">	
			@foreach ($forum_cats as $forum_cat)
			<br />
			<div class="cat-forum">
				<a href="Forum/{{ $forum_cat->Forum_cat_name }}">{{ $forum_cat->Forum_cat_name }}</a>({{ $forum_cat->forum_qty }})<br />
				<p>{{ $forum_cat->Forum_cat_desc }}</p><br /><hr />
			</div>
			@endforeach
		</div>
	</div>
@stop