<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Toko dean jual kebaya dan pakaian murah">
	<meta name="author" content="Agus Suandi">
	<meta name="keywords" content="Toko dean jual kebaya dan pakaian murah">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{ asset('assets/backend/img/icons/icon-48x48.png') }}" />
	<title>Toko Dean</title>
	<link href="{{ asset('assets/backend/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/backend/css/notiflix.css') }}" rel="stylesheet">
</head>
<body>
	<div class="wrapper">
		@include('backend.layouts.sidebar')
		<div class="main">
            @include('backend.layouts.header')
			<main class="content">
				<div class="container-fluid p-0">
					@include('backend.layouts.message-flash')
                    @yield('content')
				</div>
            </main>
            @include('backend.layouts.footer')
		</div>
	</div>
    <script src="{{ asset('assets/backend/js/app.js') }}"></script>
	<script src="{{ asset('assets/backend/js/notiflix.js') }}"></script>
	<script>
		sendRequest = async (method, url, data) => {
			const request = await fetch(url, {
				method: method,
				headers: {
					'Accept': 'application/json',
					'Content-Type': 'application/json',
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
				},
				body: JSON.stringify(data)
			});
			const dataResp = await request.json()
			return dataResp
		}

		showLoading = (message) => {
			Notiflix.Loading.Init({
				className: 'notiflix-loading',
				zindex: 4000,
				backgroundColor: 'rgba(0,0,0,0.8)',
				rtl: false,
				useGoogleFont: true,
				fontFamily: 'Quicksand',
				cssAnimation: true,
				cssAnimationDuration: 400,
				clickToClose: false,
				customSvgUrl: null,
				svgSize: '80px',
				svgColor: '#00b462',
				messageID: 'NotiflixLoadingMessage',
				messageFontSize: '15px',
				messageMaxLength: 34,
				messageColor: '#dcdcdc',
			});
			Notiflix.Loading.Hourglass(message);
		}

		hideLoading = () => {
			setTimeout(() => {
				Notiflix.Loading.Remove();
			}, 500);
		}

		appendSelectOption = (id, data) => {
			const attributeSelect = document.getElementById(id)
			attributeSelect.innerText = null
			attributeSelect.innerHTML = data.length >= 1 ? `<option value="" disabled selected>-- Pilih Kartu --</option>` : `<option value="" disabled selected>-- Data Kartu Kosong --</option>`
			data.forEach((item) => {
				const option = document.createElement(`option`)
				option.value = item.id
				option.text = item.code
				attributeSelect.add(option)
			})
		}

		showMessage = (type, message) => {
			if (type === 'success') {
				Notiflix.Notify.Success(message)
			}
			else if (type === 'failed') {
				Notiflix.Notify.Failure(message)
			}
		}
	</script>
    @yield('javascript')
</body>
</html>