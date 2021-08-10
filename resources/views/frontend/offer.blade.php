@extends('layouts.frontendtemplate')
@section('content')
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Offers</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
		<h2>Top selling offers</h2>
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Advertised offers</a></li>
						<li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">Today Offers</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							<div class="agile_top_brands_grids">
								@foreach($items as $item)
								<div class="col-md-4 top_brand_left" style="margin-bottom: 20px;">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="{{route('detailpage',$item->id)}}"><img title=" " alt=" " src="{{'storage/'.$item->photo}}" style="height: 100px;" /></a>		
															<p>{{$item->name}}</p>
															<div class="stars">
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star gray-star" aria-hidden="true"></i>
															</div>
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
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
																	<input type="hidden" name="amount" value="20.99" />
																	<input type="hidden" name="discount_amount" value="1.00" />
																	<input type="hidden" name="currency_code" value="USD" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" name="cancel_return" value=" " />
																	<input type="submit" name="submit" value="Add to cart" class="button add-to-cart" />
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
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
							<div class="agile_top_brands_grids">
								@foreach($items as $item)
								<div class="col-md-4 top_brand_left" style="margin-bottom: 20px;">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="{{route('detailpage',$item->id)}}"><img title=" " alt=" " src="{{'storage/'.$item->photo}}" style="height: 100px;" /></a>		
															<p>{{$item->name}}</p>
															<div class="stars">
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star gray-star" aria-hidden="true"></i>
															</div>
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
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
																	<input type="hidden" name="amount" value="20.99" />
																	<input type="hidden" name="discount_amount" value="1.00" />
																	<input type="hidden" name="currency_code" value="USD" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" name="cancel_return" value=" " />
																	<input type="submit" name="submit" value="Add to cart" class="button add-to-cart" />
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //top-brands -->
@endsection