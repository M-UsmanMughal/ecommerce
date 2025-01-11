@extends('tamplate')
@section('content')

<!-- Shoping Cart -->
<form action="{{route('admin.order.store')}}" method="post" class="bg0 p-t-75 p-b-85 from-control" >
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50 p-3 border">
                <div class="form-group ">
                  <label for="name">Enter Your Name</label>
                  <input type="text" class="form-control rounded-left" name="name" placeholder="Enter Your Name" >
                </div>
                <div class="form-group">
                  <label for="phone">Enter Your Phone</label>
                  <input type="number" class="form-control rounded-left" name="phone" placeholder="Enter Your Phone" >
                </div>
                <div class="form-group">
                  <label for="address">Enter Your Address</label>
                  <input type="text" class="form-control rounded-left" name="address" placeholder="Enter Your Address" >
                </div>
                <div class="form-group">
                  <label for="payment">Enter Your Payment Method</label>
                 <select  class="form-group form-control"  name="payment_method" id="">
                   <option value="">Select Payment Method</option>
                   <option value="cod">Cash On Delivery</option>
                   <option value="jazzCash">Jazz Cash</option>
                   <option value="paypal">PayPal</option>
                   <option value="stripe">Credit Card</option>
                 </select>
                </div>
                <div class="form-group">
                  <button type="submit" class="form-control btn btn-primary rounded submit px-3">Order Now</button>
                </div>
                </div>
                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                  <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                      Items
                    </h4>
                      {{-- Fech data form localhost and display --}}
                      <div id="item-display"></div>
                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <span class="mtext-110 cl2 "  id="total_all_items">
                          Total $ 0.00.00
                        </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>

<script>
  // Fetch data from local storage and update the total price
  let totalAllItems = document.getElementById('total_all_items');
  let itemDisplay = document.getElementById('item-display');

  let items = JSON.parse(localStorage.getItem('cart'));
  let totalAmount = JSON.parse(localStorage.getItem('total_amount'));
  
  
  totalAllItems.innerText = 'Total : $'+ totalAmount + ".00";

 itemDisplay.innerHTML = '';
 let contentHtml = '';
  items.forEach(item =>{
    contentHtml += `
    <div class="item-row">
      <img src="/images/${item.photo}" alt="IMG" class="item-image">
      <p class="item-name">${item.name}</p>
      <p class="item-price">$${item.price}</p>
      <p class="item-quantity">${item.quantity}</p>
    </div>
    <hr>

  `;
  itemDisplay.innerHTML = contentHtml;
   
  } )

  
</script>

@endsection

@section('title')
Chekout
@endsection