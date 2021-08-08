@extends('layouts.frontendtemplate')
@section('content')

<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Details</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
	<div class="products">
		<div class="container">
			<div class="agileinfo_single">
				
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="{{asset('storage/'.$item->photo)}}" alt="" style="width: 300px; height: 300px;">
				</div>
				<div class="col-md-8 agileinfo_single_right">
				<h2>{{$item->name}}</h2>
				<h4>Quality: {{$item->rate}}/10⭐</h4><br>
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1" checked="">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p>{{$item->description}}</p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							@php
								if($item->discount){
							@endphp
								<h4 class="m-sing">MMK {{$item->discount}}  <span>MMK {{$item->price}} </span></h4>
							@php
								} else {
							@endphp
								<h4 class="m-sing">MMK{{$item->price}}  </h4>
							@php
								}
							@endphp
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
							<a href="{{route('cartpage')}}">
												<input type="submit" name="submit" value="Add to cart" class="button add-to-cart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-photo="{{'storage/'.$item->photo}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}" data-code="{{$item->codeno}}" /></a>

										
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- new -->
	<div class="newproducts-w3agile">
		<div class="container">
			<h3>You May Also Like</h3>
				<div class="agile_top_brands_grids">
					@foreach($related_item as $related)
					<div class="col-md-3 top_brand_left-1">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="{{route('detailpage',$related['id'])}}">
													<img title=" " alt=" " src="{{asset('storage/'.$related['photo'])}}" style="width: 200px;height: 200px;"></a>		
												<p>{{$related['name']}}</p>
												<div class="stars">
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star gray-star" aria-hidden="true"></i>
												</div>
													@php
									                  if($item['discount']){
									                @endphp
									                	<h4>{{$item['discount']}} Ks <span>{{$item['price']}} Ks</span></h4>
									                @php
									                  } else {
									                @endphp
									                  <h4>{{$item['price']}} Ks </h4>
									                @php
									                  }
									                @endphp
											</div>
										</div>
									</figure>
								</div>
							</div>
						</div>
					</div>
					@endforeach
						<div class="clearfix"> </div>
				</div>
		</div>
	</div>
<!-- //new -->
@endsection
@section('script')
<script type="text/javascript" src="{{asset('frontend_assets/js/custom.js')}}"></script>
@endsection