@extends('Runningshoes.layouts.default')
@section('Runningshoes.content')
<div class="inner-wrapper">
<div class="center">
asadad
	@foreach ($getBloggs as $getBlogg)
		{{$getBlogg->info}}
	@endforeach
</div>
</div>
@stop