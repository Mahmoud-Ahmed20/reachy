@extends('website/layouts.master_top')

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


<div class="profile">

    <div class="container-fluid">
        <div class="row">
        @include('website/layouts.includes.sidebar')
        <div class="col-lg-9">
            <div class="back-gift-filter mt-3 mb-5">
                <div class="title-order-2 pt-5 pe-5">
                    <h2>اشترك دلوقتي في الباقة الفضية</h2>
                    <p>وهتوفر لحد 1250 جنيه على مشترياتك</p>
                    <button class="btns">تسوق الان</button>
                </div>
            </div>
                <div class="row mb-5">
                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="your-current-points-wallet-card">
                        <div class="d-flex justify-content-between  align-items-baseline mb-3">
                            <div class="wallet-card d-flex  align-items-baseline">
                                <i class="fa-solid fa-shop"></i>
                                <h3>عدد المنتجات المعروضة</h3>
                            </div>
                            <div class="arrow details">
                                <p>33%+</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="number-wallet-card d-flex">
                                <h3 class="fw-bold fs-2">55000 </h3><p class="fs-6 me-2 mt-2">منتج</p>
                            </div>
                            <img class="w-25 mt-0" src="{{ asset('img/Group-1863.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="your-current-points-wallet-card-2">
                        <div class="d-flex justify-content-between  align-items-baseline mb-3">
                            <div class="wallet-card d-flex  align-items-baseline">
                                <i class="fa-solid fa-shop"></i>
                                <h3>المنتجات التى تم بيعها</h3>
                            </div>
                            <div class="arrow details">
                                <p>33%+</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="number-wallet-card d-flex">
                                <h3 class="fw-bold fs-2">55000 </h3><p class="fs-6 me-2 mt-2">منتج</p>
                            </div>
                            <img class="w-25 mt-0" src="{{ asset('img/Group-1863.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="your-current-points-wallet-card">
                        <div class="d-flex justify-content-between align-items-baseline mb-3">
                            <div class="wallet-card d-flex  align-items-baseline">
                                <i class="fa-solid fa-shop"></i>
                                <h3>رصيدى المنتظر</h3>
                            </div>
                            <div class="arrow details">
                                <p>33%+</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="number-wallet-card d-flex">
                                <h3 class="fw-bold fs-2">55000 </h3><p class="fs-6 me-2 mt-2">منتج</p>
                            </div>
                            <img class="w-25 mt-0" src="{{ asset('img/Group-1863.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <section>
                <div class="vendor-profile">
                    <div class="container-fluid">
                            <div class="d-flex justify-content-between">
                                <h2 class="fw-bold fs-5"> اخر المنتجات </h2>
                                <button class="btn btn-foot ps-0 pe-0">إضافه <i class="fa-solid fa-plus"></i></button>
                            </div>
                            <div class="row">
                                <!-- <div class="col-xxl-3 col-xl-4 col-md-4 col-sm-6 ">
                                    <div class="product-swiper">
                                        <div class="product-image">
                                        <img src=" {{ asset('img/product-3-1.png') }}" alt="">
                                        </div>
                                        <p>لبن</p>
                                        <h2>جهينة ميكس بالفراولة</h2>
                                        <div class="mt-2">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i> (4.0)
                                        </div>
                                        <h5 class="mt-2">By NestFood</h5>
                                        <div class="mt-2 d-flex justify-content-between">
                                            <p class="price me-2">4.50 EGP</p>
                                            <p class="dis-count ms-2">5.00 EGP</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button class="btn-update">تعديل المنتج</button>
                                            <button class="p-2 add-cart" type="button">حذف المنتج</button>
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

@endsection
