@extends('Runningshoes/layouts.default')
@section ('Runningshoes/content')
<div class="display-inline">
<div class="center">
<div class="vert-align"> 
@if ($errors)
	@foreach ($errors->all() as $error)
		<h4>{{ $error }}</h4>
	@endforeach
@endif

@if (session('Subject'))
	{{ session('Subject') }}
	{{ Session::forget('Subject') }}
	<br />
@endif
{!! Form::open(array('method' => 'POST', 'url' => 'http://localhost/sites/Running-shoes/public/create/subject')) !!}
        <label id="name" for="name">Name:</label><label for="select-cat">Select Category: </label> 
        <br /><br/><hr /><br />
	    <div id="align-name-cat">    
	        <div class="linked">
	        	{!! Form::text('name', null, ['class' => 'create_sub_name name-cat', 'name' => 'create_sub_name', 'placeholder' =>'Name goes here']) !!}<br>
	        </div>
	        <div class="linked"> 
	        	{!! Form::select('cat', array('Categoris' => $getforumCats)); !!}<br />
	    	</div>
	    </div>  <br /><br />  
        <label id="desc" for="Desc">Description:</label><br /><br /><br />{!! Form::textarea('content', null, ['class' => 'form-control', 'name' => 'form_control_content']) !!}<br />
       	{!! Form::submit('Create Subject', ['class' => 'btn-sub','name' => 'btn_sub']) !!}
{!! Form::close() !!}
</div>
</div>
</div>
@stop