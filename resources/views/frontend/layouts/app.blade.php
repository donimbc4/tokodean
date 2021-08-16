<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Toko dean jual kebaya dan pakaian murah">
	<meta name="author" content="Agus Suandi">
	<meta name="keywords" content="Toko dean jual kebaya dan pakaian murah">
	<link rel="icon" type="image/png" href="{{ asset('assets/frontend/images/icons/favicon.png') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/fonts/themify/themify-icons.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/fonts/elegant-font/html-css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/vendor/animate/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/vendor/animsition/css/animsition.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/vendor/select2/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/vendor/daterangepicker/daterangepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/vendor/slick/slick.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/vendor/lightbox2/css/lightbox.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/main.css') }}">
</head>
<body class="animsition">
	<header class="header1">
		@include('frontend.layouts.desktop-header')
		@include('frontend.layouts.mobile-header')
        @include('frontend.layouts.mobile-side-menu')
	</header>
	@yield('content')
	@include('frontend.layouts.footer')
	<script type="text/javascript" src="{{ asset('assets/frontend/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/frontend/vendor/animsition/js/animsition.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/frontend/vendor/bootstrap/js/popper.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/frontend/vendor/select2/select2.min.js') }}"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
	<script type="text/javascript" src="{{ asset('assets/frontend/vendor/slick/slick.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/frontend/js/slick-custom.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/frontend/vendor/countdowntime/countdowntime.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/frontend/vendor/lightbox2/js/lightbox.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/frontend/vendor/sweetalert/sweetalert.min.js') }}"></script>
	<script type="text/javascript">
		(() => {
			setTimeout(() => {
				getQtyChart();
			}, 10);
		})()

		getQtyChart = () => {
			const arrayWo = localStorage.getItem('cartList') === null ? [] : JSON.parse(localStorage.getItem('cartList'));
			document.getElementById('cart-desktop').innerText = arrayWo.length;
			document.getElementById('cart-mobile').innerHTML = arrayWo.length;

			let chartHtml = "";
			let totalPrice = 0;
			arrayWo.forEach((data, i) => {
				chartHtml += `
				<ul class="header-cart-wrapitem">
					<li class="header-cart-item">
						<div class="header-cart-item-img">
							<img src="{{ asset('${data.thumbnail}') }}" alt="IMG">
						</div>
						<div class="header-cart-item-txt">
							<a href="#" class="header-cart-item-name">
								${data.name}
							</a>
							<span class="header-cart-item-info">
								${data.qty} x ${data.price}
							</span>
						</div>
					</li>
				</ul>
				`
				totalPrice = parseInt(totalPrice) + parseInt(data.totalPrice);
			});

			if (arrayWo.length > 0) {
				chartHtml += `
					<div class="header-cart-total">
						Total: ${totalPrice}
					</div>
					<div class="header-cart-buttons">
						<div class="header-cart-wrapbtn">
							<a href="{{ url('/cart') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								View Cart
							</a>
						</div>
						<div class="header-cart-wrapbtn">
							<a href="{{ url('/checkout') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								Check Out
							</a>
						</div>
					</div>
				`
			}
			else {
				chartHtml += `
				<ul class="header-cart-wrapitem">
					<li>
						<p class="text-center cart-empty">Your shopping cart is empty!</p>
					</li>
				</ul>
				`
			}

			$('.cart-list').html(`${chartHtml}`)
		}

		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});

		handleWishlist = (obj) => {
			const arrayWo = localStorage.getItem('cartList') === null ? [] : JSON.parse(localStorage.getItem('cartList'))
			if (arrayWo.length === 0) {
				obj.qty = 1;
				obj.totalPrice = obj.price
				localStorage.setItem('cartList', JSON.stringify([...arrayWo, obj]))
			}
			else {
				arrayWo.forEach((data, i) => {
					if (data.id == obj.id) {
						obj.qty = data.qty + 1;
						obj.totalPrice = parseInt(obj.price) + parseInt(data.totalPrice);
						arrayWo.splice(i, 1);
						localStorage.setItem('cartList', JSON.stringify([...arrayWo, obj]))
					}
					else {
						obj.qty = 1;
						obj.totalPrice = obj.price;
						localStorage.setItem('cartList', JSON.stringify([...arrayWo, obj]))
					}
				})
			}
			getQtyChart();
		}
	</script>
	<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
	@yield('javascript')
</body>
</html>