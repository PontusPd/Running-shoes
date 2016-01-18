@extends('Runningshoes.layouts.default')
@section('Runningshoes/content')
<div id="product_page">
<div class="header-banner">
	<img src="http://img.runningwarehouse.com/ban/MRSADIDAS.jpg">
</div>
<div id="page-header">
<p>Product page</p>
<br><hr><br>
</div>
<div class="info-prodcutpage">
<p>{{ $getipsumText }}</p>
</div>
<div id="productpage">
	<div class="center">		
		<br>
		<table>
			<tr><label class="sort-first" for="sort-by">Sort By:</label></tr>
			<tr><label for="price"><a class="sort-by" href="http://localhost/sites/Running-shoes/public/Products-Price">Price</a></label></tr>
			<tr><label for="name"><a class="sort-by" href="http://localhost/sites/Running-shoes/public/Products-products_name">Name</a></label></tr>
			<tr><label for="sort-4"><a class="sort-by" href="http://localhost/sites/Running-shoes/public/Products-Neutral">Neutral</a></label></tr>
			<tr><label for="sort-5"><a class="sort-last" href="http://localhost/sites/Running-shoes/public/Products-Support">Support</a></label></tr>
		</table>
		@foreach ($brands as $brand)
			<div class="getProduct-info-p">			
				<a href="http://localhost/sites/Running-shoes/public/Products/{{ $brand->products_id }}"><img src="{{ $brand->product_image }}" /></a><br>		
				<center>
					<p>{{ $brand->products_name }}	</p>
					<p>{{ $brand->Products_price }} $	</p>
					{!! Form::open(array('method' => 'POST', 'url' => 'http://localhost/sites/Running-shoes/public/Shoppingcart/addCart')) !!}
					    {!! Form::hidden('prodId', $brand->products_id,['class' => 'btn-hidden','name' => 'btn_hidden_id']) !!}
					    {!! Form::submit('Add To Cart', ['class' => 'btn-login','name' => 'btn-login']) !!}
					{!! Form::close() !!}
				</center>
			</div>
		@endforeach
		<br><br><hr><br><br>
		</div>
		</div>
		</div>
@stop