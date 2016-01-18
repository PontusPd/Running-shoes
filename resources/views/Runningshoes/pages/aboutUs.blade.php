@extends ('Runningshoes.layouts.default')
@section('Runningshoes/content')
<div id="info-aboutus">
<br /> <br />
	<div class="inner-element">
		<h2>Get In Run</h2><br /><hr /><br />
		<br /><img src="#" id="bild-aboutUs"><br /><br />
			<h5>Running for your intrest</h5><br />
			@foreach ($infoPages as $infoPage)
				<center><p>{{ $infoPage->info }}</p></center>
			@endforeach
			<br />
			<h3>Welcome to us on Runningshoes</h3>
			<br /> <button>View in Facebook</button><br /><br /><br /><br />
	</div>		
</div>
@stop