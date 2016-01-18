<div id="inner-wrapper" class="container">
	<br /> <br />
		<div class="logo">
			<img src="{{ URL::to('/') }}/images/runningshoes.png" name="logo" id="logo" class="logo" />
		</div>	
	<div class="top-sertch">
		{!! Form::open(array('method' => 'POST', 'url' => 'Search')) !!}
		    <div class="search-group">
		        {!! Form::text('search', null, ['class' => 'search-control', 'name' => 'search-control', 'placeholder' =>'Search your store']) !!}
		        {!! Form::submit('Search', ['class' => 'btn-search','name' => 'btn-search',]) !!}
		    </div>
		{!! Form::close() !!}
		<div id="top-links-right">
		<ul>
			@foreach ($topLinks as $toplink)
				@if (!Session::get('token'))	
					@if ($toplink->name == 'Logout')
						<?php continue; ?>
					@endif
				@else
					@if ($toplink->link == 'Login')
					<li><a href="#">Logged in as {{session('username') }}</a></li>
					<?php continue; ?>
					@endif 
				@endif		
				<li><a href="{{ $toplink->link }}">{{ $toplink->name }}</a></li>
			@endforeach
			</ul>
		</div>
	</div>
	<br /> <br />
</div>
<nav>
	<ul class="container">
		@foreach ($links as $link)  
			<li><a href="http://localhost/sites/Running-shoes/public/{{ $link->menu_href }}">{{ $link->menu_name }}</a>
			@if(count($sublinks) > 0)
				<ul>
					@foreach ($sublinks as $sublink)
						@if ($sublink->submenu_menu_id == $link->menu_id)
						<li><a href="{{ $sublink->submenu_link }}">{{ $sublink->submenu_name }}</a></li>
						@endif
					@endforeach
				</ul>
			@endif
			</li>
		@endforeach
	</ul>		
</nav>