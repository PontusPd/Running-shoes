@extends('Runningshoes.layouts.default')
@section('Runningshoes/content')
<div class="align-page">
	<div class="center">
		@foreach ($getProducts as $getProduct)
			<div class="getProduct-info">			
				<div id="align-img"><a href="#"><img src="{{ $getProduct->product_image }}" /></a></div>		
				<div class="prod-info">
					<p>{{ $getProduct->products_name }}	</p>
					<p>{{ $getProduct->Products_price }} $	</p>
					<hr>
					<p>{{ $getProduct->products_label }}</p>
<hr>
					<center>
					@if ($getProduct->products_antal > 0)
						<p>Tillgängligt I Lager: {{$getProduct->products_antal}}</p>
							
						{!! Form::open(array('method' => 'POST', 'url' => 'Shoppingcart/addCart')) !!}
						    {!! Form::hidden('prodId', $getProduct->products_id,['class' => 'btn-hidden','name' => 'btn_hidden_id']) !!}
						    {!! Form::submit('Add To Cart', ['class' => 'btn-login','name' => 'btn-login']) !!}
						{!! Form::close() !!}

					@else 
						<p>This product isn't available</p>
					@endif
					</center>
				</div>
				<div class="desc-info">
					<p>Product description</p><hr />
					<p>{{ $getProduct->products_info }}</p>
				</div>
				<center>
					<br />
					<div class="customers-review"><p class="align-text-left">Customer Reviews</p></div> <hr />
					<p>Be the first to write a rewiew for this product</p>
					<p><button>Write a Review</button></p>
				</center>
			</div>
		@endforeach
	</div>
</div>
@stop