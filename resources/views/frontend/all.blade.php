@extends('layouts.frontendtemplate')
@section('content')
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">All Items</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!--- groceries --->
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories">
					<h2>Categories</h2>
					<ul class="cate">
						@foreach($subcategories as $subcategory)
						<li><a href="{{route('allpage',$subcategory->id)}}"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{$subcategory->name}}</a></li>
						@endforeach
					</ul>
				</div>																																												
			</div>
			<div class="col-md-8 products-right">
				<div class="agile_top_brands_grids">
					@foreach($navitem as $item)
					<div class="col-md-4 top_brand_left" style="margin-bottom: 10px;">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">								
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="{{route('detailpage',$item->id)}}">
													<img src="{{asset('storage/'.$item->photo)}}" style="height: 100px;">
												</a>	
												<p style="height: 100px;">{{$item->name}}</p>
												<h4 class="stars"><i class="fa fa-star blue-star" aria-hidden="true"></i> {{$item['rate']}}/10 </h4>
												
													@php
									                  if($item->discount){
									                @endphp
									                	<h4>{{$item->discount}} Ks <span>{{$item->price}} Ks</span></h4>
									                @php
									                  } else {
									                @endphp
									                  <h4>{{$item->price}} Ks </h4>
									                @php
									                  }
									                @endphp
											</div>
											{{-- <div class="snipcart-details top_brand_home_details">
												<form action="#" method="post">
													<fieldset>
														<input type="hidden" name="cmd" value="_cart">
														<input type="hidden" name="add" value="1">
														<input type="hidden" name="business" value=" ">
														<input type="hidden" name="item_name" value="Fortune Sunflower Oil">
														<input type="hidden" name="amount" value="35.99">
														<input type="hidden" name="discount_amount" value="1.00">
														<input type="hidden" name="currency_code" value="USD">
														<input type="hidden" name="return" value=" ">
														<input type="hidden" name="cancel_return" value=" ">
														<input type="submit" name="submit" value="Add to cart" class="button">
													</fieldset>
												</form>
											</div> --}}
											<div class="snipcart-details top_brand_home_details"><a href="{{route('cartpage')}}">
												<input type="submit" name="submit" value="Add to cart" class="button add-to-cart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-photo="{{'storage/'.$item->photo}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}" data-code="{{$item->codeno}}" /></a>

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
				{{-- <nav class="numbering">
					<ul class="pagination paging">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li>
							<a href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
				</nav> --}}
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!--- groceries --->
@endsection
@section('script')
	<script type="text/javascript" src="{{asset('frontend_assets/js/custom.js')}}"></script>
@endsection