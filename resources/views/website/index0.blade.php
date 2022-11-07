@extends('website/layouts.master')

@section('title', 'Pain Cure | Dr. Amr Saeed for back pain treatment | دكتور عمرو سعيد لعلاج الالم')

<!-- css insert -->
@section('css')

    <!-- animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="{{ URL::asset('plugins/owl/owl.carousel.min.css') }}">

    <!-- swiper slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <style>

    </style>
@endsection

<!-- content insert -->
@section('content')


    <div id="noti_land_top" class="main-color-bg text-white py-2">
        <div class="container d-flex justify-content-center text-c align-items-center">
            <h5 class="mb-0 fw-light fs-6"><i class="fas fa-tag me-2"></i>Use our promo code to get 20% discount on
                serivces <span class=" fw-bold">"MB20"<span></h5>
        </div>
    </div>

    <!-- main Slider container -->
    <div class="swiper mainSlider swiper-main-slider mb-4">

        <nav class="navbar mt-2 navbar-expand-lg navbar-dark container z-index-4 main-slider-cont-nav">
            <div class="container-fluid">
                <a class="navbar-brand  me-md-5" href="{{ route('landing') }}"> <img
                        src="{{ URL::asset('img/homepage/logo-w.png') }}" alt=""> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">

                    <div class="p-1 bg-white d-flex rounded w-100 rounded-pill me-2"
                        style="box-shadow: -1px 1rem 1rem 7px rgb(58 59 69 / 15%) !important; ">

                        <div class="select2-noborder-width-25 ms-2 align-self-center">
                            <select id="select-branch-table" class="select2-no-search select2-hidden-accessible">
                                <option value="all">
                                    All categories
                                </option>
                                <option value="all">
                                    Clothing
                                </option>
                                <option value="all">
                                    Accessories
                                </option>
                            </select>
                        </div>
                        <div class="input-group">
                            <input id="search-eng" type="search" placeholder="Search anything .."
                                aria-describedby="button-add" class="form-control border-0 bg-transparent px-4">
                            <div class="input-group-append pe-2">
                                <button id="button-addon1" type="submit" class="btn btn-link text-primary typeahead"><i
                                        class="fa fa-search text-gray-300"></i></button>
                            </div>
                        </div>
                    </div>

                    <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll fw-light text-shadow-100 align-items-center text-s"
                        style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active d-flex align-items-center" aria-current="page" href="#"><i
                                    class="bi bi-person fs-5 me-2 text-white-op-80"></i>
                                Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active d-flex align-items-center" aria-current="page" href="#"><i
                                    class="bi bi-archive fs-5 me-2 text-white-op-80"></i>
                                Requests</a>
                        </li>
                        <li class="nav-item position-relative">
                            <a class="nav-link active d-flex align-items-center" aria-current="page" href="#"><i
                                    class="bi bi-basket fs-5 me-2 text-white-op-80"></i>
                                Cart</a>
                            <span class="main-color-bg text-white rounded-circle top-s-badge-number">+3</span>
                        </li>
                        <li class="nav-item ms-2">
                            @if (!empty(Auth::guard('client')->check()))
                                <a class="dropdown-item mb-2 border-bottom-0 " href="{{ route('client.logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('client.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                                <img class="img-profile rounded-circle avatar-m" src="{{ asset('img/useravatar/'.  Auth::guard('client')->user()->avatar  ) }}" alt="">
                            @else
                                <a class="nav-link d-flex align-items-center text-center text-xs second-main-color-bg px-4 text-white rounded-pill"
                                    style="width: 127px" aria-current="page" href="#">
                                    Live Shopping </a>
                            @endif

                        </li>

                    </ul>
                </div>
            </div>

        </nav>
        <nav id="navigation1" class="navbar pb-3 justify-content-center navbar-expand-lg position-absolute navigation-landscape pt-4 " style="top:10%; z-index:4;width:100%; top:10%">
            <div class="nav-header ">
            <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-8">
                <div class="nav-toggle toggle-2 position-absolute" style="top:-2rem">
                </div>
            </div>
            </div>
        </div>
        <div class="nav-menus-wrapper justify-content-center ">
        <ul class="nav-menu ">
            <li>
            <a class="nav-link" href="#">Jewelry & Accessories</a>
            <ul class="nav-dropdown ">
                <li>
                <a  href="#">Menu Level 2</a>
                <ul class="nav-dropdown align-to-left">
                    <li><a href="#" target="_blank">Link 1</a></li>
                    <li><a href="#" target="_blank">Link 2</a></li>
                    <li><a href="#" target="_blank">Link 3</a></li>
                </ul>
                </li>
                <li>
                <a href="#">Menu Level 2</a>
                <ul class="nav-dropdown">
                    <li>
                    <a href="#">Menu Level 3</a>
                    <ul class="nav-dropdown">
                        <li><a href="#" target="_blank">Link 1</a></li>
                        <li><a href="#" target="_blank">Link 2</a></li>
                        <li><a href="#" target="_blank">Link 3</a></li>
                    </ul>
                    </li>
                    <li><a href="#" target="_blank">Link 1</a></li>
                    <li><a href="#" target="_blank">Link 2</a></li>
                    <li><a href="#" target="_blank">Link 3</a></li>

                </ul>
                </li>
                <li>
                <a href="#">Menu Level 2</a>
                <ul class="nav-dropdown">
                    <li><a href="#" target="_blank">Link 1</a></li>
                    <li><a href="#" target="_blank">Link 2</a></li>
                    <li><a href="#" target="_blank">Link 3</a></li>
                </ul>
                </li>
            </ul>
            </li>

            <li>
                <a class="nav-link" href="#">Clothing & Shose</a>
                <ul class="nav-dropdown">
                <li>
                    <a href="#">Menu Level 2</a>
                    <ul class="nav-dropdown ">
                    <li><a href="#" target="_blank">Link 1</a></li>
                    <li><a href="#" target="_blank">Link 2</a></li>
                    <li><a href="#" target="_blank">Link 3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Menu Level 2</a>
                    <ul class="nav-dropdown">
                    <li>
                        <a href="#">Menu Level 3</a>
                        <ul class="nav-dropdown">
                        <li><a href="#" target="_blank">Link 1</a></li>
                        <li><a href="#" target="_blank">Link 2</a></li>
                        <li><a href="#" target="_blank">Link 3</a></li>
                        </ul>
                    </li>
                    <li><a href="#" target="_blank">Link 1</a></li>
                    <li><a href="#" target="_blank">Link 2</a></li>
                    <li><a href="#" target="_blank">Link 3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Menu Level 2</a>
                    <ul class="nav-dropdown">
                    <li><a href="#" target="_blank">Link 1</a></li>
                    <li><a href="#" target="_blank">Link 2</a></li>
                    <li><a href="#" target="_blank">Link 3</a></li>
                    </ul>
                </li>
                </ul>
            </li>
            <li>
                <a class="nav-link" href="#">Home & Livimg</a>
                <ul class="nav-dropdown">
                    <li>
                    <a href="#">Menu Level 2</a>
                    <ul class="nav-dropdown">
                        <li><a href="#" target="_blank">Link 1</a></li>
                        <li><a href="#" target="_blank">Link 2</a></li>
                        <li><a href="#" target="_blank">Link 3</a></li>
                        <li><a href="#" target="_blank">Link 4</a></li>
                    </ul>
                    </li>
                    <li>
                    <a href="#">Menu Level 2</a>
                    <ul class="nav-dropdown">
                        <li>
                        <a href="#">Menu Level 3</a>
                        <ul class="nav-dropdown">
                            <li><a href="#" target="_blank">Link 1</a></li>
                            <li><a href="#" target="_blank">Link 2</a></li>
                            <li><a href="#" target="_blank">Link 3</a></li>
                            <li><a href="#" target="_blank">Link 4</a></li>
                            <li><a href="#" target="_blank">Link 5</a></li>
                        </ul>
                        </li>
                        <li><a href="#" target="_blank">Link 1</a></li>
                        <li><a href="#" target="_blank">Link 2</a></li>
                        <li><a href="#" target="_blank">Link 3</a></li>
                        <li><a href="#" target="_blank">Link 4</a></li>
                        <li><a href="#" target="_blank">Link 5</a></li>
                    </ul>
                    </li>
                    <li>
                    <a href="#">Menu Level 2</a>
                    <ul class="nav-dropdown">
                        <li><a href="#" target="_blank">Link 1</a></li>
                        <li><a href="#" target="_blank">Link 2</a></li>
                        <li><a href="#" target="_blank">Link 3</a></li>
                        <li><a href="#" target="_blank">Link 4</a></li>
                        <li><a href="#" target="_blank">Link 5</a></li>
                    </ul>
                    </li>
                </ul>
                </li>

                <li>
                    <a class="nav-link" href="#">Toys & Entertainment</a>
                    <ul class="nav-dropdown">
                    <li>
                        <a href="#">Menu Level 2</a>
                        <ul class="nav-dropdown">
                        <li><a href="#" target="_blank">Link 1</a></li>
                        <li><a href="#" target="_blank">Link 2</a></li>
                        <li><a href="#" target="_blank">Link 3</a></li>
                        <li><a href="#" target="_blank">Link 4</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Menu Level 2</a>
                        <ul class="nav-dropdown">
                        <li>
                            <a href="#">Menu Level 3</a>
                            <ul class="nav-dropdown">
                            <li><a href="#" target="_blank">Link 1</a></li>
                            <li><a href="#" target="_blank">Link 2</a></li>
                            <li><a href="#" target="_blank">Link 3</a></li>
                            <li><a href="#" target="_blank">Link 4</a></li>
                            <li><a href="#" target="_blank">Link 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#" target="_blank">Link 1</a></li>
                        <li><a href="#" target="_blank">Link 2</a></li>
                        <li><a href="#" target="_blank">Link 3</a></li>
                        <li><a href="#" target="_blank">Link 4</a></li>
                        <li><a href="#" target="_blank">Link 5</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Menu Level 2</a>
                        <ul class="nav-dropdown">
                        <li><a href="#" target="_blank">Link 1</a></li>
                        <li><a href="#" target="_blank">Link 2</a></li>
                        <li><a href="#" target="_blank">Link 3</a></li>
                        <li><a href="#" target="_blank">Link 4</a></li>
                        <li><a href="#" target="_blank">Link 5</a></li>
                        </ul>
                    </li>
                    </ul>
                </li>

                <li>
                    <a class="nav-link" href="#">Art & Collectibles</a>
                    <ul class="nav-dropdown">
                        <li>
                        <a href="#">Menu Level 2</a>
                        <ul class="nav-dropdown">
                            <li><a href="#" target="_blank">Link 1</a></li>
                            <li><a href="#" target="_blank">Link 2</a></li>
                            <li><a href="#" target="_blank">Link 3</a></li>
                            <li><a href="#" target="_blank">Link 4</a></li>
                        </ul>
                        </li>
                        <li>
                        <a href="#">Menu Level 2</a>
                        <ul class="nav-dropdown">
                            <li>
                            <a href="#">Menu Level 3</a>
                            <ul class="nav-dropdown">
                                <li><a href="#" target="_blank">Link 1</a></li>
                                <li><a href="#" target="_blank">Link 2</a></li>
                                <li><a href="#" target="_blank">Link 3</a></li>
                                <li><a href="#" target="_blank">Link 4</a></li>
                                <li><a href="#" target="_blank">Link 5</a></li>
                            </ul>
                            </li>
                            <li><a href="#" target="_blank">Link 1</a></li>
                            <li><a href="#" target="_blank">Link 2</a></li>
                            <li><a href="#" target="_blank">Link 3</a></li>
                            <li><a href="#" target="_blank">Link 4</a></li>
                            <li><a href="#" target="_blank">Link 5</a></li>
                        </ul>
                        </li>
                        <li>
                        <a href="#">Menu Level 2</a>
                        <ul class="nav-dropdown">
                            <li><a href="#" target="_blank">Link 1</a></li>
                            <li><a href="#" target="_blank">Link 2</a></li>
                            <li><a href="#" target="_blank">Link 3</a></li>
                            <li><a href="#" target="_blank">Link 4</a></li>
                            <li><a href="#" target="_blank">Link 5</a></li>
                        </ul>
                        </li>
                    </ul>
                    </li>

            <li>
            <a class="nav-link" href="#">All Categories</a>
            <div class="megamenu-panel">
                <div class="megamenu-lists">
                <ul class="megamenu-list list-col-4">
                    <li class="megamenu-list-title"><a href="#">Title Name</a></li>
                    <li><a href="#" target="_blank">Link 1</a></li>
                    <li><a href="#" target="_blank">Link 2</a></li>
                    <li><a href="#" target="_blank">Link 3</a></li>
                    <li><a href="#" target="_blank">Link 4</a></li>
                    <li><a href="#" target="_blank">Link 5</a></li>
                </ul>
                <ul class="megamenu-list list-col-4">
                    <li class="megamenu-list-title"><a href="#">Title Name</a></li>
                    <li><a href="#" target="_blank">Link 1</a></li>
                    <li><a href="#" target="_blank">Link 2</a></li>
                    <li><a href="#" target="_blank">Link 3</a></li>
                    <li><a href="#" target="_blank">Link 4</a></li>
                    <li><a href="#" target="_blank">Link 5</a></li>
                </ul>
                <ul class="megamenu-list list-col-4">
                    <li class="megamenu-list-title"><a href="#">Title Name</a></li>
                    <li><a href="#" target="_blank">Link 1</a></li>
                    <li><a href="#" target="_blank">Link 2</a></li>
                    <li><a href="#" target="_blank">Link 3</a></li>
                    <li><a href="#" target="_blank">Link 4</a></li>
                    <li><a href="#" target="_blank">Link 5</a></li>
                </ul>
                <ul class="megamenu-list list-col-4">
                    <li><img src="image/product.png" width="150px" height="250px" alt=""></li>
                </ul>
                </div>
            </div>
            </li>

            <!-- <li><a href="#" target="_blank">Home</a></li> -->
        </ul>
        </div>
        </nav>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
        </div>


        <div class="swiper-wrapper text-white">

            <div class="swiper-slide">
                <img class="swiper_bg" src="{{ asset('img/homepage/cover4.jpg') }}" title="cover">

                <div class="main-slider-cont-text text-capitalize z-index-4 text-start text-shadow-100">
                    <div class="hr-land bg-white  b-r-l-cont"></div>
                    <h1 class="text-xl">Walking with Nike is easier now.</h1>
                    <p class="text-white-op-80 fw-lighter">explore prodcuts you need from all famous brands and select the
                        best price till it reach your home in
                        egypt</p>
                </div>
                <a href="#" class="main-slider-cont-brand text-capitalize z-index-4 text-start text-shadow-100">
                    <div class="fs-3 fw-bold text-white">2210 <small class="text-xs">EGP</small> <span
                            class="fs-6 fw-light text-white-50 text-decoration-line-through">1040
                            EGP</span></div>
                    <h6 class="text-white-50 fw-light">Sneakers Shoes</h6>
                    <h6 class="fw-light text-s text-white-50 d-flex">From <img style="width: 75px" class="ms-2"
                            src="{{ asset('img/brands/nike-w.png') }}" title="cover">
                    </h6>
                </a>
            </div>

            <div class="swiper-slide">
                <img class="swiper_bg" src="{{ asset('img/homepage/cover2.jpg') }}" title="cover">

                <div class="main-slider-cont-text text-capitalize z-index-4 text-start text-shadow-100">
                    <div class="hr-land bg-white  b-r-l-cont"></div>
                    <h1 class="text-xl">Your brand is much closer..</h1>
                    <p class="text-white-op-80 fw-lighter">explore prodcuts you need from all famous brands and select the
                        best price till it reach your home in
                        egypt</p>
                </div>
                <a href="#" class="main-slider-cont-brand text-capitalize z-index-4 text-start text-shadow-100">
                    <div class="fs-3 fw-bold text-white">1260 <small class="text-xs">EGP</small> <span
                            class="fs-6 fw-light text-white-50 text-decoration-line-through">1040
                            EGP</span></div>
                    <h6 class="text-white-50 fw-light">Tshirt with printed image</h6>
                    <h6 class="fw-light text-s text-white-50 d-flex">From <img style="width: 75px" class="ms-2"
                            src="{{ asset('img/brands/tommy.jpg') }}" title="cover">
                    </h6>
                </a>
            </div>

            <div class="swiper-slide">
                <img class="swiper_bg" src="{{ asset('img/homepage/cover5.jpg') }}" title="cover"
                    style=" object-position: bottom left">

                <div class="main-slider-cont-text text-capitalize z-index-4 text-start text-shadow-100">
                    <div class="hr-land bg-white  b-r-l-cont"></div>
                    <h1 class="text-xl">We bring the world to you</h1>
                    <p class="text-white-op-80 fw-lighter">explore prodcuts you need from all famous brands and select the
                        best price till it reach your home in
                        egypt</p>
                </div>
                <a href="#" class="main-slider-cont-brand text-capitalize z-index-4 text-start text-shadow-100">
                    <div class="fs-3 fw-bold text-white">640 <small class="text-xs">EGP</small> <span
                            class="fs-6 fw-light text-white-50 text-decoration-line-through">1040
                            EGP</span></div>
                    <h6 class="text-white-50 fw-light">PRINTED TUNIC DRESS</h6>
                    <h6 class="fw-light text-s text-white-50 d-flex">From <img style="width: 75px" class="ms-2"
                            src="{{ asset('img/brands/zara.png') }}" title="cover">
                    </h6>
                </a>
            </div>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <section class="main-cat-hp py-2 container-fluid p-0 mb-5">
        <div class="row g-0 ps-0 ps-md-5">
            <div class="col-12 col-md-4 ps-1 ps-md-5 pt-md-3 pt-0 pb-2 pb-md-0 text-center text-md-start">
                <div class="hr-land bg-dark b-r-l-cont ms-auto me-auto ms-md-0"></div>
                <h1 class="text-xl"> Discover <br> Our <br> Catagories</h1>
            </div>
            <div class="col-12 col-md-8 ps-3 ps-md-0">
                <!-- Swiper -->
                <div class="swiper swiper-center-halfscreen">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide border-radius-20" style="width:210px; background:#333543; ">
                            <a class="full-width-height-link" href="#">
                                <h3 class="fw-light text-white text-start position-absolute"
                                    style="top: 20px;
                            left: 20px;">Shoes</h3>
                                <img class="position-absolute"
                                    style="bottom: 13px;
                            right: -14px;"
                                    src="{{ asset('img/main-cat-hp/shoes.png') }}" title="handbag">
                            </a>
                        </div>
                        <div class="swiper-slide border-radius-20" style="width:210px; background:#3F3829; ">
                            <a class="full-width-height-link" href="#">
                                <h3 class="fw-light text-white  text-start position-absolute"
                                    style="top: 20px;
                            left: 20px;">Hand <br> Bags</h3>
                                <img class="position-absolute"
                                    style="bottom: 0;
                            right: -14px;"
                                    src="{{ asset('img/main-cat-hp/handbag.png') }}" title="handbag">
                            </a>
                        </div>
                        <div class="swiper-slide border-radius-20" style="width:210px; background:#210F03; ">
                            <a class="full-width-height-link" href="#">
                                <h3 class="fw-light text-white  text-start position-absolute"
                                    style="top: 20px;
                            left: 20px;">Clothing</h3>
                                <img class="position-absolute"
                                    style="bottom: 20px;
                            right: -14px;"
                                    src="{{ asset('img/main-cat-hp/clothing.png') }}" title="clothing">
                            </a>
                        </div>
                        <div class="swiper-slide border-radius-20" style="width:210px; background:#301807; ">
                            <a class="full-width-height-link" href="#">
                                <h3 class="fw-light text-white text-start position-absolute"
                                    style="top: 20px;
                            left: 20px;">Wallet</h3>
                                <img class="position-absolute"
                                    style="bottom: 10px;
                            right: -14px;"
                                    src="{{ asset('img/main-cat-hp/wallet.png') }}" title="handbag">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="new-arrival mb-3">
        <div class="big-header text-center mb-3">
            <h1 class="text-xl fw-normal">
                New <br> Arrivals<i class="fas fa-circle main-color text-s ms-1"></i>
            </h1>
        </div>

        <div class="container">

            <div class="swiper swiper-products">

                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="product-comp">
                            <div class="product-img position-relative mb-2">
                                <div class="img-top-info w-100 position-absolute">
                                    <img class="rounded-circle shadow" style="width: 23px; height:23px;"
                                        src="{{ asset('img/countries-flags/usa.png') }}" title="product">
                                    <a href="#" class="wishlist-comp shadow"><i class="far fa-heart"></i></a>
                                </div>

                                <div class="make-offer-inproduc">
                                    <a class="main-btn-wide clickable-item-pointer link-hover main-color-bg text-white shadow py-2 make-offer-modal-id"
                                        data-id="2">
                                        <i class="fas fa-tag"></i> Make your offer</a>
                                </div>

                                <a href="#">
                                    <img class="border-radius-15" src="{{ asset('img/products/product1.jpg') }}"
                                        title="product"> </a>
                            </div>
                            <div class="product-info">
                                <h6 class="text-xs fw-light mb-0"> <a class="text-gray-300 link-cust-text"
                                        href="#">Clothing | </a><img style="width: 30px"
                                        src="{{ asset('img/brands/zara-bk.png') }}" title="cover"></h6>
                                <a href="#">Adicolor Classics Joggers</a>
                                <div class="d-flex mt-1 mb-2">
                                    <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                    <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                    <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                    <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                    <i class="fas fa-circle text-gray-200 me-1 text-xxxs"></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class=" d-flex flex-row-reverse align-items-center">
                                        <span class="text-xs text-gray-400 ms-1 fw-light">9 offers ..</span>
                                        <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user1.jpg') }}"
                                            title="seller" style="margin-left: -18px">
                                        <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user2.jpg') }}"
                                            title="seller" style="margin-left: -18px">
                                        <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user3.jpg') }}"
                                            title="seller" style="margin-left: -18px">
                                        <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user5.jpg') }}"
                                            title="seller">
                                    </div>
                                    <div>
                                        <h6 class="text-xxxs text-gray-300 mb-0">Lowest</h6>
                                        <h5>290<small class="text-xxxs text-gray-400">egp</small></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">

                        <div class="product-comp">
                            <div class="product-img position-relative mb-2">
                                <div class="img-top-info w-100 position-absolute">
                                    <img class="rounded-circle shadow" style="width: 23px; height:23px;"
                                        src="{{ asset('img/countries-flags/turkey.png') }}" title="product">
                                    <a href="#" class="wishlist-comp shadow"><i class="far fa-heart"></i></a>
                                </div>
                                <div class="img-sale-badge">
                                    SALE!
                                </div>
                                <a href="#">
                                    <img class="border-radius-15" src="{{ asset('img/products/product2.jpg') }}"
                                        title="product"> </a>
                            </div>
                            <div class="product-info">
                                <h6 class="text-xs text-gray-300 fw-light mb-0"> <a class="text-gray-300 link-cust-text"
                                        href="#">Bags | </a><img style="width: 30px"
                                        src="{{ asset('img/brands/zara-bk.png') }}" title="cover"></h6>
                                <a href="#">Adicolor Classics Joggers</a>
                                <div class="d-flex mt-1 mb-2">
                                    <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                    <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                    <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                    <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                    <i class="fas fa-circle text-gray-200 me-1 text-xxxs"></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class=" d-flex flex-row-reverse align-items-center">
                                        <span class="text-xs text-gray-400 ms-1 fw-light">5 offers ..</span>
                                        <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user1.jpg') }}"
                                            title="seller" style="margin-left: -18px">
                                        <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user2.jpg') }}"
                                            title="seller" style="margin-left: -18px">
                                        <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user3.jpg') }}"
                                            title="seller" style="margin-left: -18px">
                                        <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user7.jpg') }}"
                                            title="seller">
                                    </div>
                                    <div>
                                        <h6 class="text-xxxs text-gray-300 mb-0">Lowest</h6>
                                        <h5>700<small class="text-xxxs text-gray-400">egp</small></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">

                        <div class="product-comp">
                            <div class="product-img position-relative mb-2">
                                <div class="img-top-info w-100 position-absolute">
                                    <img class="rounded-circle shadow" style="width: 23px; height:23px;"
                                        src="{{ asset('img/countries-flags/turkey.png') }}" title="product">
                                    <a href="#" class="wishlist-comp shadow"><i class="far fa-heart"></i></a>
                                </div>
                                <a href="#">
                                    <img class="border-radius-15" src="{{ asset('img/products/product3.jpg') }}"
                                        title="product"> </a>
                            </div>
                            <div class="product-info">
                                <h6 class="text-xs text-gray-300 fw-light mb-0"> <a class="text-gray-300 link-cust-text"
                                        href="#">Tshirts | </a> <img style="width: 30px"
                                        src="{{ asset('img/brands/zara-bk.png') }}" title="cover"></h6>
                                <a href="#">Adicolor Classics Joggers</a>
                                <div class="d-flex mt-1 mb-2">
                                    <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                    <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                    <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                    <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                    <i class="fas fa-circle text-gray-200 me-1 text-xxxs"></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class=" d-flex flex-row-reverse align-items-center">
                                        <span class="text-xs text-gray-400 ms-1 fw-light">1 offers ..</span>
                                        <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user1.jpg') }}"
                                            title="seller" style="margin-left: -18px">
                                        <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user2.jpg') }}"
                                            title="seller" style="margin-left: -18px">
                                        <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user3.jpg') }}"
                                            title="seller" style="margin-left: -18px">
                                        <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user3.jpg') }}"
                                            title="seller">
                                    </div>
                                    <div>
                                        <h6 class="text-xxxs text-gray-300 mb-0">Lowest</h6>
                                        <h5>930<small class="text-xxxs text-gray-400">egp</small></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="product-comp">
                            <div class="product-img position-relative mb-2">
                                <div class="img-top-info w-100 position-absolute">
                                    <img class="rounded-circle shadow" style="width: 23px; height:23px;"
                                        src="{{ asset('img/countries-flags/canda.png') }}" title="product">
                                    <a href="#" class="wishlist-comp shadow"><i class="far fa-heart"></i></a>
                                </div>
                                <a href="#">
                                    <img class="border-radius-15" src="{{ asset('img/products/product4.jpg') }}"
                                        title="product"> </a>
                            </div>
                            <div class="product-info">
                                <h6 class="text-xs text-gray-300 fw-light mb-0"> <a class="text-gray-300 link-cust-text"
                                        href="#">Tshirts | </a> | <img style="width: 30px"
                                        src="{{ asset('img/brands/zara-bk.png') }}" title="cover"></h6>
                                <a href="#">Yellow Reserved Hoodie</a>
                                <div class="d-flex mt-1 mb-2">
                                    <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                    <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                    <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                    <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                    <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class=" d-flex flex-row-reverse align-items-center">
                                        <span class="text-xs text-gray-400 ms-1 fw-light">4 offers ..</span>
                                        <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user1.jpg') }}"
                                            title="seller" style="margin-left: -18px">
                                        <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user2.jpg') }}"
                                            title="seller" style="margin-left: -18px">
                                        <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user3.jpg') }}"
                                            title="seller" style="margin-left: -18px">
                                        <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user4.jpg') }}"
                                            title="seller">
                                    </div>
                                    <div>
                                        <h6 class="text-xxxs text-gray-300 mb-0">Lowest</h6>
                                        <h5>410<small class="text-xxxs text-gray-400">egp</small></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <!-- Modal for inserting offer -->
            <div class="modal fade" id="add_offer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content b-r-s-cont border-0">
                        <div class="modal-header border-0">
                            <h5 class="modal-title main-color"><i class="fas fa-plus me-1"></i>
                                Make New Offer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <form class="mb-0" action="{{ route('client.request_store') }}" method="post"
                            style="display: contents;">
                            {{ method_field('POST') }}
                            {{ csrf_field() }}

                            <!-- Modal content -->
                            <div class="modal-body px-5 py-3">

                                <div class="row mb-2">

                                    <div class="col-12 mb-2">
                                        <label class="form-label"> Online Price
                                            <small>({{ __('basic.required') }})</small></label>

                                        <input name="online_price" type="number"
                                            class="form-control form-control-200 @error('online_price') is-invalid @enderror"
                                            placeholder="Online Price.." required>

                                        <div class="form-text text-gray-200">This price is shown only to you & this is just
                                            to remember how you calculated your final price
                                        </div>

                                        <span id="online_price_error" class="error-msg-form"></span>

                                        @error('online_price')
                                            <span class="error-msg-form">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="col-12 mb-4">
                                        <label class="form-label"> Sold Price
                                            <small>({{ __('basic.required') }})</small></label>

                                        <input name="online_price" type="number" id="offer_ho_sold_price_modal"
                                            class="form-control form-control-200 @error('online_price') is-invalid @enderror"
                                            placeholder="Online Price.." required>

                                        <span id="online_price_error" class="error-msg-form"></span>

                                        @error('online_price')
                                            <span class="error-msg-form">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="d-flex justify-content-between align-items-center text-gray-700">
                                        <label class="form-label fw-bold mb-0">Huntoffer fee</small></label>
                                        <h6 class="mb-0" id="offer_ho_fee_modal" data-fee="20">20%</h6>
                                    </div>
                                    <div class="form-text text-gray-200">Huntoffer fee is calculated by your membership,
                                        you are now on a <span class="main-color fw-bold">GOLD</span> membership
                                    </div>

                                    <hr class="my-2">
                                    <div class="d-flex justify-content-between align-items-center text-gray-700 mb-4">
                                        <label class="form-label fw-bold mb-0">Total Price To Show</small></label>
                                        <div class="d-flex">
                                            <h6 id="offer_total_modal" class="mb-0">0</h6> <span class="text-xxs">
                                                EGP</span>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <label class="form-label"> Delivery Time
                                            <small>({{ __('required') }})</small></label>

                                        <input name="online_price" type="number"
                                            class="form-control form-control-200 @error('online_price') is-invalid @enderror"
                                            placeholder="Online Price.." required>

                                        <span id="online_price_error" class="error-msg-form"></span>

                                        @error('online_price')
                                            <span class="error-msg-form">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="col-12 mb-2">
                                        <label class="form-label"> Domestic Delivery fee
                                            <small>({{ __('basic.required') }})</small></label>

                                        <input name="online_price" type="number"
                                            class="form-control form-control-200 @error('online_price') is-invalid @enderror"
                                            placeholder="Online Price.." required>

                                        <span id="online_price_error" class="error-msg-form"></span>

                                        @error('online_price')
                                            <span class="error-msg-form">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="form-text text-gray-200 mb-3">The customer has the right for full refund if
                                        you
                                        didn't get the item on the time you mention or in case of wrong color , size or
                                        specification.
                                    </div>

                                    <div class="col-12 text-center mb-2">
                                        <input type="submit" class="main-btn-wide link-hover main-color-bg text-white"
                                            aria-current="page" href="#" value="SEND">
                                    </div>

                                </div>

                                <input name="product_offer_id" value="" type="hidden">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="best-deals-sec ps-2 ps-md-5 mt-2">

        <div class="swiper swiper-center-bestdeals" style="height: 238px">
            <div class="swiper-wrapper">
                <div class="swiper-slide swiper-slide-best-sale text-start justify-content-start"
                    style="background-image: url({{ asset('img/bestdeals/slide1.jpg') }}); background-size: cover;">
                    <a class="full-width-height-link" href="#">
                        <div style="width: 280px;" class="z-index-4 pt-5 ps-5">
                            <h1 class="text-white">
                                BLACKFRIDAY!!
                                IS <span class="main-color">COMING</span>
                            </h1>
                            <p class="text-white-op-80 fw-light mb-0 text-s">Discover our live shopping and take the best
                                offer ever
                            </p>
                        </div>
                    </a>
                </div>

                <div class="swiper-slide swiper-slide-best-sale text-start justify-content-start"
                    style="background-image: url({{ asset('img/bestdeals/slide2.jpg') }}); background-size: cover;">
                    <a class="full-width-height-link" href="#">
                        <div style="width: 280px;" class="z-index-4 pt-5 ps-5">
                            <h1 class="text-white">
                                80%
                                Discount
                            </h1>
                            <p class="text-white-op-80 fw-light mb-0 text-s">Discover our live shopping and take the best
                                offer ever
                            </p>
                        </div>
                    </a>
                </div>

                <div class="swiper-slide swiper-slide-best-sale text-start justify-content-start"
                    style="background-image: url({{ asset('img/bestdeals/slide1.jpg') }}); background-size: cover;">
                    <a class="full-width-height-link" href="#">
                        <div style="width: 280px;" class="z-index-4 pt-5 ps-5">
                            <h1 class="text-white">
                                BLACKFRIDAY!!
                                IS <span class="main-color">COMING</span>
                            </h1>
                            <p class="text-white-op-80 fw-light mb-0 text-s">Discover our live shopping and take the best
                                offer ever
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section id="live-shopping-hp" class="py-2 container-fluid p-0 mt-4 bg-dark py-5"
        style="background-image: url({{ asset('img/homepage/live-shooping-sec.jpg') }}); background-size: cover;">

        <div class="row g-0 ps-0 ps-md-5">
            <div
                class="col-12 col-md-4 ps-1 pe-3 ps-md-5 pt-md-3 pt-0 pb-5 pb-md-0 text-center text-md-start align-self-center">
                <p class="mb-0 text-gray-300 fw-ligh text-xs">HUNTOFFERS</p>
                <h1 class="text-xl fw-bold text-white">Live <i class="fas fa-video"></i> <br> <span
                        class="fw-lighter">Shooping</span></h1>
                <p class="text-gray-400 fw-light"> Discover our live shopping and take the best offer ever</p>
                <a href="#" class="btn-wide-sec-color-200 ">SEE MORE</a>
            </div>

            <div class="col-12 col-md-8 ps-3 ps-md-0">
                <!-- Swiper -->
                <div class="swiper swiper-live-shooping-product">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide border-radius-20 live-shooping-product"
                            style="background-image: url({{ asset('img/liveproducts/live1.jpg') }}); background-size: cover;">
                            <div class="img-top-info w-100 position-absolute">
                                <img class="rounded-circle shadow" style="width: 23px; height:23px;"
                                    src="{{ asset('img/countries-flags/turkey.png') }}" title="product">
                                <a href="#" class="wishlist-comp shadow"><i class="far fa-heart"></i></a>
                            </div>
                            <div class="live-product-info text-start text-white px-3">
                                <h6 class="text-xs text-gray-300 fw-light mb-0"> <a class="link-cust-text text-gray-300"
                                        href="#">Clothing</a> | <img style="width: 30px"
                                        src="{{ asset('img/brands/zara.png') }}" title="cover">
                                </h6>
                                <a href="#" class="fs-6">Collocation of different colors tshirts</a>
                                <p class=" text-xs text-gray-300 mb-2">20 hours ago</p>
                                <div class="row justify-content-between align-items-center mb-2">
                                    <div class="col-8 d-flex align-items-center">
                                        <img class="avatar-xs avatar-s-rounded me-1"
                                            src="{{ asset('img/cavatars/user5.jpg') }}" title="seller">
                                        <div class="text-truncate ">
                                            <a href="#" class="mb-0 fw-normal text-xs text-truncate mb-1">Ibrahim
                                                hesham elsayedddd
                                            </a>
                                            <div class="d-flex">
                                                <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                                <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                                <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                                <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                                <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="col-4 mb-0">700<small class="text-xxxs text-gray-400">egp</small></h5>
                                </div>

                            </div>
                        </div>

                        <div class="swiper-slide border-radius-20 live-shooping-product"
                            style="background-image: url({{ asset('img/liveproducts/live2.jpg') }}); background-size: cover;">
                            <div class="img-top-info w-100 position-absolute">
                                <img class="rounded-circle shadow" style="width: 23px; height:23px;"
                                    src="{{ asset('img/countries-flags/usa.png') }}" title="product">
                                <a href="#" class="wishlist-comp shadow"><i class="far fa-heart"></i></a>
                            </div>
                            <div class="live-product-info text-start text-white px-3">
                                <h6 class="text-xs text-gray-300 fw-light mb-0"> <a class="link-cust-text text-gray-300"
                                        href="#">Clothing</a> | <img style="width: 30px"
                                        src="{{ asset('img/brands/zara.png') }}" title="cover">
                                </h6>
                                <a href="#" class="fs-6">Basic Dress for a child</a>
                                <p class=" text-xs text-gray-300 mb-2">1 day ago</p>
                                <div class="row justify-content-between align-items-center mb-2">
                                    <div class="col-8 d-flex align-items-center">
                                        <img class="avatar-xs avatar-s-rounded me-1"
                                            src="{{ asset('img/cavatars/user1.jpg') }}" title="seller">
                                        <div class="text-truncate ">
                                            <a href="#" class="mb-0 fw-normal text-xs text-truncate mb-1">Amr Samy
                                            </a>
                                            <div class="d-flex">
                                                <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                                <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                                <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                                <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                                <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="col-4 mb-0">1500<small class="text-xxxs text-gray-400">egp</small></h5>
                                </div>

                            </div>
                        </div>

                        <div class="swiper-slide border-radius-20 live-shooping-product"
                            style="background-image: url({{ asset('img/liveproducts/live3.jpg') }}); background-size: cover;">
                            <div class="img-top-info w-100 position-absolute">
                                <img class="rounded-circle shadow" style="width: 23px; height:23px;"
                                    src="{{ asset('img/countries-flags/canda.png') }}" title="product">
                                <a href="#" class="wishlist-comp shadow"><i class="far fa-heart"></i></a>
                            </div>
                            <div class="live-product-info text-start text-white px-3">
                                <h6 class="text-xs text-gray-300 fw-light mb-0"> <a class="link-cust-text text-gray-300"
                                        href="#">Clothing</a> | <img style="width: 30px"
                                        src="{{ asset('img/brands/zara.png') }}" title="cover">
                                </h6>
                                <a href="#" class="fs-6">Nike Sportswear Futura Luxe</a>
                                <p class=" text-xs text-gray-300 mb-2">2 day ago</p>
                                <div class="row justify-content-between align-items-center mb-2">
                                    <div class="col-8 d-flex align-items-center">
                                        <img class="avatar-xs avatar-s-rounded me-1"
                                            src="{{ asset('img/cavatars/user6.jpg') }}" title="seller">
                                        <div class="text-truncate ">
                                            <a href="#" class="mb-0 fw-normal text-xs text-truncate mb-1">Yousef
                                                Ahmed
                                            </a>
                                            <div class="d-flex">
                                                <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                                <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                                <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                                <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                                <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="col-4 mb-0">4000<small class="text-xxxs text-gray-400">egp</small></h5>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        </div>

    </section>

    <section id="top-selling" class="container my-5">
        <div class="section-header-1 d-flex justify-content-between mb-3">
            <div>
                <h5 class="fw-normal">
                    Top Selling Products<i class="fas fa-circle main-color text-xxxs ms-1"></i>
                </h5>
                <p class=" text-gray-300">Here you can find the top selling products</p>
            </div>
            <a class="main-btn-wide link-hover main-color-bg text-white" aria-current="page" href="#">
                All Products</a>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-3 mb-3">
                <div class="product-comp">
                    <div class="product-img position-relative mb-2">
                        <div class="img-top-info w-100 position-absolute">
                            <img class="rounded-circle shadow" style="width: 23px; height:23px;"
                                src="{{ asset('img/countries-flags/usa.png') }}" title="product">
                            <a href="#" class="wishlist-comp shadow"><i class="far fa-heart"></i></a>
                        </div>

                        <div class="make-offer-inproduc">
                            <a class="main-btn-wide clickable-item-pointer link-hover main-color-bg text-white shadow py-2 make-offer-modal-id"
                                aria-current="page" data-bs-toggle="modal" data-bs-target="#make-offer-modal">
                                <i class="fas fa-tag"></i> Make your offer</a>
                        </div>

                        <a href="#">
                            <img class="border-radius-15" src="{{ asset('img/products/product1.jpg') }}"
                                title="product"> </a>
                    </div>
                    <div class="product-info">
                        <h6 class="text-xs fw-light mb-0"> <a class="text-gray-300 link-cust-text"
                                href="#">Clothing | </a><img style="width: 30px"
                                src="{{ asset('img/brands/zara-bk.png') }}" title="cover"></h6>
                        <a href="#">Adicolor Classics Joggers</a>
                        <div class="d-flex mt-1 mb-2">
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle text-gray-200 me-1 text-xxxs"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class=" d-flex flex-row-reverse align-items-center">
                                <span class="text-xs text-gray-400 ms-1 fw-light">9 offers ..</span>
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user1.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user2.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user3.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user5.jpg') }}"
                                    title="seller">
                            </div>
                            <div>
                                <h6 class="text-xxxs text-gray-300 mb-0">Lowest</h6>
                                <h5>290<small class="text-xxxs text-gray-400">egp</small></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 ">

                <div class="product-comp">
                    <div class="product-img position-relative mb-2">
                        <div class="img-top-info w-100 position-absolute">
                            <img class="rounded-circle shadow" style="width: 23px; height:23px;"
                                src="{{ asset('img/countries-flags/turkey.png') }}" title="product">
                            <a href="#" class="wishlist-comp shadow"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="img-sale-badge">
                            SALE!
                        </div>
                        <a href="#">
                            <img class="border-radius-15" src="{{ asset('img/products/product2.jpg') }}"
                                title="product"> </a>
                    </div>
                    <div class="product-info">
                        <h6 class="text-xs text-gray-300 fw-light mb-0"> <a class="text-gray-300 link-cust-text"
                                href="#">Bags | </a><img style="width: 30px"
                                src="{{ asset('img/brands/zara-bk.png') }}" title="cover"></h6>
                        <a href="#">Adicolor Classics Joggers</a>
                        <div class="d-flex mt-1 mb-2">
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle text-gray-200 me-1 text-xxxs"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class=" d-flex flex-row-reverse align-items-center">
                                <span class="text-xs text-gray-400 ms-1 fw-light">5 offers ..</span>
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user1.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user2.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user3.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user7.jpg') }}"
                                    title="seller">
                            </div>
                            <div>
                                <h6 class="text-xxxs text-gray-300 mb-0">Lowest</h6>
                                <h5>700<small class="text-xxxs text-gray-400">egp</small></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">

                <div class="product-comp">
                    <div class="product-img position-relative mb-2">
                        <div class="img-top-info w-100 position-absolute">
                            <img class="rounded-circle shadow" style="width: 23px; height:23px;"
                                src="{{ asset('img/countries-flags/turkey.png') }}" title="product">
                            <a href="#" class="wishlist-comp shadow"><i class="far fa-heart"></i></a>
                        </div>
                        <a href="#">
                            <img class="border-radius-15" src="{{ asset('img/products/product3.jpg') }}"
                                title="product"> </a>
                    </div>
                    <div class="product-info">
                        <h6 class="text-xs text-gray-300 fw-light mb-0"> <a class="text-gray-300 link-cust-text"
                                href="#">Tshirts | </a> <img style="width: 30px"
                                src="{{ asset('img/brands/zara-bk.png') }}" title="cover"></h6>
                        <a href="#">Adicolor Classics Joggers</a>
                        <div class="d-flex mt-1 mb-2">
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle text-gray-200 me-1 text-xxxs"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class=" d-flex flex-row-reverse align-items-center">
                                <span class="text-xs text-gray-400 ms-1 fw-light">1 offers ..</span>
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user1.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user2.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user3.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user3.jpg') }}"
                                    title="seller">
                            </div>
                            <div>
                                <h6 class="text-xxxs text-gray-300 mb-0">Lowest</h6>
                                <h5>930<small class="text-xxxs text-gray-400">egp</small></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="product-comp">
                    <div class="product-img position-relative mb-2">
                        <div class="img-top-info w-100 position-absolute">
                            <img class="rounded-circle shadow" style="width: 23px; height:23px;"
                                src="{{ asset('img/countries-flags/canda.png') }}" title="product">
                            <a href="#" class="wishlist-comp shadow"><i class="far fa-heart"></i></a>
                        </div>
                        <a href="#">
                            <img class="border-radius-15" src="{{ asset('img/products/product4.jpg') }}"
                                title="product"> </a>
                    </div>
                    <div class="product-info">
                        <h6 class="text-xs text-gray-300 fw-light mb-0"> <a class="text-gray-300 link-cust-text"
                                href="#">Tshirts | </a> | <img style="width: 30px"
                                src="{{ asset('img/brands/zara-bk.png') }}" title="cover"></h6>
                        <a href="#">Yellow Reserved Hoodie</a>
                        <div class="d-flex mt-1 mb-2">
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class=" d-flex flex-row-reverse align-items-center">
                                <span class="text-xs text-gray-400 ms-1 fw-light">4 offers ..</span>
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user1.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user2.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user3.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user4.jpg') }}"
                                    title="seller">
                            </div>
                            <div>
                                <h6 class="text-xxxs text-gray-300 mb-0">Lowest</h6>
                                <h5>410<small class="text-xxxs text-gray-400">egp</small></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="product-comp">
                    <div class="product-img position-relative mb-2">
                        <div class="img-top-info w-100 position-absolute">
                            <img class="rounded-circle shadow" style="width: 23px; height:23px;"
                                src="{{ asset('img/countries-flags/usa.png') }}" title="product">
                            <a href="#" class="wishlist-comp shadow"><i class="far fa-heart"></i></a>
                        </div>

                        <div class="make-offer-inproduc">
                            <a class="main-btn-wide clickable-item-pointer link-hover main-color-bg text-white shadow py-2 make-offer-modal-id"
                                aria-current="page" data-bs-toggle="modal" data-bs-target="#make-offer-modal">
                                <i class="fas fa-tag"></i> Make your offer</a>
                        </div>

                        <a href="#">
                            <img class="border-radius-15" src="{{ asset('img/products/product5.jpg') }}"
                                title="product"> </a>
                    </div>
                    <div class="product-info">
                        <h6 class="text-xs fw-light mb-0"> <a class="text-gray-300 link-cust-text"
                                href="#">Clothing | </a><img style="width: 30px"
                                src="{{ asset('img/brands/zara-bk.png') }}" title="cover"></h6>
                        <a href="#">Adicolor Classics Joggers</a>
                        <div class="d-flex mt-1 mb-2">
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle text-gray-200 me-1 text-xxxs"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class=" d-flex flex-row-reverse align-items-center">
                                <span class="text-xs text-gray-400 ms-1 fw-light">9 offers ..</span>
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user1.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user2.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user3.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user5.jpg') }}"
                                    title="seller">
                            </div>
                            <div>
                                <h6 class="text-xxxs text-gray-300 mb-0">Lowest</h6>
                                <h5>290<small class="text-xxxs text-gray-400">egp</small></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">

                <div class="product-comp">
                    <div class="product-img position-relative mb-2">
                        <div class="img-top-info w-100 position-absolute">
                            <img class="rounded-circle shadow" style="width: 23px; height:23px;"
                                src="{{ asset('img/countries-flags/turkey.png') }}" title="product">
                            <a href="#" class="wishlist-comp shadow"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="img-sale-badge">
                            SALE!
                        </div>
                        <a href="#">
                            <img class="border-radius-15" src="{{ asset('img/products/product6.jpg') }}"
                                title="product"> </a>
                    </div>
                    <div class="product-info">
                        <h6 class="text-xs text-gray-300 fw-light mb-0"> <a class="text-gray-300 link-cust-text"
                                href="#">Bags | </a><img style="width: 30px"
                                src="{{ asset('img/brands/zara-bk.png') }}" title="cover"></h6>
                        <a href="#">Adicolor Classics Joggers</a>
                        <div class="d-flex mt-1 mb-2">
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle text-gray-200 me-1 text-xxxs"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class=" d-flex flex-row-reverse align-items-center">
                                <span class="text-xs text-gray-400 ms-1 fw-light">5 offers ..</span>
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user1.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user2.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user3.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user7.jpg') }}"
                                    title="seller">
                            </div>
                            <div>
                                <h6 class="text-xxxs text-gray-300 mb-0">Lowest</h6>
                                <h5>700<small class="text-xxxs text-gray-400">egp</small></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">

                <div class="product-comp">
                    <div class="product-img position-relative mb-2">
                        <div class="img-top-info w-100 position-absolute">
                            <img class="rounded-circle shadow" style="width: 23px; height:23px;"
                                src="{{ asset('img/countries-flags/turkey.png') }}" title="product">
                            <a href="#" class="wishlist-comp shadow"><i class="far fa-heart"></i></a>
                        </div>
                        <a href="#">
                            <img class="border-radius-15" src="{{ asset('img/products/product7.jpg') }}"
                                title="product"> </a>
                    </div>
                    <div class="product-info">
                        <h6 class="text-xs text-gray-300 fw-light mb-0"> <a class="text-gray-300 link-cust-text"
                                href="#">Tshirts | </a> <img style="width: 30px"
                                src="{{ asset('img/brands/zara-bk.png') }}" title="cover"></h6>
                        <a href="#">Adicolor Classics Joggers</a>
                        <div class="d-flex mt-1 mb-2">
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle text-gray-200 me-1 text-xxxs"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class=" d-flex flex-row-reverse align-items-center">
                                <span class="text-xs text-gray-400 ms-1 fw-light">1 offers ..</span>
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user1.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user2.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user3.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user3.jpg') }}"
                                    title="seller">
                            </div>
                            <div>
                                <h6 class="text-xxxs text-gray-300 mb-0">Lowest</h6>
                                <h5>930<small class="text-xxxs text-gray-400">egp</small></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="product-comp">
                    <div class="product-img position-relative mb-2">
                        <div class="img-top-info w-100 position-absolute">
                            <img class="rounded-circle shadow" style="width: 23px; height:23px;"
                                src="{{ asset('img/countries-flags/canda.png') }}" title="product">
                            <a href="#" class="wishlist-comp shadow"><i class="far fa-heart"></i></a>
                        </div>
                        <a href="#">
                            <img class="border-radius-15" src="{{ asset('img/products/product8.jpg') }}"
                                title="product"> </a>
                    </div>
                    <div class="product-info">
                        <h6 class="text-xs text-gray-300 fw-light mb-0"> <a class="text-gray-300 link-cust-text"
                                href="#">Tshirts | </a> | <img style="width: 30px"
                                src="{{ asset('img/brands/zara-bk.png') }}" title="cover"></h6>
                        <a href="#">Yellow Reserved Hoodie</a>
                        <div class="d-flex mt-1 mb-2">
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                            <i class="fas fa-circle main-color me-1 text-xxxs"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class=" d-flex flex-row-reverse align-items-center">
                                <span class="text-xs text-gray-400 ms-1 fw-light">4 offers ..</span>
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user1.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user2.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user3.jpg') }}"
                                    title="seller" style="margin-left: -18px">
                                <img class="avatar-xs-rounded-border" src="{{ asset('img/cavatars/user4.jpg') }}"
                                    title="seller">
                            </div>
                            <div>
                                <h6 class="text-xxxs text-gray-300 mb-0">Lowest</h6>
                                <h5>410<small class="text-xxxs text-gray-400">egp</small></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-cat-hp py-2 container-fluid p-0 mb-0">
        <div class="row g-0 ps-0 ps-md-5">
            <div class="col-12 col-md-4 ps-1 ps-md-5 pt-md-3 pt-0 pb-2 pb-md-0 text-center text-md-start">
                <div class="hr-land bg-dark b-r-l-cont ms-auto me-auto ms-md-0"></div>
                <h1 class="text-xl"> Inspired By <br> Brands <i class="fas fa-circle main-color text-s ms-1"></i></h1>
            </div>

            <div class="col-12 col-md-8 ps-3 ps-md-0">
                <!-- Swiper -->
                <div class="swiper swiper-center-halfscreen" style="height: 300px">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide swiper-center-insp-brands text-start justify-content-start"
                            style="background-image: url({{ asset('img/insp-brands/1.jpg') }}); background-size: cover;">
                            <a class="full-width-height-link" href="#">
                                <div style="width: 280px;" class="z-index-4 pt-6 ps-5 text-dark">
                                    <p class="text-gray-600">Month baby brand</p>
                                    <h3 class="mb-3 fw-bold">
                                        Want a new style for your girl?
                                    </h3>
                                    <img style="width: 60px" src="{{ asset('img/brands/tommy.jpg') }}"
                                        title="cover">
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide swiper-center-insp-brands text-start justify-content-start"
                            style="background-image: url({{ asset('img/insp-brands/2.jpg') }}); background-size: cover;">
                            <a class="full-width-height-link" href="#">
                                <div style="width: 280px;" class="z-index-4 pt-6 ps-5 text-dark">
                                    <p class="text-gray-600">Month baby brand</p>
                                    <h3 class="mb-3 fw-bold">
                                        Want a new style for your girl?
                                    </h3>
                                    <img style="width: 60px" src="{{ asset('img/brands/zara-bk.png') }}"
                                        title="cover">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </div>
    </section>

    <section class="container-fluid mb-4" id="all-brands">
        <div class="swiper all-brands">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><a href="#"><img src="{{ asset('img/brands/zara-bk.png') }}"
                            title="zara"></a></div>
                <div class="swiper-slide"><a href="#"><img src="{{ asset('img/brands/nike.png') }}"
                            title="zara"></a></div>
                <div class="swiper-slide"><a href="#"><img src="{{ asset('img/brands/breshka.png') }}"
                            title="zara"></a></div>
                <div class="swiper-slide"><a href="#"><img src="{{ asset('img/brands/gucci.png') }}"
                            title="zara"></a></div>
                <div class="swiper-slide"><a href="#"><img src="{{ asset('img/brands/massimo.png') }}"
                            title="zara"></a></div>
                <div class="swiper-slide"><a href="#"><img src="{{ asset('img/brands/pullandbear.png') }}"
                            title="zara"></a></div>
                <div class="swiper-slide"><a href="#"><img src="{{ asset('img/brands/tommy.jpg') }}"
                            title="zara"></a></div>
                <div class="swiper-slide"><a href="#"><img src="{{ asset('img/brands/vans.png') }}"
                            title="zara"></a></div>
                <div class="swiper-slide"><a href="#"><img src="{{ asset('img/brands/fendi.png') }}"
                            title="zara"></a></div>
                <div class="swiper-slide"><a href="#"><img src="{{ asset('img/brands/us-polo.png') }}"
                            title="zara"></a></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section id="send-request" class="mb-4">
        <div class="row g-0 px-0">
            <div class="col-12 col-md-6"
                style="background-image: url({{ asset('img/homepage/request_index.jpg') }}); background-size: cover;">
            </div>
            <div class="col-12 col-md-6 p-5" style="background-color: #252525;">
                <h3 class="main-color mb-3 fw-normal text-capitalize mt-2 mb-5">Do you want to <span
                        class="fw-bold">Buy</span>
                    Something <span class="fw-bold"> Outside our list?<span></h3>
                <p class="text-gray-300 fw-light text-capitalize mb-4">
                    write here the product URL you want to buy and let HuntOffers do the rest till you get it in <span
                        class="fw-bold"> your home
                        in egypt </span>
                </p>
                <form>
                    <div class="px-5 text-center">
                        <input name="request_url" type="text"
                            class="form-control form-control-200-without-border mb-4"
                            placeholder="Write here the product URL www.defacto.com/oversize-fit" required="">
                        <input type="submit" class="main-btn-wide link-hover main-color-bg text-white"
                            aria-current="page" href="#" value="SEND">
                    </div>

                </form>
            </div>
        </div>
    </section>

    <section id="recent-requests" class="container mb-5">
        <div class="row">
            <div class="col-4 col-md-2">
                <h4 class="fw-light">
                    Recent <span class="fw-bold">Requests</span> <i class="fas fa-circle main-color text-s ms-1"></i>
                </h4>
            </div>
            <div class="col-8 col-md-10">
                <!-- Swiper -->
                <div class="swiper swiper-request" style="height: 75px">

                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="width: 140px">
                            <a class="full-width-height-link" href="#">
                                <div class="text-dark d-flex align-items-center text-start">
                                    <div class="position-relative me-2">
                                        <img class="avatar-m rounded-circle"
                                            src="{{ asset('img/products/product2.jpg') }}" title="cover">
                                        <img class="avatar-request-user rounded-circle position-absolute bottom-0"
                                            style="right:-5px" src="{{ asset('img/cavatars/user3.jpg') }}"
                                            title="cover">
                                    </div>

                                    <div class="text-s w-100 h-100 fw-light mb-0 text-truncate-line-2">
                                        Geometric print Scarf
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide" style="width: 140px">
                            <a class="full-width-height-link" href="#">
                                <div class="text-dark d-flex align-items-center text-start">
                                    <div class="position-relative me-2">
                                        <img class="avatar-m rounded-circle"
                                            src="{{ asset('img/products/product3.jpg') }}" title="cover">
                                        <img class="avatar-request-user rounded-circle position-absolute bottom-0"
                                            style="right:-5px" src="{{ asset('img/cavatars/user1.jpg') }}"
                                            title="cover">
                                    </div>
                                    <div class="text-s w-100 h-100 fw-light mb-0 text-truncate-line-2">
                                        Adicolor Classics Joggers
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide" style="width: 140px">
                            <a class="full-width-height-link" href="#">
                                <div class="text-dark d-flex align-items-center text-start">
                                    <div class="position-relative me-2">
                                        <img class="avatar-m rounded-circle"
                                            src="{{ asset('img/products/product4.jpg') }}" title="cover">
                                        <img class="avatar-request-user rounded-circle position-absolute bottom-0"
                                            style="right:-5px" src="{{ asset('img/cavatars/user5.jpg') }}"
                                            title="cover">
                                    </div>
                                    <div class="text-s w-100 h-100 fw-light mb-0 text-truncate-line-2">
                                        Yellow Reserved Hoodie
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide" style="width: 140px">
                            <a class="full-width-height-link" href="#">
                                <div class="text-dark d-flex align-items-center text-start">
                                    <div class="position-relative me-2">
                                        <img class="avatar-m rounded-circle"
                                            src="{{ asset('img/products/product6.jpg') }}" title="cover">
                                        <img class="avatar-request-user rounded-circle position-absolute bottom-0"
                                            style="right:-5px" src="{{ asset('img/cavatars/user6.jpg') }}"
                                            title="cover">
                                    </div>
                                    <div class="text-s w-100 h-100 fw-light mb-0 text-truncate-line-2">
                                        Adicolor Classics Joggers
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="z-index-1 gradient-ho h-100"
                        style="width: 94px;background-color: transparent;top: 0;right: 0;">

                    </div>
                    <div class="swiper-button-next"></div>

                </div>

            </div>
        </div>
    </section>

    @include('website/layouts.includes.footer')
@endsection


    <!-- footer -->



<!-- js insert -->
@section('js')

    <script src="{{ URL::asset('plugins/owl/owl.carousel.min.js') }}"></script>

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 0,
            responsiveClass: true,
            autoplaySpeed: 800,
            dots: false,
            nav: true,
            navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            responsive: {
                0: {
                    items: 2,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: true
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: true,
                }
            }
        })
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        //At the document ready event
        $(function() {
            new WOW().init();
        });

        //also at the window load event
        $(window).on('load', function() {

            new WOW().init();
        });

        $(document).on('click', '.click_modal_video_iframe', function() {
            var url = $(this).data('video_url');
            $("#video_modal_iframe").attr("src", url);
            $('#video_modal_show').modal('show');
        });
    </script>

    <!-- swiper slider -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mainSlider", {
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        var swiper = new Swiper(".swiper-center-halfscreen", {
            slidesPerView: "auto",
            touchEventsTarget: 'container',
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        var swiper = new Swiper(".swiper-request", {
            slidesPerView: "auto",
            touchEventsTarget: 'container',
            spaceBetween: 16,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        var swiper = new Swiper(".swiper-live-shooping-product", {
            slidesPerView: "auto",
            spaceBetween: 20,
            touchEventsTarget: 'container',
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        var swiper = new Swiper(".swiper-center-bestdeals", {
            slidesPerView: "auto",
            touchEventsTarget: 'container',
            spaceBetween: 15,
            loop: true,
        });

        var swiper = new Swiper(".all-brands", {
            slidesPerView: 3,
            spaceBetween: 30,
            touchEventsTarget: 'container',
            loop: true,
            loopFillGroupWithBlank: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            breakpoints: {
                576: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 7,
                    spaceBetween: 20,
                },
            },
        });

        var swiper = new Swiper(".swiper-products", {
            slidesPerView: 1,
            spaceBetween: 15,
            touchEventsTarget: 'container',
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },
        });
    </script>

@endsection
