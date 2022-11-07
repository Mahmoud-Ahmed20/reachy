@extends('website/layouts.master_top')

@section('title', 'Pain Cure')

<!-- css insert -->
@section('css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

@endsection
<!-- content insert -->
@section('content')

    <div class="container-fluid">
        <div class="row">
                    <div class="col-lg-3 mt-4 ">
                  <div class="cat-check">
                    <!-- Remove 'active' class, this is just to show in Codepen thumbnail -->
                        <div class="select-menu  active">
                            <div class="select-btn">
                              <span class="fw-bold">{{ $main_categorys->name_ar }}</span>
                              <i class="fa-solid fa-chevron-down"></i>
                            </div>
                        <div class="options p-3">
                        @foreach ($main_categorys->subCategory as $item )
                             <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="flexCheckDefault" >
                                <label class="form-check-label fs-7 mb-3 me-4" for="flexCheckDefault">
                                   {{ $item->name_ar }}
                                </label>
                              </div>
                        @endforeach

                                {{--  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label fs-7 mb-2" for="flexCheckDefault">
                                        مكونات الطبخ (732)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label fs-7 mb-2" for="flexCheckDefault">
                                        كيك و بسكويت وكراكرز (515)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label fs-7 mb-2"  for="flexCheckDefault">
                                        الشوكولاتة و حلويات (447)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label fs-7 mb-2" for="flexCheckDefault">
                                        الأغذية المعلبة والمغلفة (391)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label fs-7 mb-2" for="flexCheckDefault">
                                        السكر و مستلزمات الخبز (307)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label fs-7 mb-2" for="flexCheckDefault">
                                        المربي و العسل و الأطعمة
                                        القابلة للدهن (247)
                                    </label>
                                </div>  --}}
                        </div>
                        </div>
                  </div>
                    <div class="wrapper box-shadow">
                      <h2 class="fs-5 fw-bold">تسوق حسب السعر</h2>
                          <fieldset class="filter-price mt-4">
                            <div class="price-wrap d-flex justify-content-between">
                              <div class="price-wrap-1 p-2">
                                <input class="fw-bold" id="one">
                                <label for="one" class="blackcolor fw-bold">جنية</label>
                              </div>
                              <div class="price-wrap-2 p-2">
                                <input class="fw-bold" id="two">
                                <label for="two" class="blackcolor fw-bold">جنية</label>
                              </div>
                            </div>
                            <div class="price-field">
                              <input type="range"  min="100" max="500" value="100" id="lower">
                              <input type="range" min="100" max="500" value="500" id="upper">
                            </div>
                          </fieldset>
                          <button class="bt-filter">بحث</button>
                    </div>
                    <div class="box-shadow text-center mt-4 p-4">
                      <h2 class="fs-5 mb-4 fw-bold">تسوق حسب بلد الصنع</h2>

                      <select class="js-example-basic-single border-radius form-control">
                        <option selected="selected">مصر </option>
                        <option>قاهرة</option>
                        <option>قاهرة</option>
                        <option>قاهرة</option>
                      </select>
                      <button class="btns  mt-3">بحث</button>
                    </div>
                    <div class="box-shadow text-center mt-4 p-4">
                      <h2 class="fs-5 mb-4 fw-bold">تسوق حسب  البراند</h2>
                      <select class="js-example-basic-single border-radius form-control">
                        <option selected="selected"> برجاء ادخال اسم البراند </option>
                        @foreach ($brands as $item )
                          <option value="{{ $item->id }}">{{ $item->name_ar }}</option>
                        @endforeach
                      </select>
                      <button class="btns  mt-3">بحث</button>
                    </div>

                </div>
             <div class="col-lg-9 mt-4">
                          <div class="back-gift-filter">
                            <div class="title-order-2 pt-5 pe-5">
                                <h2>اشترك دلوقتي في الباقة الفضية</h2>
                                <p>وهتوفر لحد 1250 جنيه على مشترياتك</p>
                                <button class="btns">تسوق الان</button>
                            </div>
                        </div>
                          <div class=" mt-4">
                            <div class="d-flex justify-content-between ">
                                    <p class="fs-5 fw-bold mt-1"> {{ $main_categorys->name_ar }}</p>
                                <div class="d-flex market align-items-center">
                                      <p class="fw-bold fs-7 mt-2"> فرز بواسطة :  </p>
                                      <div class="dropdown latest">
                                        <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        الاحداث
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                          <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                          <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                        </ul>
                                      </div>

                                      <div class="dropdown latest">
                                        <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          الاقل سعر
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                          <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                          <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                        </ul>
                                      </div>

                                </div>

                            </div>
                        </div>

                    @if ($main_categorys->product->isEmpty())
                        <div class="d-flex justify-content-center align-items-center h-50">
                            <h2>لا يوجد منتجات في هذا التصنيف</h2>
                        <div>
                      @else
                        <div class="over1">
                                <div class="row">
                                @foreach ($main_categorys->product as $item )
                                    <div class="col-xxl-3 col-xl-4 col-md-4 col-sm-6 ">
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
                                         {{--  <p class="price ps-2">{{ $item->price }}EGP</p>  --}}
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
                    @endif

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
                <div class="swiper-wrapper ">
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

    <script>
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
    </script>

@endsection
