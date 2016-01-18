<aside>
	<div id="aside-left">
		<div id="Categoris">
			<p class="brands-cat">Categoris</p>
			<div class="cats">
				<ul>
	  				@foreach ($cats as $cat)
						<li><a href="http://localhost/sites/Running-shoes/public/cat&{{ $cat->link }}">{{$cat->cat_title}}</a></li>
					@endforeach
				</ul>
			</div>
			<p class="brands-cat">Brands</p>
			<div class="cats">
				<ul>
	  				@foreach ($brands as $brand)
						<li><a href="http://localhost/sites/Running-shoes/public/Brand&{{ $brand->link }}">{{$brand->Brand_title}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</aside>