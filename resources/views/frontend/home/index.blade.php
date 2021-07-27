@extends('frontend.layouts.app')

@section('content')
    <section class="slide1">
        <div class="wrap-slick1">
            <div class="slick1">
                @foreach ($banner as $keyBanner => $valBanner)
                <div class="item-slick1 item3-slick1" style="background-image: url({{ url('/'.$valBanner->image.'') }});">
                    {{-- <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
                            Women Collection 2018
                        </span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                            New arrivals
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
                            <!-- Button -->
                            <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Shop Now
                            </a>
                        </div>
                    </div> --}}
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="banner bgwhite p-t-40 p-b-40">
        <div class="container">
            <div class="row">
                @foreach ($category as $keyCategory => $valCategory)
                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="{{ url($valCategory->image) }}" alt="IMG-BENNER">
                        <div class="block1-wrapbtn w-size2">
                            <a href="{{ url('/'.$valCategory->slug.'') }}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                {{ $valCategory->name }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="newproduct bgwhite p-t-45 p-b-105">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    Featured Products
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    @foreach ($product as $keyProduct => $valProduct)
                    <div class="item-slick2 p-l-15 p-r-15">
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                <img src="{{ asset($valProduct->thumbnail) }}" alt="IMG-PRODUCT">
                                <div class="block2-overlay trans-0-4">
                                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                    </a>
                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" onclick="handleWishlist({{json_encode($valProduct)}})">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="block2-txt p-t-20">
                                <a href="{{ url('/product/'.$valProduct->slug.'') }}" class="block2-name dis-block s-text3 p-b-5">
                                    {{ $valProduct->name }}
                                </a>
                                <span class="block2-price m-text6 p-r-5">
                                    Rp. {{ number_format($valProduct->price, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <section class="shipping bgwhite p-t-62 p-b-46">
        <div class="flex-w p-l-15 p-r-15">
            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Free Delivery Worldwide
                </h4>

                <a href="#" class="s-text11 t-center">
                    Click here for more info
                </a>
            </div>
            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
                <h4 class="m-text12 t-center">
                    30 Days Return
                </h4>
                <span class="s-text11 t-center">
                    Simply return it within 30 days for an exchange.
                </span>
            </div>
            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Store Opening
                </h4>
                <span class="s-text11 t-center">
                    Shop open from Monday to Sunday
                </span>
            </div>
        </div>
    </section>
@stop
@section('javascript')

@endsection