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
    		var mycartjson=localStorage.getItem("mycart");
			if (mycartjson){
			var mycartarray=JSON.parse(mycartjson);
			var count=0;
			var total=0;
			$.each(mycartarray,function(i,v){
						var unitprice = v.price;
						var discount = v.discount;
						var qty = v.qty;
						if (discount) {
							var price = discount;
						}else{
							var price = unitprice;
						}
						var amount=qty*price;

						count += qty ++;
						total += amount ++;})
	
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

    if (mycartjson) {
      mycartarray = JSON.parse(mycartjson);

      $.each(mycartarray,function(i,v){
        var unitprice = v.price;
			var discount = v.discount;
			if (discount) {
				var price = discount;
			}else{
				var price = unitprice;
			}
			total += (v.qty*price);
        html+= `<tr class="rem1">
        				<td class="invert">
							<div class="rem">
						 	<div class="close1" data-key="${i}"></div>
							</div>
							
						</td>
						<td class="invert">${j++}</td>
						<td class="invert-image"><img src="${v.photo}" style="width: 130px; height: 90px;" alt="photo" class="img-responsive" /></td>
						<td class="invert">${v.name}</td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus" data-key="${i}">&nbsp;</div>
									<div class="entry value"><span>${v.qty}</span></div>
									<div class="entry value-plus active" data-key="${i}">&nbsp;</div>
								</div>
							</div>
						</td>

						`
						
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
						<td class="invert">${(v.qty*price)}</td>


					</tr>
					`;
      })

      // html += `<tr>
      //           <td colspan="6"><h4>Total :</h4> </td>
      //           <td>${total}</td>
      //         </tr>`;

      $('.checkout').attr('data-total',total);

    }else{
      $('.checkout').addClass('disabled');
      html = `<tr>
                <td colspan="7">Empty Cart!</td>
              </tr>`;
    }

    

    amount= total++;
    //var mycartarray = JSON.parse(mycartjson);
    if (mycartjson) {
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
				<li>${item.name} <i>-</i> <span>${(item.qty*price)}Ks </span></li>`
    
  }

  ul+=`<ul>
						<li><strong>Total <i>-</i> <span>${amount} Ks</span></strong></li>
						</ul>`;
					}
	else{
      ul+= `<ul><li>Empty Cart! </li>
			</ul>`;
    }
  $('#product').html(ul);
  $('#tbody').html(html);

  //remove process
  $('.close1').click(function(){
				var key=$(this).data('key');
				var mycartjson=localStorage.getItem('mycart');
				if (mycartjson){
					var mycartarray=JSON.parse(mycartjson);

					$.each(mycartarray,function(i,v){
						if (key==i){
							
							
								mycartarray.splice(key,1);
							}
						}
					)

					var cartData=JSON.stringify(mycartarray);
					localStorage.setItem('mycart', cartData);
						getData();
						count();
				}
			})

  	//minus quantity
  	$('.value-minus').click(function(){
				var key=$(this).data('key');
				var mycartjson=localStorage.getItem('mycart');
				if (mycartjson){
					var mycartarray=JSON.parse(mycartjson);

					$.each(mycartarray,function(i,v){
						if (key==i){
							v.qty--;
							if (v.qty==0){
							mycartarray.splice(key,1);
							}
						}
					})

					var cartData=JSON.stringify(mycartarray);
					localStorage.setItem('mycart', cartData);
						getData();
						count();
				}
			})


  	//plus quantity
  	$('.value-plus').click(function(){
				var key=$(this).data('key');
				var mycartjson=localStorage.getItem('mycart');
				if (mycartjson){
					var mycartarray=JSON.parse(mycartjson);
					$.each(mycartarray,function(i,v){
						if (key==i){
							v.qty++;
						}
						var cartData=JSON.stringify(mycartarray);
						localStorage.setItem('mycart', cartData);
						getData();
						count();
					})
				}
			})


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
    //console.log(mycartjson);
    $.post("order-management/order",{data:mycartjson,total:total},function(res){
      console.log(res);
      // remove ls
       localStorage.clear();

      getData();

      // use sweetalert
    Swal.fire({
  	icon: 'success',
  	title: 'Congratulation!',
  	text: 'Your Order is Complete.',
  	footer: '<a href="">Your Order will be delivered in 3 days.</a>'
	})

	$('.count').html(0);
	$('.cartTotal').html(0+'Ks');

    })
  })
})





				