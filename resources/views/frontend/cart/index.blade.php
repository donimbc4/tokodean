@extends('frontend.layouts.app')
@section('content')
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(https://cdn.shopify.com/s/files/1/2672/5778/t/2/assets/cart_top.jpg?v=10773971990938369030);">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>
	<form method="POST">
		@csrf
		<section class="cart bgwhite p-t-70 p-b-100">
			<div class="container">
				<div class="container-table-cart pos-relative">
					<div class="wrap-table-shopping-cart bgwhite">
						<table class="table-shopping-cart">
							<thead>
								<tr class="table-head">
									<th class="column-1"></th>
									<th class="column-2">Product</th>
									<th class="column-3">Price</th>
									<th class="column-4 p-l-70">Quantity</th>
									<th class="column-5">Total</th>
								</tr>
							</thead>
							<tbody class="table-carts">
								{{-- javascript --}}
							</tbody>
						</table>
					</div>
				</div>
				<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
					<div class="flex-w flex-m w-full-sm">
						<div class="size11 bo4 m-r-10">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
						</div>
						<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Apply coupon
							</button>
						</div>
					</div>
					<div class="size10 trans-0-4 m-t-10 m-b-10">
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Update Cart
						</button>
					</div>
				</div>
				<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
					<h5 class="m-text20 p-b-24">
						Cart Totals
					</h5>
					<div class="flex-w flex-sb-m p-b-12">
						<span class="s-text18 w-size19 w-full-sm">
							Subtotal:
						</span>
						<span class="m-text21 w-size20 w-full-sm subtotal">
							
						</span>
					</div>
					<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
						<span class="s-text18 w-size19 w-full-sm">
							Shipping:
						</span>
						<div class="w-size20 w-full-sm">
							<p class="s-text8 p-b-23">
								There are no shipping methods available. Please double check your address, or contact us if you need any help.
							</p>
							<span class="s-text19">
								Calculate Shipping
							</span>
							<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
								<select class="selection-2 form-control" name="country">
									<option>Select a country...</option>
									<option>US</option>
									<option>UK</option>
									<option>Japan</option>
								</select>
							</div>
							<div class="size13 bo4 m-b-12">
								<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="state" placeholder="State /  country">
							</div>
							<div class="size13 bo4 m-b-22">
								<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="Postcode / Zip">
							</div>
							<div class="size14 trans-0-4 m-b-10">
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									Update Totals
								</button>
							</div>
						</div>
					</div>
					<div class="flex-w flex-sb-m p-t-26 p-b-30">
						<span class="m-text22 w-size19 w-full-sm">
							Total:
						</span>
						<span class="m-text21 w-size20 w-full-sm subtotal">
							
						</span>
					</div>
					<div class="size15 trans-0-4">
						<button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Proceed to Checkout
						</button>
					</div>
				</div>
			</div>
		</section>
	</form>
@stop
@section('javascript')
    <script>
        (() => {
            setTimeout(() => {
                handleTableCart();
            }, 10);
        })()

        handleTableCart = () => {
            const arrayWo = localStorage.getItem('cartList') === null ? [] : JSON.parse(localStorage.getItem('cartList'));
			let totalPrice = 0;
            arrayWo.forEach((data, i) => {
				totalPrice = parseInt(totalPrice) + parseInt(data.totalPrice)
                $('.table-carts').append(`
                    <tr class="table-row">
                        <td class="column-1">
                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                <img src="{{ asset('${data.thumbnail}') }}" alt="IMG-PRODUCT">
                            </div>
                        </td>
                        <td class="column-2">
							<input text="readonly" hidden value="${data.id}" name="product[]" />
							${data.name}
						</td>
                        <td class="column-3">
							${data.price}
						</td>
                        <td class="column-4">
                            <div class="flex-w bo5 of-hidden w-size17">
                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>
                                <input class="size8 m-text18 t-center num-product" type="number" name="qty[]" value="${data.qty}">
                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </td>
                        <td class="column-5">${data.totalPrice}</td>
                    </tr>
                `)
			})

			$(`.subtotal`).html(totalPrice)
        }
    </script>
@endsection