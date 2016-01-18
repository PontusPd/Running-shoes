<!DOCTYPE html>
@extends('Runningshoes/layouts.default')
@section('Runningshoes/content')
<div class="display-inline">
<div id="slideshow">
@foreach ($Slides as $Slide)
	<div class="slides">
		<h3>{{ $Slide->name }}</h3>
		<img class="Slide" src="{{ $Slide->image }}" />
	</div>
@endforeach
</div>
<div id="clipp"><br /> <br />
<iframe src="http://www.w3schools.com"></iframe><br><br>
<iframe src="http://www.w3schools.com"></iframe>
</div><br /> <br />

<div id="info">	
	<h2>Info About the site</h2>
	<p>There are many variations of passages of Lorem Ipsum available, 
	but the majority have suffered alteration in some form, by injected 
	humour, or randomised words which don't look even slightly believable. 
	If you are going to use a passage of Lorem Ipsum, you need to be sure 
	there isn't anything embarrassing hidden in the middle of text. All 
	the Lorem Ipsum generators on the Internet tend to repeat predefined 
	chunks as necessary, making this the first true generator on the Internet. 
	It uses a dictionary of over 200 Latin words, combined with a handful of 
	model sentence structures, to generate Lorem Ipsum which looks reasonable. 
	The generated Lorem Ipsum is therefore always free from repetition, injected humour, 
	or non-characteristic words etc.</p>
</div>
<center>
<div id="Random-product">	
	<div class="make-left">
		@foreach ($getRandomProducts as $getRProduct)
			<div class="align-products">
			    <h3>{{ $getRProduct->product_title }}</h3>
			    <img src="{{ $getRProduct->product_image }}" height="100px" width="100px" name="{{ $getRProduct->products_name }}" /><br />
			    <a href="#">{{ $getRProduct->product_desc }}</a><br />
			    <p>{{ $getRProduct->Products_price }} kr</p>
				
				{!! Form::open(array('method' => 'POST', 'url' => 'Shoppingcart/addCart')) !!}
				    {!! Form::hidden('prodId', $getRProduct->products_id,['class' => 'btn-hidden','name' => 'btn_hidden_id']) !!}
				    {!! Form::submit('Add To Cart', ['class' => 'btn-login','name' => 'btn-login']) !!}
				{!! Form::close() !!}
			    
			</div>  
		@endforeach
	</div>
</div>		
</center>
<br /> <br /> <br />
</div>
@stop

