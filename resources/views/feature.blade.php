@extends('tamplate')
@section('content')

<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Shoping Cart
		</span>
	</div>
</div>


<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<thead>
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>
							</thead>
							<tbody id="cart_row">
								<!-- Rows will be dynamically added here -->
							</tbody>
						</table>

					</div>

					<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" id="update_cart">
							Update Cart
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Cart Totals
					</h4>

					<div class="flex-w flex-t bor12 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Subtotal:
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2" id="sub_total">
								$ 00.00
							</span>
						</div>
					</div>

					<div class="flex-w flex-t bor12 p-t-15 p-b-30">
						<div class="size-208 w-full-ssm">
							<span class="stext-110 cl2">
								Shipping:
							</span>
						</div>

						<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
							<p class="stext-111 cl6 p-t-2">
								There are no shipping methods available. Please double check your address, or contact us if you need any help.
							</p>
						</div>
					</div>
					<div class="flex-w flex-t p-t-27 p-b-33">
						<div class="size-208">
							<span class="mtext-101 cl2">
								Total:
							</span>
						</div>

						<div class="size-209 p-t-1">
							<span class="mtext-110 cl2"  id="total_all_items">
								$ 00.00
							</span>
						</div>
					</div>

					<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
						<a href="{{route('chekout-login')}}">Proceed to Checkout</a>
					</button>
				</div>
			</div>
		</div>
	</div>
</form>

<script>
	let cart_row = document.getElementById('cart_row');
	let cartItems = JSON.parse(localStorage.getItem('cart'));

	cart_row.innerHTML = "";

	if (cartItems && cartItems.length > 0) {
		cartItems.forEach(item => {
			const rowHTML = `
        <tr class="table_row" data-id="${item.id}">
            <td class="column-1">
                <div class="how-itemcart1">
                    <img src="/images/${item.photo}" alt="IMG">
                </div>
            </td>
            <td class="column-2">${item.name}</td>
            <td class="column-3">$ ${item.price}</td>
            <td class="column-4">
                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" data-id="${item.id}">
                        <i class="fs-16 zmdi zmdi-minus"></i>
                    </div>

                    <input class="mtext-104 cl3 txt-center num-product" 
                           type="number" 
                           name="num-product" 
                           value="1" 
                           data-id="${item.id}" 
                           readonly>

                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" data-id="${item.id}">
                        <i class="fs-16 zmdi zmdi-plus"></i>
                    </div>
                </div>
            </td>
            <td class="column-5 total-price">$ ${(item.price * item.quantity).toFixed(2)}</td>
        </tr>
        `;

			// Append the HTML to the table
			cart_row.innerHTML += rowHTML;
		});
	} else {
		// Show a message if the cart is empty
		cart_row.innerHTML = `<tr><td colspan="5" class="text-center">Your cart is empty.</td></tr>`;
	}

	// Add event listeners for the quantity buttons using event delegation
	cart_row.addEventListener("click", function(e) {
		const button = e.target.closest(".btn-num-product-down, .btn-num-product-up");
		if (!button) return;

		const row = button.closest("tr");
		const input = row.querySelector(".num-product");
		const productId = input.dataset.id;
		const priceCell = row.querySelector(".column-3");
		const totalCell = row.querySelector(".total-price");

		let quantity = parseInt(input.value);
		const price = parseFloat(priceCell.textContent.replace("$", ""));

		// Determine if incrementing or decrementing
		// if (button.classList.contains("btn-num-product-down") && quantity > 1) {
		//     quantity--;
		// } else if (button.classList.contains("btn-num-product-up")) {
		//     quantity++;
		// }

		// Update input value
		input.value = quantity;

		// Update the total price for this row
		totalCell.textContent = `$ ${(price * quantity).toFixed(2)}`;

		// Update the cart in localStorage
		updateCart(productId, quantity);
	});

	// Function to update the cart in localStorage
	function updateCart(productId, newQuantity) {
		let cart = JSON.parse(localStorage.getItem("cart")) || [];
		const productIndex = cart.findIndex(item => item.id === parseInt(productId));
		if (productIndex !== -1) {
			cart[productIndex].quantity = newQuantity;
			localStorage.setItem("cart", JSON.stringify(cart));
		}
	}

	// Sub Total Amount And All Items	Total Amount 

	let subTotal = document.getElementById("sub_total");
	let totalAllItems = document.getElementById("total_all_items");
	let totalPrice = 0;
	cartItems.forEach(item => {
    totalPrice += item.price * item.quantity;
  });
	subTotal.textContent = `$ ${totalPrice.toFixed(2)}`;
	totalAllItems.textContent = `$ ${totalPrice.toFixed(2)}`;
	// Update total in localStorage
	localStorage.setItem("total_amount", totalPrice.toFixed(2));

	// When user click update cart button then update total in localStorage and update total in localStorage
	document.getElementById("update_cart").addEventListener("click", function() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let totalPrice = 0;
    cart.forEach(item => {
      totalPrice += item.price * item.quantity;
    });
    localStorage.setItem("total_amount", totalPrice.toFixed(2));
	location.reload();

  });


</script>


@endsection
@section('title')
Feature
@endsection