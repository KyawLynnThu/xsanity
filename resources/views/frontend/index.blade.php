@extends('layouts.frontendtemplate')
@section('content')
			
<!-- //navigation -->
	<!-- main-slider -->
		<ul id="demo1">
			<li>
				<img src="{{asset('frontend_assets/images/banner1.jpg')}}" alt="" />
				<!--Slider Description example-->
				<div class="slide-desc">
					<h3>Great Services, Great Values </h3>
				</div>
			</li>
			<li>
				<img src="{{asset('frontend_assets/images/banner3.jpg')}}" alt="" />
				<div class="slide-desc">
					<h3>Find Collections of Movies, Series, Music At One Place</h3>
				</div>
			</li>
			<li>
				<img src="{{asset('frontend_assets/images/banner2.jpg')}}" alt="" />
				  <div class="slide-desc">
					<h3>Great Services, Great Values </h3>
				</div>
			</li>
		</ul>
	<!-- //main-slider -->
	<!-- //top-header and slider -->
	<!-- new -->
	<div class="newproducts-w3agile">
		<div class="container">
			<h3>New offers</h3><br>
				<div class="row">
					@foreach($offeritems as $item)
					<div class="col-xl-3 col-md-3 col-lg-3" style="margin-bottom: 20px;">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand">
									<img src="{{asset('frontend_assets/images/offer.png')}}" alt=" " class="img-responsive">
								</div>
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="{{route('detailpage',$item->id)}}"><img title=" " alt=" " src="{{'storage/'.$item->photo}}" style="height: 100px;"></a>		
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
						
				</div>
		</div>
	</div>
<!-- //new -->
 <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
         <a href=""> <img class="first-slide" src="frontend_assets/images/b1.jpg" alt="First slide"></a>
       
        </div>
        <div class="item">
         <a href=""> <img class="second-slide " src="frontend_assets/images/b4.jpg" alt="Second slide"></a>
         
        </div>
        <div class="item">
          <a href=""><img class="third-slide " src="frontend_assets/images/b2.png" alt="Third slide"></a>
          
        </div>
      </div>
    
    </div><!-- /.carousel -->	
<!--banner-bottom-->
				<div class="ban-bottom-w3l">
					<div class="container">
					<div class="col-md-6 ban-bottom3">
							<div class="ban-top">
								<img src="frontend_assets/images/promo2.jpg" class="img-responsive" alt=""/>
							</div>
							<div class="ban-img">
								<div class=" ban-bottom1">
									<div class="ban-top">
										<img src="frontend_assets/images/promo1.jpg" class="img-responsive" alt=""/>
									</div>
								</div>
								<div class="ban-bottom2">
									<div class="ban-top">
										<img src="frontend_assets/images/promo.jpg" class="img-responsive" alt=""/>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="col-md-6 ban-bottom">
							<div class="ban-top">
								<img src="frontend_assets/images/promo3.jpg" class="img-responsive" alt=""/>
							</div>
							<div class="ban-img">
								<div class=" ban-bottom1">
									<div class="ban-top">
										<img src="frontend_assets/images/promo4.jpg" class="img-responsive" alt=""/>
									</div>
								</div>
								<div class="ban-bottom2">
									<div class="ban-top">
										<img src="frontend_assets/images/promo5.jpg" class="img-responsive" alt=""/>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						
						<div class="clearfix"></div>
					</div>
				</div>
		</div>
	</div>
<!-- //new -->
@endsection
@section('script')
	<script type="text/javascript" src="{{asset('frontend_assets/js/custom.js')}}"></script>
@endsection