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

					<button 
    class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" 
    id="proceed_btn">
    Proceed to Checkout
</button>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let cart_row = document.getElementById('cart_row');
    let cartItems = JSON.parse(localStorage.getItem('cart')) || [];

    // Clear existing rows
    cart_row.innerHTML = "";

    if (cartItems.length > 0) {
        // Populate table rows if cart has items
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
                                   value="${item.quantity}" 
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
            cart_row.innerHTML += rowHTML;
        });
    } else {
        // Show a message if the cart is empty
        cart_row.innerHTML = `<tr><td colspan="5" class="text-center">Your cart is empty.</td></tr>`;
    }

    // Handle Proceed to Checkout Button
    document.getElementById('proceed_btn').addEventListener('click', function (e) {
        e.preventDefault(); // Prevent default action

        const cart = JSON.parse(localStorage.getItem('cart'));

        if (!cart || cart.length === 0) {
            // Show SweetAlert error if cart is empty
            Swal.fire({
                icon: 'error',
                title: 'Cart is Empty',
                text: 'You cannot proceed to checkout without adding items to the cart.',
            });
        } else {
            // Proceed to checkout
            window.location.href = "{{route('chekout-login')}}";
        }
    });

    // Update Subtotal and Total
    const subTotal = document.getElementById("sub_total");
    const totalAllItems = document.getElementById("total_all_items");
    let totalPrice = cartItems.reduce((sum, item) => sum + item.price * item.quantity, 0);

    subTotal.textContent = `$ ${totalPrice.toFixed(2)}`;
    totalAllItems.textContent = `$ ${totalPrice.toFixed(2)}`;

    // Save total price to localStorage
    localStorage.setItem("total_amount", totalPrice.toFixed(2));

    // Update Cart Button Functionality
    document.getElementById("update_cart").addEventListener("click", function () {
        let updatedTotalPrice = cartItems.reduce((sum, item) => sum + item.price * item.quantity, 0);
        localStorage.setItem("total_amount", updatedTotalPrice.toFixed(2));
        location.reload();
    });
</script>



@endsection
@section('title')
Feature
@endsection