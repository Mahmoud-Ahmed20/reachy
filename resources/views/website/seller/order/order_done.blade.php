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

                <div class="col-lg-9 p-2 mt-5">
                    <div class="vendor-profile">
                      <div class="container-fluid">
                        <div class="d-flex justify-content-between align-items-baseline mt-5">
                            <p class="fs-5 fw-bold mt-1"> <i class="fa-solid fa-cart-plus"></i>  الطلبات</p>
                            <div class="d-flex market align-items-baseline">
                              <div class="dropdown latest">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                الاحداث
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                  <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                  <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                </ul>
                              </div>

                              <div class="dropdown latest">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  الاعلى سعر
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                  <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                  <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                </ul>
                              </div>
                        </div>

                    </div>
                        <div class="row">
                          <div class="table-order p-3 mt-3">
                            <div class="container">
                              <div class="row table-head text-center">
                                <div class="col-2">
                                  <h5 class="fw-bolder">رقم الطلب</h5>
                                </div>
                                <div class="col-2">
                                  <h5 class="fw-bolder">التاريخ</h5>
                                </div>
                                <div class="col-2">
                                  <h5 class="fw-bolder">حاله الطلب</h5>
                                </div>
                                <div class="col-3">
                                  <h5 class="fw-bolder">التكلفة الكليه</h5>
                                </div>
                                <div class="col-3">
                                  <h5 class="fw-bolder">التفاصيل</h5>
                                </div>
                              </div>
                              {{-- @if (isset($orders->order->status == 1)) --}}
                              @foreach ($orders as $item)
                              <div class="row text-center">
                                <div class="col-2">
                                  <h5 class="fw-bolder">{{ $item->order->code }}</h5>
                                </div>
                                <div class="col-2">
                                  <h5>{{ $item->order->arrived_date }}</h5>
                                </div>
                                <div class="col-2">
                                    @if ($item->status == 3)
                                        @php
                                            $msg = 'Delivered';
                                            $btn_color = 'not_accepted-color-btn';
                                        @endphp
                                    @endif

                                    <h5 class="state"><span>{{  $msg }}</span></h5>

                                </div>
                                <div class="col-3">
                                  <h5>{{  $item->order->final_price  }}</h5>
                                </div>
                                <div class="col-3 d-flex align-items-center justify-content-center">
                                  <a class="detail-icon" href="{{ route('seller.order_items',$item->id ) }}">
                                    <i class="fa-solid fa-eye-slash" style="font-size: 12px"></i>
                                    التفاصيل
                                  </a>
                                </div>
                              </div>
                              <hr>

                              @endforeach

                            </div>

                            <style>

                            </style>

                          </div>
                        </div>
                        </div>
                      </div>
                    </div>
            </div>
        </div>
    </div>



    @endsection

