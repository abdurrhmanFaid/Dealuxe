@extends('layouts.app')
@section('content')
    <!-- Hero Section Start -->
    <div class="hero-slider section">
        <!-- Hero Item Start -->
        <div class="hero-item" style="background-image: url({{asset('design')}}/images/slider/slider-bg-2.jpg)">
            <div class="container">
                <div class="row">
                    <div class="hero-content-wrap col">
                        <div class="hero-content hero-content-2 text-left">
                            <h2>BEARD OIL</h2>
                            <h1>FOR GLOSSY AND <br>STYLISH BEARD</h1>
                            <a class="btn btn-round btn-lg btn-theme" href="shop-4-column.html">SHOP NOW</a>
                        </div>
                        <div class="hero-image hero-image-2">
                            <img src="{{asset('design')}}/images/slider/slider-product-1.png" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- Hero Item End -->
        <!-- Hero Item Start -->
        <div class="hero-item" style="background-image: url({{asset('design')}}/images/slider/slider-bg-2.jpg)">
            <div class="container">
                <div class="row">

                    <div class="hero-content-wrap col">
                        <div class="hero-content hero-content-2 text-left">
                            <h2>BEARD OIL</h2>
                            <h1>FOR GLOSSY AND <br>STYLISH BEARD</h1>
                            <a class="btn btn-round btn-lg btn-theme" href="shop-4-column.html">SHOP NOW</a>
                        </div>
                        <div class="hero-image hero-image-2">
                            <img src="{{asset('design')}}/images/slider/slider-product-1.png" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- Hero Item End -->
    </div><!-- Hero Section End -->

    <!-- About Section Start -->
    <div class="about-section section position-relative fix">

        <div class="container-fluid">
            <div class="row">

                <!-- About Image Start -->
                <div class="d-flex col-xl-7 col-12 pl-0 pr-0">
                    <div class="about-image-wrap">
                        <div class="image-1" style="background-image: url({{asset('design')}}/images/about/about-2.jpg)"></div>
                        <div class="image-2" style="background-image: url({{asset('design')}}/images/about/about-3.jpg)"></div>
                    </div>
                </div><!-- About Image End -->

                <!-- About Content Start -->
                <div class="bg-dark col-xl-5 col-12 mr-auto order-2 order-md-1 pt-90 pb-90 pt-lg-80 pb-lg-80 pt-md-70 pb-md-70 pt-sm-60 pb-sm-60 pt-xs-50 pb-xs-50  pl-80 pr-80 pl-md-70 pr-md-70 pl-sm-60 pr-sm-60 pl-xs-30 pr-xs-30">

                    <!-- About Section Shape -->
                    <div class="about-shape two rellax" data-rellax-speed="3" data-rellax-percentage="0.5"><img src="{{asset('design')}}/images/shape/subscribe-shape-1.png" alt=""></div>

                    <div class="about-content about-content-light">
                        <h3>Provide the best</h3>
                        <h1>Beard Oil For You</h1>
                        <div class="desc">
                            <p>We provide the best Beard oil all over the world. We are the worldd best store for Beard Oil. You can buy our product without any hegitation because we always consus about our product quality and always maintain it properly so your can trust and this is our main goal we belive that...</p>
                            <p>Some of our customer say’s that they trust us and buy our product without any hagitation because they belive us and always happy to buy our product.</p>
                        </div>
                        <a href="about.html" class="btn btn-lg btn-round btn-theme">LEARN MORE</a>
                    </div>
                </div><!-- About Content End -->

            </div>
        </div>

    </div><!-- About Section End -->

    <!-- Product Section Start -->
    <div class="product-section section pt-90 pb-90 pt-lg-80 pb-lg-80 pt-md-70 pb-md-70 pt-sm-60 pb-sm-60 pt-xs-50 pb-xs-50">
        <div class="container">

            <!-- Section Title Start -->
            <div class="row">
                <div class="col">
                    <div class="section-title left mb-60 mb-xs-40">
                        <h1>New Arrivals</h1>
                        <p>Some of our customer say’s that they trust us and buy our product without any hagitation because they belive us and always happy to buy our product.</p>
                    </div>
                </div>
            </div><!-- Section Title End -->

            <div class="row">

                <shop-page inline-template>
                    <!-- Product Slider 4 Column Start-->
                    <div class="product-slider product-slider-4 section">
                        @foreach($products as $product)
                            <product
                                    inline-template
                                    v-cloak
                                    :product="{{$product}}"
                                    to-cart-route="{{route('cart.store')}}"
                                    remove-from-cart-route="{{route('cart.remove')}}"
                                    to-wishlist-route="{{route('wishlist.store')}}"
                                    remove-from-wishlist-route="{{route('wishlist.remove')}}"
                            >
                                <!-- Product Item Start -->
                                <div class="col">
                                    <div class="product-item">
                                        <!-- Image -->
                                        <div class="product-image">
                                            <!-- Image -->
                                            <a href="product-details-variable.html" class="image"><img src="{{asset('design/images/product/product-1.jpg')}}" alt=""></a>
                                        @if(auth()->user() && auth()->user()->hasVerifiedEmail())
                                            <!-- Product Action -->
                                                <div class="product-action">
                                                    <a @click.prevent="storeUpdate('cart')" :class="inCart ? 'btn btn-primary' : 'btn btn-default'">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <a @click.prevent="storeUpdate('wishlist')" :class="inWishlist ? 'btn btn-danger' : 'btn btn-default'">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="quickview"><span></span></a>
                                                </div>
                                            @endauth
                                        </div>
                                        <!-- Content -->
                                        <div class="product-content">
                                            <div class="head">
                                                <!-- Title-->
                                                <div class="top">
                                                    <h4 class="title"><a href="{{route('shop.show', $product->slug)}}">{{$product->name}}</a></h4>
                                                </div>
                                                <!-- Price & Ratting -->
                                                <div class="bottom">
                                                    <span class="price">{{presentPrice($product->price)}} <span class="old">$65</span></span>
                                                    <span class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                                                </div>
                                            </div>
                                            <div class="body">
                                                <!-- Product Action -->
                                                <div class="product-action">
                                                    <a @click.prevent="toCart()" class="cart"><span></span></a>
                                                    <a href="#" class="wishlist"><span></span></a>
                                                    <a href="#" class="quickview"><span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Item End -->
                            </product>
                        @endforeach

                    </div><!-- Product Slider 4 Column Start-->
                </shop-page>

            </div>

        </div>
    </div><!-- Product Section End -->

    <!-- Banner Section Start -->
    <div class="banner-section section pb-90 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="banner"><a href="#"><img src="{{asset('design')}}/images/banner/banner-2.jpg" alt=""></a></div>
                </div>
            </div>

        </div>
    </div><!-- Banner Section End -->

    <!-- Subscribe Section Start -->
    <div class="subscribe-section section position-relative pt-70 pb-70 pt-md-60 pb-md-60 pt-sm-50 pb-sm-50 pt-xs-50 pb-xs-50 fix">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12">
                    <div class="subscribe-wrap">
                        <h3>Special <span>Offers</span> for Subscription</h3>
                        <h1>GET INSTANT DISCOUNT FOR MEMBERSHIP</h1>
                        <p>Subscribe our newsletter and get all latest news abot our latest <br> products, promotions, offers and discount</p>

                        <form id="mc-form" class="mc-form subscribe-form" >
                            <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your email here" />
                            <button id="mc-submit">submit</button>
                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div><!-- mailchimp-alerts end -->
                    </div>
                </div>

            </div>
        </div>
    </div><!-- Subscribe Section End -->

    <!-- Product Section Start -->
    <div class="product-section section pt-90 pb-60 pt-lg-80 pb-lg-50 pt-md-70 pb-md-40 pt-sm-60 pb-sm-30 pt-xs-50 pb-xs-20">
        <div class="container">

            <!-- Section Title Start -->
            <div class="row">
                <div class="col">
                    <div class="section-title left mb-60 mb-xs-40">
                        <h1>Popular Products</h1>
                        <p>Some of our customer say’s that they trust us and buy our product without any hagitation because they belive us and always happy to buy our product.</p>
                    </div>
                </div>
            </div><!-- Section Title End -->

            <div class="row">

                <!-- Product Item Start -->
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb-30">
                    <div class="product-item">
                        <!-- Image -->
                        <div class="product-image">
                            <!-- Image -->
                            <a href="product-details-variable.html" class="image"><img src="{{asset('design')}}/images/product/product-5.jpg" alt=""></a>
                            <!-- Product Action -->
                            <div class="product-action">
                                <a href="#" class="cart"><span></span></a>
                                <a href="#" class="wishlist"><span></span></a>
                                <a href="#" class="quickview"><span></span></a>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="product-content">
                            <div class="head">
                                <!-- Title -->
                                <div class="top">
                                    <h4 class="title"><a href="#">Moisturizing Oil</a></h4>
                                </div>
                                <!-- Price & Ratting -->
                                <div class="bottom">
                                    <span class="price">$45 <span class="old">$75</span></span>
                                    <span class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Product Item End -->

                <!-- Product Item Start -->
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb-30">
                    <div class="product-item">
                        <!-- Image -->
                        <div class="product-image">
                            <!-- Image -->
                            <a href="product-details-variable.html" class="image"><img src="{{asset('design')}}/images/product/product-6.jpg" alt=""></a>
                            <!-- Product Action -->
                            <div class="product-action">
                                <a href="#" class="cart"><span></span></a>
                                <a href="#" class="wishlist"><span></span></a>
                                <a href="#" class="quickview"><span></span></a>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="product-content">
                            <div class="head">
                                <!-- Title -->
                                <div class="top">
                                    <h4 class="title"><a href="#">Katopeno Altuni</a></h4>
                                </div>
                                <!-- Price & Ratting -->
                                <div class="bottom">
                                    <span class="price">$100 <span class="old">$125</span></span>
                                    <span class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Product Item End -->

                <!-- Product Item Start -->
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb-30">
                    <div class="product-item">
                        <!-- Image -->
                        <div class="product-image">
                            <!-- Image -->
                            <a href="product-details-variable.html" class="image"><img src="{{asset('design')}}/images/product/product-7.jpg" alt=""></a>
                            <!-- Product Action -->
                            <div class="product-action">
                                <a href="#" class="cart"><span></span></a>
                                <a href="#" class="wishlist"><span></span></a>
                                <a href="#" class="quickview"><span></span></a>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="product-content">
                            <div class="head">
                                <!-- Title -->
                                <div class="top">
                                    <h4 class="title"><a href="#">Murikhete Paris</a></h4>
                                </div>
                                <!-- Price & Ratting -->
                                <div class="bottom">
                                    <span class="price">$99 <span class="old">$165</span></span>
                                    <span class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Product Item End -->

                <!-- Product Item Start -->
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb-30">
                    <div class="product-item">
                        <!-- Image -->
                        <div class="product-image">
                            <!-- Image -->
                            <a href="product-details-variable.html" class="image"><img src="{{asset('design')}}/images/product/product-8.jpg" alt=""></a>
                            <!-- Product Action -->
                            <div class="product-action">
                                <a href="#" class="cart"><span></span></a>
                                <a href="#" class="wishlist"><span></span></a>
                                <a href="#" class="quickview"><span></span></a>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="product-content">
                            <div class="head">
                                <!-- Title -->
                                <div class="top">
                                    <h4 class="title"><a href="#">Vortahole Valohoi</a></h4>
                                </div>
                                <!-- Price & Ratting -->
                                <div class="bottom">
                                    <span class="price">$92 <span class="old">$110</span></span>
                                    <span class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Product Item End -->

                <!-- Product Item Start -->
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb-30">
                    <div class="product-item">
                        <!-- Image -->
                        <div class="product-image">
                            <!-- Image -->
                            <a href="product-details-variable.html" class="image"><img src="{{asset('design')}}/images/product/product-9.jpg" alt=""></a>
                            <!-- Product Action -->
                            <div class="product-action">
                                <a href="#" class="cart"><span></span></a>
                                <a href="#" class="wishlist"><span></span></a>
                                <a href="#" class="quickview"><span></span></a>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="product-content">
                            <div class="head">
                                <!-- Title -->
                                <div class="top">
                                    <h4 class="title"><a href="#">Egentry Etumeni</a></h4>
                                </div>
                                <!-- Price & Ratting -->
                                <div class="bottom">
                                    <span class="price">$39 <span class="old">$70</span></span>
                                    <span class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Product Item End -->

                <!-- Product Item Start -->
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb-30">
                    <div class="product-item">
                        <!-- Image -->
                        <div class="product-image">
                            <!-- Image -->
                            <a href="product-details-variable.html" class="image"><img src="{{asset('design')}}/images/product/product-10.jpg" alt=""></a>
                            <!-- Product Action -->
                            <div class="product-action">
                                <a href="#" class="cart"><span></span></a>
                                <a href="#" class="wishlist"><span></span></a>
                                <a href="#" class="quickview"><span></span></a>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="product-content">
                            <div class="head">
                                <!-- Title -->
                                <div class="top">
                                    <h4 class="title"><a href="#">Origeno Veledita</a></h4>
                                </div>
                                <!-- Price & Ratting -->
                                <div class="bottom">
                                    <span class="price">$110 <span class="old">$139</span></span>
                                    <span class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Product Item End -->

                <!-- Product Item Start -->
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb-30">
                    <div class="product-item">
                        <!-- Image -->
                        <div class="product-image">
                            <!-- Image -->
                            <a href="product-details-variable.html" class="image"><img src="{{asset('design')}}/images/product/product-11.jpg" alt=""></a>
                            <!-- Product Action -->
                            <div class="product-action">
                                <a href="#" class="cart"><span></span></a>
                                <a href="#" class="wishlist"><span></span></a>
                                <a href="#" class="quickview"><span></span></a>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="product-content">
                            <div class="head">
                                <!-- Title -->
                                <div class="top">
                                    <h4 class="title"><a href="#">Baizidale Momone</a></h4>
                                </div>
                                <!-- Price & Ratting -->
                                <div class="bottom">
                                    <span class="price">$78 <span class="old">$99</span></span>
                                    <span class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Product Item End -->

                <!-- Product Item Start -->
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb-30">
                    <div class="product-item">
                        <!-- Image -->
                        <div class="product-image">
                            <!-- Image -->
                            <a href="product-details-variable.html" class="image"><img src="{{asset('design')}}/images/product/product-12.jpg" alt=""></a>
                            <!-- Product Action -->
                            <div class="product-action">
                                <a href="#" class="cart"><span></span></a>
                                <a href="#" class="wishlist"><span></span></a>
                                <a href="#" class="quickview"><span></span></a>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="product-content">
                            <div class="head">
                                <!-- Title -->
                                <div class="top">
                                    <h4 class="title"><a href="#">Buffekete Chai</a></h4>
                                </div>
                                <!-- Price & Ratting -->
                                <div class="bottom">
                                    <span class="price">$82 <span class="old">$105</span></span>
                                    <span class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Product Item End -->

            </div>

        </div>
    </div><!-- Product Section End -->

    <!-- Blog Section Start -->
    <div class="blog-section section pb-90 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row row-3">

                <div class="col-lg-4 col-12 mb-5">
                    <div class="blog-section-title">
                        <h1>Latest Blog Post</h1>
                        <p>Some of our customer say’s that they trust us and buy our product without any gitation because they can belive us</p>
                    </div>
                </div>

                <div class="col-lg-8 col-12 mb-5">
                    <div class="blog-slider">
                        <div class="home-blog">
                            <a class="image" href="blog-details.html" style="background-image: url({{asset('design')}}/images/blog/home-blog-1.jpg)">image</a>
                            <div class="content">
                                <h3 class="title"><a href="blog-details.html">New Brand Beard Oil</a></h3>
                                <ul class="blog-meta">
                                    <li>By - <a href="#">Adam</a></li>
                                    <li>10 August, 2018</li>
                                </ul>
                                <p>Some of our customer say’s that they trust us and buy our product without any gitation because they can belive us and always</p>
                                <a href="blog-details.html" class="read-more">read more...</a>
                            </div>
                        </div>
                        <div class="home-blog">
                            <a class="image" href="blog-details.html" style="background-image: url({{asset('design')}}/images/blog/home-blog-2.jpg)">image</a>
                            <div class="content">
                                <h3 class="title"><a href="blog-details.html">Oil for Beard Growing</a></h3>
                                <ul class="blog-meta">
                                    <li>By - <a href="#">Adam</a></li>
                                    <li>10 August, 2018</li>
                                </ul>
                                <p>Some of our customer say’s that they trust us and buy our product without any gitation because they can belive us and always</p>
                                <a href="blog-details.html" class="read-more">read more...</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- Blog Section End -->
@endsection