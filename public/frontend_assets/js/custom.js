// Custom JS
$(document).ready(function(){
  // Insert into LS
  $('.add-to-cart').click(function(){
    // id, name, photo, price, qty
    var id = $(this).data('id');
    var name = $(this).data('name');
    var photo = $(this).data('photo');
    var price = $(this).data('price');
    var discount = $(this).data('discount');

    var item = {id:id,name:name,photo:photo,price:price,discount:discount,qty:1};

    var mycartjson = localStorage.getItem('mycart');
    if (!mycartjson) {
      mycartarray = new Array();
    }else{
      mycartarray = JSON.parse(mycartjson);
    }
    // condition
    var status=false;
				$.each(mycartarray,function(i,v){
					if (id==v.id){
						v.qty++;
						status=true;
					}
				})
				if (status==false){
					mycartarray.push(item);
				}

    localStorage.setItem('mycart',JSON.stringify(mycartarray));
  })

  // Retrieve For Cart Page
  count();
  getData();

  function count(argument) {
    var mycartjson = localStorage.getItem('mycart');
			if (mycartjson){
			var mycartarray=JSON.parse(mycartjson);
			var count=0;
			var total=0;
			for(item of mycartarray){
						var unitprice = item.price;
						var discount = item.discount;
						var qty = item.qty;
						if (discount) {
							var price = discount;
						}else{
							var price = unitprice;
						}
						var amount=item.qty*item.price;

						count += qty ++;
						total += amount ++;}
	
					$('.count').html(count);
					$('.cartTotal').html(total+'Ks');
				}
				else{
					$('.count').html(0);
					$('.cartTotal').html(0+'Ks');
				}
			}

  function getData(argument) {
    var mycartjson = localStorage.getItem('mycart');
    var html="";
    var ul="";
    var j=1;
    var total = 0;
    var delivery = 1500;

    if (mycartjson) {
      mycartarray = JSON.parse(mycartjson);

      for(item of mycartarray){
        // total += (item.price*item.qty);
        var unitprice = item.price;
			var discount = item.discount;
			if (discount) {
				var price = discount;
			}else{
				var price = unitprice;
			}
				total += (item.qty*price);
        html+= `<tr class="rem1">
        				<td class="invert">
							<div class="rem">
						 	<div class="close1"> </div>
							</div>
							
						</td>
						<td class="invert">${j++}</td>
						<td class="invert-image"><img src="${item.photo}" style="width: 130px; height: 90px;" alt="photo" class="img-responsive" /></td>
						<td class="invert">${item.name}</td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus">&nbsp;</div>
									<div class="entry value"><span>${item.qty}</span></div>
									<div class="entry value-plus active">&nbsp;</div>
								</div>
							</div>
						</td>`
						
						if (discount > 0) {
						html+=`<td><p class="item-price">
		                        	
		                        	<span class="d-block"> ${price}Ks</span>
		                        	
		                       </p></td>`;}
		                       else{
		                       	html+=`<td><p class="item-price">
		                        	
		                        	${unitprice}Ks
		                        	
		                        	
		                       </p></td>`;
		                       }
						html+=`
						<td class="invert">${(item.qty*price)}</td>


					</tr>
					<script>
						$('.value-plus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
							divUpd.text(newVal);
						});

						$('.value-minus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
							if(newVal>=1) divUpd.text(newVal);
						});
					</script>`;
      }

      html += `<tr>
                <td colspan="6"><h4>Total :</h4> </td>
                <td>${total}</td>
              </tr>`;
      $('.checkout').attr('data-total',total);
    }else{
      $('.checkout').addClass('disabled');
      html = `<tr>
                <td colspan="5">Empty Cart!</td>
              </tr>`;
    }

    

    amount= total+delivery;
    //var mycartarray = JSON.parse(mycartjson);

    for(item of mycartarray){
    	var unitprice = item.price;
			var discount = item.discount;
			if (discount) {
				var price = discount;
			}else{
				var price = unitprice;
			}
				total += (item.qty*price);

    ul+=`<ul>
				<li>${item.name} <i>-</i> <span>${(item.qty*price)}Ks </span></li>
						
					</ul>`
    
  }
  ul+=`<ul><li>Delivery Service Charges <i>-</i> <span>1500Ks</span></li>
						<li>Total <i>-</i> <span>${amount} Ks</span></li>
						</ul>`
  $('#product').html(ul);
  $('#tbody').html(html);
  }

  // checkout process
  $('.checkout').click(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var mycartjson = localStorage.getItem('mycart');
    var total = $(this).data('total');
    console.log(mycartjson);
    $.post("order-management/order",{data:mycartjson,total:total},function(res){
      console.log(res);
      // remove ls
       localStorage.clear();
       getData();
      // use sweetalert
    })
  })
})