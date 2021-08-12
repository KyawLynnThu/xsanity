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
				<h4><i class="fa fa-star blue-star" aria-hidden="true"></i> {{$item->rate}}/10 </h4>
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
					</div><br>

					<hr>
					<div>
						<h4 style="margin-bottom: 15px;">Customer Reviews [{{$comments->count()}} Comments]</h4>
						@foreach($comments as $comment)
						<h5 class="card-title" style="margin-bottom: 15px;"><i class="fa fa-user"></i> {{$comment->user->name}}</h5>
						  	<div class="card text-white bg-success mb-3" >
							  <div class="card-body">
							    <textarea readonly="" class="card-text form-control">{{$comment->name}}</textarea>
							  </div>
							</div><br>
						  @endforeach
						<button class="btn btn-default search" type="button" data-toggle="collapse" data-target="#commentId" aria-expanded="false" aria-controls="collapseExample" style="color: white; border-color: #EC7063; margin-bottom: 10px; padding: 10px;">
						    <i class="fa fa-comments-o"></i> WRITE A REVIEW
						  </button>
						
						<div class="collapse" id="commentId">
						  <form action="{{route('commentcreate',$item->id)}}" method="POST">
						  	@csrf
						  	<textarea name="comment" class="form-control" placeholder="Write your comment here." style="margin-bottom: 10px;" required></textarea><br>
						  	@if (Auth::check())
	
							<button type="submit" class="btn btn-default search" style="color: white;" aria-label="Left Align">
								Submit Review
							</button>
							@else
							<button type="submit" class="btn btn-default search" style="color: white;" aria-label="Left Align">
							
							<a href="{{ route('login') }}" style="color: white;" >{{ __('Submit Review') }} </a></button>
							@endif
						  </form>
						</div>
					</div>				
					
				</div>
				</div>
				<div class="clearfix"></div>
				{{-- @include('frontend.comment'); --}}
			</div><br><br>
			{{-- <div class="col-md-12" style="margin-top: 20px;">
				<h2 style="text-align: left;">Customer Reviews</h2>
				<div class="w3agile_description col-md-12">
					<p class="col-md-12">After 120 days of development and commissioning, the Infinix Team launched Power Marathon Tech. There are two modes for this Tech: "Power Boost" and "Ultra Power Mode", which meet the users' demand for battery life on the premise of not affecting user experience.</p>
				</div>

				<h4>Write Review</h4><br>
				  <form action="{{route('add_rate')}}" method="post">
				  	<div id="rateYo"></div>
 
  
				  <div class="form-group">
				    <label for="exampleFormControlInput1">Email address</label>
				    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
				  </div>
				  <h4 style="margin-top: 10px;">Rating</h4>
					<div class="rating1" style="margin-top: 10px;">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div><br>
				  <div class="form-group">
				    <h4><label for="exampleFormControlTextarea1">Write a Review</label></h4>
				    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>			
			</div> --}}
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
												<p style="height: 50px;">{{$related['name']}}</p>
												{{-- <div class="stars">
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star gray-star" aria-hidden="true"></i>
												</div> --}}
												<h4 class="stars"><i class="fa fa-star blue-star" aria-hidden="true"></i> {{$related['rate']}}/10 </h4>
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