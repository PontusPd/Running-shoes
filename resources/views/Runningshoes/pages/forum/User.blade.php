@extends('Runningshoes.layouts.default')
@section('Runningshoes/content')
@foreach($getUsers as $getUser)
	{{$getUser->subjects_username}}
	<p>Member</p>
	{{$getUser->image}}
	Reg: {{$getUser->created_at}}
	{{$getUser->created_at}}
	Totala inlägg: {{$getUser->}}
@endforeach
@stop