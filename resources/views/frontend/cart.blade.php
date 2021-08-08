@extends('layouts.frontendtemplate')
@section('content')

<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Checkout Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- checkout -->
	
		<div class="container">
			<h2>Your shopping cart contains: <span> Products</span></h2>
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>Remove</th>
							<th>No.</th>	
							<th>Product</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Total</th>
							
						</tr>
					</thead>
					<tbody id="tbody">
					{{-- <tr class="rem1">

						<td class="invert"></td>
						<td class="invert-image"><a href="single.html"><img src="images/1.png" alt=" " class="img-responsive" /></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus">&nbsp;</div>
									<div class="entry value"><span>1</span></div>
									<div class="entry value-plus active">&nbsp;</div>
								</div>
							</div>
						</td>
						<td class="invert"></td>
						
						<td class="invert">$290.00</td>
						<td class="invert">
							<div class="rem">
								<div class="close1"> </div>
							</div>
							<script>$(document).ready(function(c) {
								$('.close1').on('click', function(c){
									$('.rem1').fadeOut('slow', function(c){
										$('.rem1').remove();
									});
									});	  
								});
						   </script>
						</td>
					</tr> --}}
					</tbody>
					<tfoot>
					<tr >
						<td colspan="7" align="right">
						<button type="submit" class="btn btn-default search checkout" aria-label="Left Align">
					Checkout
						</button>
						</td>
					</tr>
					</tfoot>
				</table>
			</div>
			
			<div class="checkout-left">	
				<div class="checkout-left-basket">
					<h4>Order List</h4>
					<div id="product">
					{{-- <ul>
						<li>Product1 <i>-</i> <span>$15.00 </span></li>
						<li>Product2 <i>-</i> <span>$25.00 </span></li>
						<li>Product3 <i>-</i> <span>$29.00 </span></li>
						<li>Total Service Charges <i>-</i> <span>$15.00</span></li>
						<li>Total <i>-</i> <span>$84.00</span></li>
					</ul> --}}
				</div>
				<div class="checkout-right-basket">
					<a href="single.html"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		
	</div>
<!-- //checkout -->
@endsection

@section('script')
<script type="text/javascript" src="{{asset('frontend_assets/js/custom.js')}}"></script>
@endsection


{{-- <script>$(document).ready(function(c) {
	$('.close1').on('click', function(c){
		$('.rem1').fadeOut('slow', function(c){
			$('.rem1').remove();
		});
		});	  
	});
</script> --}}