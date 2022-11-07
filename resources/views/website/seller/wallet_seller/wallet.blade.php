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

@section('fixedcontent')

    <!-- session successful message -->
    @if (Session::has('success'))
        <div id="flash-msg" class="shadow pt-3">
            <div class="d-flex justify-content-between mb-2">
                <i class="fas fs-1 fa-check"></i>
                <a id="flash-msg-btn" class="text-blue-300 clickable-item-pointer"><i class="fas fa-times"></i></a>
            </div>
            <h3>Sent Successfully</h3>
            <p class="text-blue-300">{{ Session::get('success') }}</p>
        </div>
    @endif

    <!-- session successful message -->
    @if (Session::has('error_delete'))
        <div id="flash-msg" class="shadow pt-3" style="background-color:#ff4152;">
            <div class="d-flex justify-content-between mb-2">
                <i class="fas fs-1 fa-times"></i>
                <a id="flash-msg-btn" class="text-blue-300 clickable-item-pointer"><i class="fas fa-times"
                        style="color:#ffb4bc"></i></a>
            </div>
            <h3>We can't do it!</h3>
            <p style="color:#ffb4bc">{{ Session::get('error_delete') }}</p>
        </div>
    @endif

@endsection
<!-- content insert -->
@section('content')


<div class="add-product">

    <div class="container-fluid">
        <div class="row">
            @include('website/layouts.includes.sidebar')
        <div class="col-lg-6">
            <div class="credit-card d-flex mb-3 sign">
                <i class="fa-solid fa-credit-card"></i>
            <h3 class="fw-bold fs-5 mt-3">المحفظة</h3>
            </div>

            <div class="row mb-5">

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="your-current-points-wallet-card">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="wallet-card d-flex align-items-center">
                                <i class="fa-solid fa-circle-dollar-to-slot"></i>
                            <h3>رصيدك الحالي</h3>
                            </div>
                            <div class="arrow details">
                                <a href="#">تفاصيل</a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="number-wallet-card">
                            <h3>550,00</h3>
                            </div>
                            <div class="mt-2 ms-2 pount">
                                <p class="fw-bolder">
                                    جنية
                                </p>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="your-current-points-wallet-card-2">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="wallet-card d-flex align-items-center">
                                <i class="fa-solid fa-circle-dollar-to-slot"></i>
                            <h3> رصيدك المدفوع</h3>
                            </div>
                            <div class="arrow details">
                                <a href="#">تفاصيل</a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="number-wallet-card">
                            <h3>3500,00</h3>
                            </div>
                            <div class="mt-2 ms-2 pount">
                                <p class="fw-bolder">
                                    جنية
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <section>
                <div class="table-order">
                    <div class="container-fluid">
                        @foreach ($wallet as $item)
                        @if ($item->status == 2)
                            <div class="row align-items-lg-baseline">
                                <div class="col-3 p-0">
                                <h5 class="fw-bolder"><span class="icon-loyalty ms-3"><i class="fa-solid fa-credit-card"></i></span># {{ $item->order->code }}</h5>
                                </div>

                                <div class="col-3 text-center">
                                <h5 class="text-grey">{{  $item->delivered_date }}</h5>
                                </div>
                                <div class="col-2 text-center">
                                <h5 class="fw-bold">{{  $item->final_price  }} LE</h5>
                                </div>
                                <div class="col-3 text-start">
                                <h5 class="detail-icon ">
                                    <a href="#">فلوس على المحفظة</a>
                                </h5>
                                </div>
                            </div>
                            <hr>

                        @endif
                        @endforeach

                    </div>
                </div>

            </section>
            </div>
            <div class="col-lg-3">
                    <div class="banner-img mb-4">
                        <h2>
                            ادفع دلوقتي
                                بفودافون كاش
                                وهتوفر لحد 1250 جنيه
                        </h2>
                    </div>
                    <div class="banner2-img mb-4">
                        <h2>
                            ادفع دلوقتي
                            بكارت فيزا
                        </h2>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

