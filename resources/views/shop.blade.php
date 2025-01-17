@extends('tamplate')
@section('content')
<!-- Product -->

<section class="bg0 p-t-23 p-b-130">
	<div class="container">
		<div class="p-b-10">
			<h3 class="ltext-103 cl5">
				Product Overview
			</h3>
		</div>

		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
					All Products
				</button>

			</div>

			<div class="flex-w flex-c-m m-tb-10">
				<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
					<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
					<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Filter
				</div>

				<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
					<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
					<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Search
				</div>
			</div>

			<!-- Search product -->
			<div class="dis-none panel-search w-full p-t-10 p-b-15">
				<div class="bor8 dis-flex p-l-15">
					<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>

					<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
				</div>
			</div>

			<!-- Filter -->
			<div class="dis-none panel-filter w-full p-t-10">
				<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
					<div class="filter-col1 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Sort By
						</div>

						<ul>
							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									Default
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									Popularity
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									Average rating
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
									Newness
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									Price: Low to High
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									Price: High to Low
								</a>
							</li>
						</ul>
					</div>

					<div class="filter-col2 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Price
						</div>

						<ul>
							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
									All
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									$0.00 - $50.00
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									$50.00 - $100.00
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									$100.00 - $150.00
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									$150.00 - $200.00
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									$200.00+
								</a>
							</li>
						</ul>
					</div>

					<div class="filter-col3 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Color
						</div>

						<ul>
							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #222;">
									<i class="zmdi zmdi-circle"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04">
									Black
								</a>
							</li>

							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
									<i class="zmdi zmdi-circle"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
									Blue
								</a>
							</li>

							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
									<i class="zmdi zmdi-circle"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04">
									Grey
								</a>
							</li>

							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
									<i class="zmdi zmdi-circle"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04">
									Green
								</a>
							</li>

							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
									<i class="zmdi zmdi-circle"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04">
									Red
								</a>
							</li>

							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
									<i class="zmdi zmdi-circle-o"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04">
									White
								</a>
							</li>
						</ul>
					</div>

					<div class="filter-col4 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Tags
						</div>

						<div class="flex-w p-t-4 m-r--5">
							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Fashion
							</a>

							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Lifestyle
							</a>

							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Denim
							</a>

							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Streetstyle
							</a>

							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Crafts
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row isotope-grid">
			@forelse ($products as $product)
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
				<!-- Block2 -->
				<!-- Show img from database -->

				<div class="block2">
					<div class="block2-pic hov-img0 label-new" data-label="New">
						<img src="{{ asset('images/' . $product->photo) }}" alt="IMG-PRODUCT">
						<a href="#"
							class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 quick-view-btn"
							data-id="{{ $product->id }}">
							Quick View
						</a>

					</div>
					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								{{ $product->name }}
							</a>

							<span class="stext-105 cl3">
								${{ $product->price}}
							</span>
						</div>

						<div class="block2-txt-child2 flex-r p-t-3">
							<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
								<img class="icon-heart1 dis-block trans-04" src="{{asset('website/images/icons/icon-heart-01.png')}}" alt="ICON">
								<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('website/images/icons/icon-heart-02.png')}}" alt="ICON">
							</a>
						</div>
					</div>
				</div>
			</div>
			@empty
			<p>No products found.</p>
			@endforelse



		</div>
		<!-- Modal1 -->
		<div class="wrap-modal1 js-modal1 p-t-60 p-b-20" id="quickViewModal" style="display: none;">
    <div class="overlay-modal1 js-hide-modal1" style="background-color: rgba(0, 0, 0, 0.7); position: fixed; top: 0; left: 0; width: 100%; height: 100%;"></div>
    <div class="container">
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent" style="background: #fff; border-radius: 10px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3); max-width: 700px; margin: auto; position: relative;">
            <!-- Close Button -->
            <button class="how-pos3 hov3 trans-04 js-hide-modal1" style="position: absolute; top: 15px; right: 15px; background: transparent; border: none; cursor: pointer;">
                <img src="{{ asset('website/images/icons/icon-close.png') }}" alt="CLOSE" style="width: 20px; height: 20px;">
            </button>

            <!-- Modal Content -->
            <div id="modal-content" style="padding: 20px;">
                <!-- Dynamic content will be loaded here -->
                <h2 style="font-size: 1.5rem; margin-bottom: 20px; text-align: center; color: #333;">Quick View</h2>
                <p style="text-align: center; color: #666;">Loading content, please wait...</p>
            </div>

            <!-- Footer Area (Optional for actions) -->
            <div class="modal-footer" style="padding: 20px; border-top: 1px solid #ddd; text-align: center;">
                <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer js-hide-modal1" style="background-color: #333; color: #fff; border-radius: 5px; padding: 10px 20px; font-size: 1rem;">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

		<!-- Pagination -->
		<div class="flex-c-m flex-w w-full p-t-38">
			<a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
				1
			</a>

			<a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
				2
			</a>
		</div>
	</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const quickViewButtons = document.querySelectorAll(".quick-view-btn");
    const modalContent = document.getElementById("modal-content");
    const quickViewModal = document.getElementById("quickViewModal");
    const closeModalButton = document.querySelector(".js-hide-modal1");

    quickViewButtons.forEach(button => {
        button.addEventListener("click", async function (e) {
            e.preventDefault();
            const productId = this.getAttribute("data-id");

            console.log("Product ID:", productId);

            try {
                // Fetch product data
                const response = await fetch(`/product/${productId}`);
                console.log("API Response:", response);

                if (!response.ok) {
                    throw new Error(`Error: ${response.status} ${response.statusText}`);
                }

                const product = await response.json();
                console.log("Product Data:", product);

                if (!product || Object.keys(product).length === 0) {
                    alert("Product details not found.");
                    return;
                }

                // Populate modal with product details
                modalContent.innerHTML = `<div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content p-4 rounded-3 shadow">
        <div class="row g-3 align-items-center">
            <div class="col-md-6 text-center">
                <img src="/images/${product.photo}" alt="${product.name}" 
                     class="rounded-3 shadow-sm img-fluid" 
                     style="max-width: 100%; height: auto;">
            </div>
            <div class="col-md-6">
                <h4 class="fw-bold text-dark mb-3">${product.name}</h4>
                <h5 class="text-success fw-bold mb-3">
                    <span>$${product.price}</span>
                </h5>
                <p class="text-muted small mb-4">
                    ${product.description || "No description available for this product."}
                </p>
                <div class="d-flex flex-column gap-2">
                    <!-- Add to Cart Button with corrected styles -->
                    <button class="btn btn-primary text-white shadow-sm w-100 py-2 add-to-cart-btn" 
                            style="background-color: #007bff; border: none; display: flex; align-items: center; justify-content: center; gap: 10px;">
                        <!-- Icon -->
                        <i class="fa fa-shopping-cart" style="font-size: 18px;"></i>
                        <!-- Text -->
                        <span style="font-size: 16px;">Add to Cart</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
`;

                // Show modal
                quickViewModal.style.display = "block";

                // Add event listener for the Add to Cart button
               const addToCartButton = document.querySelector(".add-to-cart-btn");
if (addToCartButton) {
    addToCartButton.addEventListener("click", function () {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        const productData = {
            id: product.id,
            name: product.name,
            price: product.price,
            photo: product.photo,
            quantity: 1
        };

        const existingProduct = cart.find(item => item.id === product.id);
        if (existingProduct) {
            existingProduct.quantity += 1;
        } else {
            cart.push(productData);
        }

        localStorage.setItem("cart", JSON.stringify(cart));

        // Using SweetAlert instead of the default alert
        Swal.fire({
            icon: 'success',
            title: `${product.name} has been added to the cart!`,
            text: `You have successfully added ${product.name} to your shopping cart.`,
            showConfirmButton: true,
            confirmButtonText: 'Go to Cart',
            confirmButtonColor: '#3085d6',
            cancelButtonText: 'Continue Shopping',
            showCancelButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = './feature'; // Redirect to the cart page if user clicks "Go to Cart"
            }
        });

        quickViewModal.style.display = "none";
    });
}

            } catch (error) {
                console.error("Fetch error:", error);
                alert("Failed to load product details. Please try again.");
            }
        });
    });

    // Close modal
    if (closeModalButton) {
        closeModalButton.addEventListener("click", function () {
            quickViewModal.style.display = "none";
        });
    }

    // Close modal on outside click
    document.addEventListener("click", function (event) {
        if (event.target === quickViewModal) {
            quickViewModal.style.display = "none";
        }
    });
});

</script>

@endsection

@section('title')
Shop
@endsection