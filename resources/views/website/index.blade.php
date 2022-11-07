@extends('website.layouts.master')

@section('title', 'Home Bage')

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

    <!-- End content Wrapper -->
    @include('website/layouts.includes.leftbar')
    <div class="mt-4 p-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-md-12 col-sm-12 all-product">
                    <div class="row">
                        <div class="col-xl-6 mb-2">
                            <a href="{{ url('main/category/super-market') }}" onclick="dodajAktywne(this)"
                                class="d-flex background-offer  active-section p-3 border-20 justify-content-between">
                                <h2 class="fw-bold fs-5 mt-3 me-2">سوبر <br> ماركت</h2>
                                <img src="image/photo-4.png" alt="">
                            </a>
                        </div>
                        <div class="col-xl-6 mb-2">
                            <a href="{{ url('main/category/baby-stuff') }}" onclick="dodajAktywne(this)"
                                class="d-flex background-offer  active-section border-20 p-3 justify-content-between">
                                <h2 class="fw-bold fs-5 mt-3 me-2">مستلزمات <br> أطفال</h2>
                                <img src="image/photo-5.png" alt="">
                            </a>
                        </div>
                        <div class="col-xl-6 mb-2">
                            <a href="{{ url('main/category/home-garden-products') }}" onclick="dodajAktywne(this)"
                                class="d-flex active-page background-offer border-20 p-3 justify-content-between">
                                <h2 class="fw-bold fs-5 mt-3 me-2">أجهزة <br> منزلية</h2>
                                <img src="image/photo-1.png" alt="">
                            </a>
                        </div>
                        <div class="col-xl-6 mb-2">
                            <a href="{{ url('main/category/health-and-beauty') }}" onclick="dodajAktywne(this)"
                                class="d-flex background-offer  active-section border-20 p-3 justify-content-between">
                                <h2 class="fw-bold fs-5 mt-3 me-2">الصحة <br> والجمال</h2>
                                <img src="image/photo-3.png" alt="">
                            </a>
                        </div>
                        <div class="col-xl-6 mb-2">
                            <a href="{{ url('main/category/frozen-foods') }}" onclick="dodajAktywne(this)"
                                class="d-flex background-offer  active-section  border-20 p-3 justify-content-between">
                                <h2 class="fw-bold fs-5 mt-3 me-2">أطعمة <br> مجمدة</h2>
                                <img src="image/photo-6.png" alt="">
                            </a>
                        </div>
                        <div class="col-xl-6 mb-2">
                            <a href="{{ url('main/category/pet-food-and-supplies') }}" onclick="dodajAktywne(this)"
                                class="d-flex background-offer  active-section border-20 p-3 justify-content-between">
                                <h2 class="fw-bold fs-5 mt-3 me-2">مستلزمات <br> حيوانات</h2>
                                <img src="image/photo-8.png" alt="">
                            </a>
                        </div>
                        <div class="col-xl-6 mb-2">
                            <a href="{{ url('/main/category/pies-and-pastries') }}" onclick="dodajAktywne(this)"
                                class="d-flex background-offer  active-section border-20 p-3 justify-content-between">
                                <h2 class="fw-bold fs-5 mt-3 me-2">فطائر <br> ومخبوزات</h2>
                                <img src="image/photo-7.png" alt="">
                            </a>
                        </div>
                        <div class="col-xl-6 mb-2">
                            <a href="{{ route('other.category') }}" onclick="dodajAktywne(this)"
                                class="d-flex text-center background-offer active-section border-20 p-3"
                                style="height: 123px;">
                                <h2 class="fw-bold w-100 fs-5 mt-4 text-center">اقسام اخرى</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 col-sm-12 border-20 d-flex align-items-center justify-content-center">
                    <div class="swiper mySwiper2">

                        <div class="swiper-wrapper">
                            @foreach ($sliders as $item)
                                @if ($item->type == 1)
                                    <div class="swiper-slide">
                                        <div class="background-offer-2">
                                            <img src="{{ asset('img/slider/' . $item->image) }}" alt="">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            {{-- <div class="swiper-slide"><img src="{{ asset('img/slider/' . $item->image) }}"
                                            alt=""></div> --}}

                        </div>


                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb-4 mt-4 ">
                <h3 class="fw-bold fs-5"> وفر اكتر انهاردة</h3>
                <button class="btn btn-foot w-auto p fs-7"> عرض المزيد</button>
            </div>
            <div class="row">
                @foreach ($product as $item)
                    @if ($item->today_offer == 1)

                    <div class="col-xl-4 mb-3">
					<div class="product-swiper  ">
						<div class="row">
							<div class="col-6 "> 
								<span class="p-2">وفر 15 ج</span>
								<div class="product-image-2"> 
                                    <a href="{{ route('products.show', $item->slug_en) }}">
                                        <img style="object-fit: contain;"
                                            src="{{ asset('img/products/' . $item->cover_image) }}" alt="">
                                    </a>    
                                </div>
							</div>
							<div class="mt-4 p-2 col-6 ">
								<p class="fw-bold sale">sale to 11:00 PM</p>
                                <p>{{ $item->main_category->name_ar }}</p>
                                    <a href="{{ route('products.show', $item->slug_en) }}">
                                        <h2>{{ $item->name_ar }}</h2>
                                    </a>
								<div class="mt-2"> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star-half-stroke"></i> (4.0) </div>
								<h5 class="mt-2">By NestFood</h5>
								<div class="mt-2 d-flex justify-content-between">
									<div class="pt-2">
                                    <p class="price ps-2">{{ $item->price }}EGP</p>
                                    {{--  <p class="dis-count">5.00 EGP</p>  --}}
									</div>
									<div>
										<button class="p-2 add-cart " type="button">أضف <i class="fa-solid fa-cart-shopping"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>





                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="p-3 mt-3">
        <div class="container-fluid">
            <div class="row">
                @foreach ($sliders as $item)
                    @if ($item->type == 2)
                        <div class="col-xl-6 mb-3">
                            <div class="back-gift-2 border-20">
                                <img src="{{ asset('img/slider/' . $item->image) }}" alt="">
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>
        </div>
    </div>
    <div class="p-3">



  

    <div class="mt-3 p-2">
        <div class="container-fluid">
            <div class="row">
                @foreach ($sliders as $item)
                    @if ($item->type == 3)
                        <div class="col-xl-4 mb-3">
                            <div class="banner">
                                <img src="{{ asset('img/slider/' . $item->image) }}" alt="">
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>
        </div>
    </div>
    <div class="mt-3 p-3 mb-3">
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb-2 mt-4  ">
                <h3 class="fw-bold fs-5"> عروض مستلزمات الأطفال</h3>
                <button class="btn btn-foot w-auto "> عرض المزيد</button>
            </div>
            <div class="row">
                <div class="over1 col-xl-7 mt-3">
                    <div class="row">
                        @foreach ($product as $item)
                            @if ($item->baby_Offers == 1)
                                <div class="col-lg-4">
                                    <div class="product-swiper mb-3">
                                        <span class="p-2">وفر 15 ج</span>
                                        <div class="product-image">
                                            <a href="{{ route('products.show', $item->slug_en) }}">
                                                <img style="object-fit: contain;"
                                                    src="{{ asset('img/products/' . $item->cover_image) }}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <p>{{ $item->main_category->name_ar }}</p>
                                        <a href="{{ route('products.show', $item->slug_en) }}">
                                            <h2>{{ $item->name_ar }}</h2>
                                        </a>
                                        <div class="mt-2">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star-half-stroke"></i> (4.0)
                                        </div>
                                        <h5 class="mt-2">By NestFood</h5>
                                        <div class="mt-2 d-flex justify-content-between">
                                            <div class="pt-2">
                                                <p class="price ps-2">{{ $item->price }}EGP</p>
                                                {{--  <p class="dis-count">5.00 EGP</p>  --}}
                                            </div>
                                            <div>
                                                <button class="ms-2 btn-save"><i
                                                        class="fa-regular fa-bookmark"></i></button>
                                                <button class="p-2 add-cart" type="button">أضف <i
                                                        class="fa-solid fa-cart-shopping"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @foreach ($sliders as $item)
                    @if ($item->type == 4)
                        <div class="over2 col-xl-5 mt-3"
                            style="background-image: url({{ asset('img/slider/' . $item->image) }})"> </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
    <div class="p-2">
        <div class="container-fluid">
            <div class="row">
                @foreach ($sliders as $item)
                    @if ($item->type == 5)
                        <div class="col-xl-6 mb-3">
                            <div class="back-gift-2 border-20">
                                <img src="{{ asset('img/slider/' . $item->image) }}" alt="">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>



    



    <div class="p-3">
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="d-flex justify-content-between mb-2 mt-4 ">
                    <h3 class="fw-bold fs-5"> عروض الصحة والجمال </h3>
                    <button class="btn btn-foot w-auto p fs-7"> عرض المزيد</button>
                </div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">

                        @foreach ($product as $item)
                            @if ($item->Health_beauty_offers == 1)

                            <div class="swiper-slide" data-swiper-slide-index="3" role="group" aria-label="4 / 6" style="width: 265.4px; margin-left: 20px;">
							<div class="product-swiper"> <span class="p-2">وفر 15 ج</span>
								<div class="product-image"> 
                                    <img src="{{ asset('img/products/' . $item->cover_image) }}" alt=""> </div>
								<p>{{ $item->main_category->name_ar }}</p>
								<h2>{{ $item->name_ar }}</h2>
								<div class="mt-2"> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star-half-stroke"></i> (4.0) </div>
								<h5 class="mt-2">By NestFood</h5>
								<div class="mt-2 d-flex justify-content-between">
									<div class="pt-2">
										<p class="price">4.50 EGP</p>
										<p class="dis-count">5.00 EGP</p>
									</div>
									<div>
										<button class="ms-2 btn-save"><i class="fa-regular fa-bookmark"></i></button>
										<button class="p-2 add-cart" type="button">أضف <i class="fa-solid fa-cart-shopping"></i></button>
									</div>
								</div>
							</div>
						</div>

                                
                            @endif
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 p-2">
        <div class="container-fluid">
            <div class="row">
                @foreach ($sliders as $item)
                    @if ($item->type == 6)
                        <div class="col-xl-4 mb-3">
                            <div class="banner">
                                <img src="{{ asset('img/slider/' . $item->image) }}" alt="">
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>
        </div>
    </div>
    <div class="container-fluid p-3">
        <div class="saller-banner  border-20 mt-5 pt-5">
            <div class="text-center">
                <h1>بيع أكتر وأكسب أكتر</h1>
                <p>ابدأ البيع دلوقتي على ريتشي مارت</p>
                <a href="{{ route('seller.register') }}">
                    <button class="p-2 btn3">سجل دلوقتي</button>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid p-3">
        <div class="sub-scribe  border-20 mt-5">
            <div class="text-center">
                <h2>
                    انضم للقائمة البريدية
                </h2>
                <p>انضم الان لقائمتنا البريدية للحصول على أحدث العروض والخصومات</p>
                <form action="" method="post">
                    <input class="p-2 w-75 input-email" type="text" placeholder="ادخل البريد الالكترونى">
                    <button class=" btn-subscribe" type="button">اشترك</button>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="js/menu.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script>
        var $validator = $('#myforminput').validate({
            rules: {
                first_name: {
                    minlength: 3,
                },
                second_name: {
                    minlength: 3,
                },
                password: {
                    minlength: 7,
                    maxlength: 100,
                },
                password_confirmation: {
                    minlength: 7,
                    maxlength: 100,
                    equalTo: '#password',
                },
                note: {
                    minlength: 3,
                },

                phone: {
                    minlength: 11,
                },
            },
            messages: {
                email: {
                    required: "We need your email address to contact you",
                    email: "Your email address must be in the format of name@domain.com"
                },
                password_confirmation: {
                    equalTo: "Password does not match",
                }
            },
            //for inserting erros for some inputs that makes posation problem such as selector 2 and bt datapicker
            errorPlacement: function(error, element) {
                switch (element.attr("name")) {

                    case 'note':
                        error.insertAfter($("#note-js-error-valid"));
                        break;
                    case 'gendar':
                        error.insertAfter($("#gendar-js-error-valid"));
                        break;
                    case 'phone_number':
                        error.insertAfter($("#phone_number-js-error-valid"));
                        break;
                    case 'active':
                        error.insertAfter($("#ctivate-js-error-valid"));
                        break;

                    default:
                        error.insertAfter(element);
                }

            },
        });
    </script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 2,
            loop: false,
            spaceBetween: 30,
            showsPagination: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            breakpoints: {
                300: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                500: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                750: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                1424: {
                    slidesPerView: 5,
                    spaceBetween: 20,
                },
            },

        });
        $(window).on('load', function() {
            $('#exampleModalLg').modal('show');
        });
        var swiper = new Swiper(".mySwiper2", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <script>
        $('document').ready(function() {
            $('.update_wishlist').click(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var product_slug = $(this).data('product_slug');

                var url = "{{ route('client.wash-lists.index') }}";

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        product_slug: product_slug,
                        "_method": 'POST',

                    },
                    success: function(response) {}
                });
            });
        });
    </script>
    <script>
        $('document').ready(function() {
            $(".wishlist-delete").click(function() {

                var id = $(this).data("wishlist_id");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var url = "{{ route('client.wash-lists.destroy', 'id') }}";
                url = url.replace('id', id);

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "_method": 'DELETE',
                    },
                    success: function(data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
    <script>
        $('.js-example-basic-single_resp').select2({
            dropdownParent: $('#exampleModalToggle2')
        });
    </script>




    <script>
        function dodajAktywne(elem) {
            var a = document.getElementsByTagName('a')
            for (i = 0; i < a.length; i++) {
                a[i].classList.remove('active-page');
            }
            elem.classList.add('active-page');
        }
        let eye = document.getElementById("togglePassword");
        let password = document.getElementById("password-2");
        eye.addEventListener("click", function(e) {
            if (password.type === "password") {
                password.type = "text";
                eye.classList.replace("fa-eye-slash", "fa-eye");
            } else {
                password.type = "password";
                eye.classList.replace("fa-eye", "fa-eye-slash");
            }
        });
    </script>
@endsection
