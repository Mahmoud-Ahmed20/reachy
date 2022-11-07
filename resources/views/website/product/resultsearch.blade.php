@extends('website/layouts.master_top')

@section('title', 'Pain Cure | Dr. Amr Saeed for back pain treatment | دكتور عمرو سعيد لعلاج الالم')

<!-- css insert -->
@section('css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

@endsection
<!-- content insert -->
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 mt-4 ">
                <div class="cat-check ">
                    <!-- Remove 'active' class, this is just to show in Codepen thumbnail -->
                    <div class="select-menu  active">
                        <div class="select-btn">
                            <span class="fw-bold">تصنيفات</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="options p-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    checked>
                                <label class="form-check-label fs-7 mb-3" for="flexCheckDefault">
                                    السوبر ماركت (5232)
                                </label>
                            </div>
                            <div class="form-check">
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
                                <label class="form-check-label fs-7 mb-2" for="flexCheckDefault">
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
                            </div>
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
                            <input type="range" min="100" max="500" value="100" id="lower">
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

            </div>
            <div class="col-lg-9 mt-4">
                <div class=" mt-4">
                    <div class="d-flex justify-content-between ">
                        <div class="market fw-bold">
                            <p class="fs-5">نتائج البحث لـ " {{ $search_query }} "</p>
                        </div>
                        <div class="d-flex market align-items-lg-baseline">
                            <p class=" fw-bold"> فرز حسب :</p>
                            <div class="dropdown latest">
                                <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    الاكثر تطابقا
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
                <div class="over1">
                    <div class="row">
                        @if ($product->isEmpty())
                            <div class="no-found text-center ">
                                <div class="m-auto">
                                    <h2 class="mb-4">"المنتج غير متوفر"</h2>
                                    <a href="">منتجات ذات صلة / بديلة</a>
                                    <br>
                                    <button class="border-15 mt-2">اخبرنى عندما يتوفر</button>
                                </div>
                            </div>
                        @else
                            @foreach ($product as $item)
                                <div class="col-xxl-3 col-xl-4 col-md-4 col-sm-6">

                                    <div class="product-swiper">

                                        <span class="p-2">وفر 15 ج</span>
                                        <div class="product-image">
                                            <img style="height: 135px"
                                                src="{{ asset('img/products/' . $item->cover_image) }}" alt="">
                                        </div>
                                        <p>لبن</p>
                                        <a href="{{ route('products.show', $item->slug_en) }}">{{ $item->name_ar }}</a>
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
                                                <p class="price">{{ $item->orginal_price }}EGP</p>
                                                {{-- <p class="dis-count">{{ $item->sub_prices->price }} EGP</p> --}}
                                            </div>
                                            <div>
                                                {{-- @if ($item->id == $item->WashList->product_id)
                                                <a href="{{ route('client.profile') }}" class="ms-2 btn-save"><i
                                                        class="fa-solid fa-bookmark"></i></a>
                                            @else
                                                <form action="{{ route('client.wash-lists.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $item->slug_en }}">
                                                    <button type="submit" class="ms-2 btn-save"><i
                                                            class="fa-regular fa-bookmark"></i></button>
                                                </form>
                                            @endif --}}

                                                {{-- <a href="" class="ms-2 btn-save update_wishlist"><i
                                                    class="fa-regular fa-bookmark"></i></a>
                                            <button class="p-2 add-cart" type="button">أضف <i
                                                    class="fa-solid fa-cart-shopping"></i></button> --}}

                                                {{-- @foreach ($item->WashList as $list)
                                                @if ($item->id == $list->product_id)
                                                    <button class="ms-2 btn-save wishlist-delete"
                                                        data-wishlist_id="{{ $list->id }}"><i
                                                            class="fa-solid fa-bookmark"></i></button>
                                                @else
                                                    <button class="ms-2 btn-save update_wishlist"
                                                        data-product_slug="{{ $item->slug_en }}"><i
                                                            class="fareg-ular fa-bookmark"></i></button>
                                                @endif
                                            @endforeach --}}

                                                <button class="ms-2 btn-save update_wishlist"
                                                    data-product_slug="{{ $item->slug_en }}"><i
                                                        class="fa-regular fa-bookmark"></i></button>

                                                <button class="p-2 add-cart" type="button">أضف <i
                                                        class="fa-solid fa-cart-shopping"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @endif




                    </div>
                </div>
            </div>
        </div>

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
