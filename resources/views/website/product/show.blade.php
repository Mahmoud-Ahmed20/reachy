@extends('website.layouts.master_top')

@section('title', 'Product')

<!-- css insert -->
@section('css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <style>
    .photo-brand{
            width: 100%;
            height:89%;
            background-size: cover;
            background-position: center;
    }
    </style>

@endsection
<!-- content insert -->
@section('content')

    <div class="product mt-5">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-xl-4 pt-3">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            @foreach ($product->Productimg as $img)
                                <div class="swiper-slide">
                                    <img src="{{ asset('img/products/' . $img->name_img) }}" />
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper-3 mt-3">
                        <div class="swiper-wrapper">
                            @foreach ($product->Productimg as $img)
                                <div class="swiper-slide" style="height: 140px !important;">
                                    <img src="{{ asset('img/products/' . $img->name_img) }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4 ">
                    <div class="info-product p-4">
                        <div class="d-flex justify-content-between">
                            <h1> {{ $product->name_ar }}</h1>
                            <i onClick="save(this)" class="fa-regular fa-bookmark  fa-2x pointer_item"></i>
                        </div>
                        <p style="  color:#817A7A;">كيس ارز الضحى وزن 5 كيلو جرام معبأ اليا ومن انقى انوع الارز</p>
                        <p><span style="color:#1D2C77;">حجم العلبة</span>: 2.2 L</p>
                        <div>
                            3.6 <i class="fas fa-star" style="color: #dddcdc;"></i><i class="fas fa-star"
                                style="color:#dddcdc;"></i><i class="fas fa-star" style="color:#F67F00 ;"></i><i
                                class="fas fa-star" style="color:#F67F00 ;"></i><i class="fas fa-star"
                                style="color:#F67F00 ;"></i>
                        </div>
                        <div class="mt-3">
                            <span
                                style="  color:#1D2C77; font-weight: bold; font-size: 20px;">{{ $product->orginal_price + $product->tax }}
                                EGP</span>
                            <span style="  color:#817A7A;">(شامل قيمة الضربية)</span>
                        </div>
                        <p class="selling text-center w-50 p-2 mt-2">الأكثر مبيعا</p>
                        <p class="selling2 p-3"><i style="color:#F67F00; margin-left: 5px;"
                                class="fa-solid fa-truck-fast"></i>إحصل عليها خلال السبت ١٢ م - ٣ م التوصيل المجاني </p>
                        <div class="d-flex justify-content-between">
                        @if ($count == 0)
                            <p class="selling text-center w-50 p-2 mt-2 fw-bold"> لقد نفذت الكمية  </p>

                        @elseif ($count < 4)
                         <p class="selling text-center w-50 p-2 mt-2 fw-bold">الحق قبل نفاذ {{ $count }} قطعة</p>
                        @else
                              <p class="selling text-center w-50 p-2 mt-2 fw-bold"> متوفر {{ $count }} قطعة </p>
                        @endif


                            <p class="mt-3"> <i class="fa-solid fa-location-dot"></i> <strong>بلد الصنع</strong> : مصر
                            </p>
                        </div>

                        @if ($count == 0)
                        @elseif ($count < 4)
                            <div class="d-flex justify-content-center mb-4 mt-4">
                                <div class="quantity-shopping-order-2 d-flex ms-2  align-items-center">
                                    <button id="plus" class="btns-plus">+</button><input id="num-counter"
                                        type="text" class="input-shopping" value="1"><button id="minus"
                                        class="btns-plus">-</button>
                                </div>
                                <div>
                                    <button class="add-cart ">أضف الى العربه</button>
                                </div>
                                <div class="me-2">
                                    <button class="add-cart-2 "> الشراء الان</button>
                                </div>
                            </div>
                        @else
                         <div class="d-flex justify-content-center mb-4 mt-4">
                                <div class="quantity-shopping-order-2 ms-2 d-flex align-items-center">
                                    <button id="plus" class="btns-plus">+</button><input id="num-counter"
                                        type="text" class="input-shopping" value="1"><button id="minus"
                                        class="btns-plus">-</button>
                                </div>
                                <div>
                                    <button class="add-cart ">أضف الى العربه</button>
                                </div>
                                <div class="me-2">
                                    <button class="add-cart-2 "> الشراء الان</button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-xl-4">

                    <div class="swiper mySwiper-2">
                        <div class="swiper-wrapper mb-5">
                            @foreach ($product->sub_prices as $item)
                                <div class="swiper-slide">
                                    <div class="package">
                                        <h1>اشتري هذا المنتج {{ $item->price }} ج
                                            عند الاشتراك في باقة </h1>
                                        <div class="">
                                            <div class="package-photo mb-3">
                                                <img src="{{ asset('img/subscription/' . $item->subscription->img) }}"
                                                    alt="">
                                            </div>
                                            <div class="package-title text-center">
                                                <h4 class="fs-5"> {{ $item->subscription->name_ar }}</h4>
                                                <p><span>{{ $item->subscription->amount_money }} EGP</span>/اسبوع</p>
                                            </div>
                                        </div>
                                        <ul>
                                            <li><i class="fa-solid fa-circle-check"></i>الباقة متاحة لمدة
                                                <span>اسبوع</span> فقط
                                            </li>
                                            <li><i class="fa-solid fa-circle-check"></i>تقدر تشتري بتوفير لحد
                                                <span>{{ $item->subscription->limited_cost }} ج</span>
                                            </li>
                                            <li><i class="fa-solid fa-circle-check"></i>وفر حتى
                                                <span>{{ $item->subscription->limited_cost }}ج</span>
                                            </li>
                                        </ul>
                                        <a href="{{ route('client.subscriptionWebsite.show', $item->subscription->slug_en) }}"
                                            type="button"
                                            class=" bt-new p-2 d-flex justify-content-center align-items-center">تفاصيل
                                            الباقة</a>
                                    </div>
                                </div>
                            @endforeach




                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    {{-- <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mySlides">
                        <img src="{{ asset('img/products/' . $product->cover_image) }}" style="width:100%">
                    </div>
                    @foreach ($product->Productimg as $img)
                        <div class="mySlides">
                            <img src="{{ asset('img/products/' . $img->name_img) }}" style="width:100%">
                        </div>
                    @endforeach

                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                    <div class="row group-miniphoto">
                        <div class="col-3 mini-photo">
                            <img src="{{ asset('img/products/' . $product->cover_image) }}"
                                onclick="currentSlide(1)"style="width:100%">
                        </div>
                        @foreach ($product->Productimg as $img)
                            <div class="col-3 mini-photo">
                                <img class="demo cursor" src="{{ asset('img/products/' . $img->name_img) }}"
                                    style="width:100%" onclick="currentSlide(1)" alt="The Woods">
                            </div>
                        @endforeach

                    </div>

                </div>
                <div class="col-lg-4">




                    <div class="info-product p-4">
                        <div class="d-flex justify-content-between">
                            <h1>{{ $product->name_ar }}</h1>
                            <i class="fa-regular fa-bookmark fa-2x"></i>
                        </div>
                        <p style="  color:#817A7A;">كيس ارز الضحى وزن 5 كيلو جرام معبأ اليا ومن انقى انوع الارز</p>

                        <div>
                            3.6 <i class="fas fa-star" style="color: #dddcdc;"></i><i class="fas fa-star"
                                style="color:#dddcdc;"></i><i class="fas fa-star" style="color:#F67F00 ;"></i><i
                                class="fas fa-star" style="color:#F67F00 ;"></i><i class="fas fa-star"
                                style="color:#F67F00 ;"></i>
                        </div>
                        <div class="mt-3">
                            <span
                                style="  color:#1D2C77; font-weight: bold; font-size: 20px;">{{ $product->orginal_price + $product->tax }}
                                EGP</span>
                            <span style="  color:#817A7A;">(شامل قيمة الضربية)</span>
                        </div>
                        <p class="selling text-center w-50 p-2 mt-2">الأكثر مبيعا</p>
                        <p class="selling2 p-3"><i style="color:#F67F00; margin-left: 5px;"
                                class="fa-solid fa-truck-fast"></i>إحصل
                            عليها خلال السبت ١٢ م - ٣ م التوصيل المجاني </p>

                        @if ($count == 0)
                            <div class="d-flex justify-content-between">

                                <p class="selling text-center w-50 p-2 mt-2 fw-bold">
                                    هذة المنتج غير متوفر بل المخزن
                                </p>
                                <p class="mt-3"> <i class="fa-solid fa-location-dot"></i> <strong>بلد الصنع</strong> : مصر
                                </p>
                            </div>
                        @elseif ($count < 4)
                            <div class="d-flex justify-content-between">
                                <p class="selling text-center w-50 p-2 mt-2 fw-bold">
                                    يوجد عدد {{ $count }} قطعة الحق قبل نفاذ الكميلة
                                </p>
                                <p class="mt-3"> <i class="fa-solid fa-location-dot"></i> <strong>بلد الصنع</strong> : مصر
                                </p>

                            </div>
                            <form action="{{ route('client.add-to-card.store') }}" method="post">
                                @csrf

                                <div class="d-flex justify-content-between mb-4 mt-4">
                                    <div class="quantity-shopping-order-2 d-flex  align-items-center">
                                        <button type="button" id="plus" class="btns-plus">+</button><input
                                            id="num-counter" type="text" class="input-shopping" value="1"><button
                                            type="button" id="minus" class="btns-plus">-</button>
                                    </div>
                                    <div>
                                        <input type="hidden" value="{{ $product->slug_en }}" name="slug">
                                        <button class="add-cart" type="submit">أضف الى العربه</button>
                                    </div>

                                    <div>
                            </form>

                            <button class="add-cart-2 "> الشراء الان</button>
                    </div>
                </div>
            @else
                <div class="d-flex justify-content-between">
                    <p class="selling text-center w-50 p-2 mt-2 fw-bold">
                        متوفر
                        {{ $count }}
                        قطعة
                    </p>
                    <p class="mt-3"> <i class="fa-solid fa-location-dot"></i> <strong>بلد الصنع</strong> : مصر
                    </p>

                </div>

                <form action="{{ route('client.add-to-card.store') }}" method="post">
                    @csrf

                    <div class="d-flex justify-content-between mb-4 mt-4">
                        <div class="quantity-shopping-order-2 d-flex  align-items-center">
                            <button type="button" id="plus" class="btns-plus">+</button><input id="num-counter"
                                type="text" class="input-shopping" value="1"><button type="button" id="minus"
                                class="btns-plus">-</button>
                        </div>
                        <div>
                            <input type="hidden" value="{{ $product->slug_en }}" name="slug">
                            <button class="add-cart" type="submit">أضف الى العربه</button>
                        </div>

                        <div>
                </form>
                <button class="add-cart-2 "> الشراء الان</button>

            </div>
        </div>
        @endif --}}

    </div>
    </div>
    {{-- <div class="col-lg-4">
        @foreach ($product->sub_prices as $item)
            <div class="package">
                <h1>اشتري هذا المنتج {{ $item->price }} ج
                    عند الاشتراك في باقة </h1>
                <div class="">
                    <div class="package-photo">
                        <img src="{{ asset('img/subscription/' . $item->subscription->img) }}" alt="">
                    </div>
                    <div class="package-title text-center">
                        <h4 class="fs-5  mt-3">{{ $item->subscription->name_ar }}</h4>
                        <p><span>{{ $item->subscription->amount_money }} EGP</span></p>
                    </div>
                </div>
                <ul class="me-4 mb-4">
                    <li><i class="fa-solid fa-circle-check"></i>الباقة متاحة لمدة <span>اسبوع</span> فقط</li>
                    <li><i class="fa-solid fa-circle-check"></i>تقدر تشتري بتوفير لحد
                        <span>{{ $item->subscription->limited_cost }} ج</span>
                    </li>
                    <li><i class="fa-solid fa-circle-check"></i>وفر حتى
                        <span>{{ $item->subscription->limited_cost }}ج</span>
                    </li>
                </ul>
                <a href="{{ route('client.subscriptionWebsite.show', $item->subscription->slug_en) }}" type="button"
                    class=" bt-new p-2 d-flex justify-content-center align-items-center">تفاصيل
                    الباقة</a>
            </div>
        @endforeach

    </div> --}}
    </div>
    </div>
    </div>
    <div class="dis-product mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-md-6">
                    <div class="description pe-5">
                        <h3 class="fw-bold fs-5">اهم المميزات</h3>
                        {{-- <ul>
                                <li>It is low in saturated fat and is beneficial for heart health</li>
                                <li>It is low in saturated fat and is beneficial for heart health</li>
                                <li>It is low in saturated fat and is beneficial for heart health</li>
                            </ul> --}}
                        <p class="text-break">
                            {{ $product->description_ar }}
                        </p>
                        {{-- <h3 class="fw-bold fs-5">المكونات</h3>
                            <p>Refined Edible Sunflower Oil</p>
                            <h3 class="fw-bold fs-5">المكونات</h3>
                            <p>Refined Edible Sunflower Oil</p> --}}
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 m-auto">
                    <div class="best-client p-3">
                        <h2 class="text-center fs-6  fw-bold">معلومات البائع</h2>
                        <div class="d-flex justify-content-start mt-6">
                            <img class="ms-2" src="{{asset('image/col-md-5.png')}}" alt="">
                            <div class="pt-2 pe-2">
                                 <h3 class="fs-5">محمود احمد</h3>
                                3.6 <i class="fas fa-star" style="color: #dddcdc;"></i><i class="fas fa-star"
                                    style="color:#dddcdc;"></i><i class="fas fa-star" style="color:#F67F00 ;"></i><i
                                    class="fas fa-star" style="color:#F67F00 ;"></i><i class="fas fa-star"
                                    style="color:#F67F00 ;"></i>
                            </div>
                        </div>
                        <hr width="100%">
                        <h3 class="fw-bold">افضل البائعين</h3>
                        <div class="d-flex mt-3 text-center justify-content-between">
                            <div>
                                <img  src="{{asset('image/col-md-5.png')}}" alt="">
                                <p>احمد محمد</p>
                            </div>
                            <div>
                                <img src="{{asset('image/col-md-5.png')}}" alt="">
                                <p>احمد محمد</p>
                            </div>
                            <div>
                                <img  src="{{asset('image/col-md-5.png')}}"alt="">
                                <p>احمد محمد</p>
                            </div>
                            <div>
                                <img  src="{{asset('image/col-md-5.png')}}" alt="">
                                <p>احمد محمد</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




<div class="container-fluid px-5 pt-5">
          <div class="row">
                <div class="d-flex justify-content-between">
                  <h3 class="fw-bold fs-5">منتجات أخرى من شركة {{ $product->brand->name_ar }}</h3>

                    <a href="{{ route('brands', $product->brand->slug_en) }}">

                       <button class="btn btn-foot w-auto"> عرض المزيد</button>
                    </a>
              </div>
              <div class="col-12 col-md-3 col-xl-2">
                <div class="photo-brand" style="background-image:url({{ asset('img/brands/'. $product->brand->cover_img ) }})">

                </div>
              </div>
              <div class="col-12 col-md-9 col-xl-10">
                <div class="swiper mySwiper-4">
                  <div class="swiper-wrapper mb-5 ">
                    @foreach ($product_barand as $item )
                        <div class="swiper-slide">
                      <div class="product-swiper">
                        <span class="p-2">وفر 15 ج</span>
                        <div class="product-image">
                         <a href="{{ route('products.show', $item->slug_en) }}">
                                            <img style='object-fit: contain;'
                                                src="{{ asset('img/products/' . $item->cover_image) }}" alt="">
                                        </a>
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
                    @endforeach
                  </div>
                  <div class="swiper-pagination"></div>
                </div>
              </div>
         </div>
    </div>

    <div class="container-fluid p-5">
        <div class="row">
            <div class="d-flex justify-content-between">
                <h3 class="fw-bold fs-5"> الأكثر مبيعا في السوبر ماركت</h3>
                <button class="btn btn-foot w-auto "> عرض المزيد</button>
            </div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper mb-5">

                    @foreach ($products as $item )
                        <div class="swiper-slide">
                        <div class="product-swiper">
                            <span class="p-2">وفر 15 ج</span>
                            <div class="product-image">
                                <a href="{{ route('products.show', $item->slug_en) }}">
                                            <img style="object-fit: contain;"
                                                src="{{ asset('img/products/' . $item->cover_image) }}" alt="">
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
                                    <p class="price">4.50 EGP</p>
                                    <p class="dis-count">5.00 EGP</p>
                                </div>
                                <div>
                                    <button class="ms-2 btn-save"><i class="fa-regular fa-bookmark"></i></button>
                                    <button class="p-2 add-cart" type="button">أضف <i
                                            class="fa-solid fa-cart-shopping"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="saller-banner box-shadow mt-5 pt-5">
            <div class="text-center">
                <h1>بيع أكتر وأكسب أكتر</h1>
                <p>ابدأ البيع دلوقتي على ريتشي مارت</p>
                <button class="p-2 btn3">سجل دلوقتي</button>
            </div>
        </div>

        <section class="sub-scribe box-shadow mt-5">
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
        </section>
    </div>




@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


    {{-- <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("demo");
            let captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            // dots[slideIndex - 1].className += "active";
            //captionText.innerHTML = dots[slideIndex-1].alt;
        };

        $("#plus").click(function() {
            var count = $('#num-counter').val();
            if ({{ $count }} > count) {
                count++
            } else {
                $("#num-counter").val(count);
            }
        });

        $("#minus").click(function() {
            var count = $('#num-counter').val();
            if (count < 0) {
                count = 0;
                $("#num-counter").val(count);
            } else {
                count--;
                $("#num-counter").val(count);
            }
        });
        $("#plus").click(function() {
            var count = $('#num-counter').val();
            if ({{ $count }} > count) {
                count++;
                $("#num-counter").val(count);
            }
        });

        $("#minus").click(function() {
            var count = $('#num-counter').val();
            if (count <= 1) {
                count = 1;
                $("#num-counter").val(count);
            } else {
                count--;
                $("#num-counter").val(count);
            }
        });
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 2,
            loop: true,
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
    </script> --}}
    <script>
        function save(el){   
            el.classList.toggle("save_wishList");
        
        }
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 2,
            loop: true,
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

        $("#plus").click(function() {
            var count = $('#num-counter').val();
            if({{ $count }} > count){
                count++;
            }
            $("#num-counter").val(count);
        });

        $("#minus").click(function() {
            var count = $('#num-counter').val();
            if (count <= 1) {
                count = 1;
                $("#num-counter").val(count);
            } else {
                count--;
                $("#num-counter").val(count);
            }
        });
        var swiper = new Swiper(".mySwiper-2", {
            slidesPerView: 2,
            loop: true,
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
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                750: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                1424: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
            },

        });
        var swiper = new Swiper(".mySwiper-3", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
         var swiper = new Swiper(".mySwiper-4", {
         slidesPerView: 2,
         loop: true,
         spaceBetween: 30,
         showsPagination: true,
         autoplay: {
        delay: 2500,
        disableOnInteraction: false,
        },
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
            slidesPerView: 2,
             spaceBetween: 30,
           },
           750: {
            slidesPerView: 2,
             spaceBetween: 20,
           },
           1024: {
            slidesPerView: 3,
             spaceBetween: 20,
           },
           1424: {
            slidesPerView: 4,
             spaceBetween: 20,
           },
         },

       });
    </script>

@endsection
