@extends('tamplate')
@section('content')

<!-- Shoping Cart -->
<form action="{{route('admin.order.store')}}" method="post" class="bg0 p-t-75 p-b-85 from-control" id="orderForm">
  @csrf
  <div class="container">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')
    <div class="row">
      <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50 p-3 border">
        <div class="form-group">
          <label for="name">Enter Your Name</label>
          <input type="text" class="form-control rounded-left" name="name" id="name" placeholder="Enter Your Name" />
        </div>
        <div class="form-group">
          <label for="phone">Enter Your Phone</label>
          <input type="number" class="form-control rounded-left" name="phone" id="phone" placeholder="Enter Your Phone" />
        </div>
        <div class="form-group">
          <label for="address">Enter Your Address</label>
          <input type="text" class="form-control rounded-left" name="address" id="address" placeholder="Enter Your Address" />
        </div>
        <div class="form-group">
          <label for="payment_method">Enter Your Payment Method</label>
          <select class="form-group form-control" name="payment_method" id="payment_method">
            <option value="">Select Payment Method</option>
            <option value="cod">Cash On Delivery</option>
            <option value="jazzCash">Jazz Cash</option>
            <option value="paypal">PayPal</option>
            <option value="stripe">Credit Card</option>
          </select>
        </div>
        <div class="form-group d-none">
          <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Product Name">
          <input type="text" name="total_price" class="form-control" id="total_price" placeholder="Total Price">
        </div>
        <div class="form-group">
          <button type="submit" id="ordar_btn" class="form-control btn btn-primary rounded submit px-3">Place Order Now</button>
        </div>
      </div>
      <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
          <h4 class="mtext-109 cl2 p-b-30">Items</h4>
          <div id="item-display"></div>
          <div class="flex-w flex-t p-t-27 p-b-33">
            <span class="mtext-110 cl2" id="total_all_items">Total $0.00</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  // Fetch data from local storage and update the total price
  const totalAllItems = document.getElementById('total_all_items');
  const itemDisplay = document.getElementById('item-display');
  const productNameInput = document.getElementById('product_name');
  const totalPriceInput = document.getElementById('total_price');

  const items = JSON.parse(localStorage.getItem('cart')) || [];
  const totalAmount = JSON.parse(localStorage.getItem('total_amount')) || 0;

  totalAllItems.innerText = 'Total : $' + totalAmount + ".00";

  if (items.length > 0) {
    const productIds = items.map(item => item.name).join(', ');
    productNameInput.value = productIds;
  }

  if (totalAmount) {
    totalPriceInput.value = totalAmount;
  }

  let contentHtml = '';
  items.forEach(item => {
    contentHtml += `
      <div class="item-row">
        <img src="/images/${item.photo}" alt="IMG" class="item-image">
        <p class="item-name">${item.name}</p>
        <p class="item-price">$${item.price}</p>
        <p class="item-quantity">Quantity: ${item.quantity}</p>
      </div>
      <hr>
    `;
  });

  itemDisplay.innerHTML = contentHtml;

  // Validate fields and submit the form
  document.getElementById('ordar_btn').addEventListener('click', function (e) {
    e.preventDefault();

    const name = document.getElementById('name')?.value.trim();
    const phone = document.getElementById('phone')?.value.trim();
    const address = document.getElementById('address')?.value.trim();
    const paymentMethod = document.getElementById('payment_method')?.value.trim();

    if (!name || !phone || !address || !paymentMethod) {
      Swal.fire({
        icon: 'error',
        title: 'Validation Error',
        text: 'Please fill in all required fields before submitting.',
      });
      return;
    }
Swal.fire({
      icon:'success',
      title: 'Order Placed Successfully',
      text: 'Your order has been placed successfully.',
    });
    // Clear local storage
    localStorage.clear();

    // Submit the form programmatically
    document.getElementById('orderForm').submit();
    // Reset form fields
    document.getElementById('name').value = '';
    document.getElementById('phone').value = '';
    document.getElementById('address').value = '';
    document.getElementById('payment_method').value = '';
    document.getElementById('total_all_items').innerText = 'Total : $0.00';
    document.getElementById('item-display').innerHTML = '';
    document.getElementById('product_name').value = '';
    document.getElementById('total_price').value = '';
    document.getElementById('orderForm').reset();
    
  });
</script>

@endsection

@section('title')
Checkout
@endsection
