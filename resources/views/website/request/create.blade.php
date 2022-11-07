@extends('website/layouts.master')

@section('title', 'Pain Cure | Dr. Amr Saeed for back pain treatment | دكتور عمرو سعيد لعلاج الالم')

<!-- css insert -->
@section('css')

    <!-- swiper slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

@endsection

<!-- content insert -->
@section('content')

    <section class="mb-5">
        <div class="row mb-5" style="background-color: #d08f69">
            <div class="col-4">
                <img class="w-100 h-100 img-fluid" style="object-fit: cover;"
                    src="{{ asset('img/homepage/request/request-create-top.jpg') }}" title="product">
            </div>
            <div class="col-8 py-1 d-flex justify-content-between text-white align-items-center px-2 px-md-5">
                <h3 class="fw-light">
                    <span class="fw-bold">Discover</span> our products <br> before requesting
                </h3>
                <a href="#" class="btn-nocolor-white-border-200 me-5">All Cataloge</a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 align-self-center text-center mb-4 mb-md-0">
                    <img class="img-fluid" style="width:390px"
                        src="{{ asset('img/homepage/request/undraw_messenger_re_8bky.svg') }}" title="seller area">
                </div>
                <div class="col-12 col-md-6">
                    <h4 class="main-color">
                        Send Request
                    </h4>

                    <form id="myform" class="px-4 mt-3" method="POST" action="{{ route('sett.patient.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-2">

                            <div class="col-12 mb-3">
                                <label class="form-label">Product URL
                                    <small>(required)</small></label>
                                <input name="url" type="text"
                                    class="form-control form-control-200 @error('email') is-invalid @enderror"
                                    placeholder="Yousef@gmail.com..." value="{{ old('email') }}">
                                @error('email')
                                    <span class="error-msg-form">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Product Name
                                    <small>(required)</small></label>
                                <input name="url" type="text"
                                    class="form-control form-control-200 @error('email') is-invalid @enderror"
                                    placeholder="Yousef@gmail.com..." value="{{ old('email') }}">
                                @error('email')
                                    <span class="error-msg-form">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label class="form-label">Color
                                        <small>(optional)</small></label>
                                    <input name="url" type="text"
                                        class="form-control form-control-200 @error('email') is-invalid @enderror"
                                        placeholder="Yousef@gmail.com..." value="{{ old('email') }}">
                                    @error('email')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Size
                                        <small>(optional)</small></label>
                                    <input name="url" type="text"
                                        class="form-control form-control-200 @error('email') is-invalid @enderror"
                                        placeholder="Yousef@gmail.com..." value="{{ old('email') }}">
                                    @error('email')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <label class="form-label">Note
                                    <small>(optional)</small></label>
                                <textarea name="note" class="form-control form-control-200" placeholder="Write here your notes .." rows="4"
                                    spellcheck="false">{{ old('note') }}</textarea>

                                @error('email')
                                    <span class="error-msg-form">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 text-center mb-2">
                            <input type="submit" class="main-btn-wide link-hover main-color-bg text-white"
                                aria-current="page" href="#" value="SEND">
                        </div>
                    </form>
                </div>
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
                                        <img class="avatar-m rounded-circle" src="{{ asset('img/products/product2.jpg') }}"
                                            title="cover">
                                        <img class="avatar-request-user rounded-circle position-absolute bottom-0"
                                            style="right:-5px" src="{{ asset('img/cavatars/user3.jpg') }}" title="cover">
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
@endsection

<!-- js insert -->
@section('js')

    <!-- swiper slider -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".swiper-request", {
            slidesPerView: "auto",
            touchEventsTarget: 'container',
            spaceBetween: 16,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>

@endsection
