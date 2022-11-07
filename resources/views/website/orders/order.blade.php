@extends('website.layouts.master')

@section('title', 'Orders')

<!-- css insert -->
@section('css')

    <link rel="stylesheet" href="{{ asset('css/jquery.bootstrap-touchspin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <link rel="stylesheet" href="{{ URL::asset('css/input-tel.css') }}">
    <style>
        .hr-process{
            margin-top:33px;
        }
    </style>

@endsection
@section('content')

    <div class="form-wizard">
        <div class="steps">
            <ul>
                <li>
                    <p class="titel-process me-1 mt-3">عربة التسوق</p>
                    <span><i class="fa-solid fa-cart-shopping"></i></span>
                </li>
                <li>
                    <p class="titel-process me-1 mt-3">معلومات الشحن والتوصيل</p>
                    <span><i class="fa-solid fa-truck"></i></span>
                </li>
                <li>
                    <p class="titel-process me-1 mt-3">الدفع</p>
                    <span><i class="fa-solid fa-id-card"></i></span>
                </li>
                <li>
                    <p class="titel-process me-1 mt-3">تم</p>
                    <span><i class="fa-solid fa-check"></i></span>
                </li>
            </ul>
        </div>
        <form action="{{ route('client.order') }}" method="post">
            @csrf
            <div class="container-fluid">
                <div class="form-container">

                    <!-- content -->
                    <div class="form-group text-center position-relative mar-b-0">
                        <input type="button" value="التالى" class="btn btn-primary position-absolute next" />
                    </div>
                    <hr class="hr-process"/>

                    <div class="row">
                        <div class="col-xl-6 mt-3">
                            <div class="">
                                <h2 class="fw-bold fs-5">تفاصيل الطلب</h2>
                                <p class="text-grey fs-7">
                                    لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                    العميل ليتصور طريقه لوريم ايبسوم هو نموذج افتراضي يوضع في
                                    التصاميم لتعرض على العميل ليتصور وضع النصوص بالتصاميم سواء
                                    كانت
                                </p>
                            </div>
                            <div class="groub-cart-product box-shadow p-4 fw-bold">
                                @foreach ($product as $item)
                                    {{-- <div class="row align-items-center justify-content-around">
                                        <div class="col-4 col-md-3 pe-0">
                                            <img src="{{ URL::asset('img/products/' . $item->cover_image) }}"
                                                alt="" />
                                        </div>
                                        <div class="col-4 col-md-3">

                                            <h6 class="fw-bold"> {{ $item->name_en }}</h6>
                                            <p class="fs-7  text-grey fw-light">
                                                {{ $item->name_ar }}
                                            </p>


                                            @php $count = $item->seller_stocks->sum('quantity') @endphp
                                            {{ $count }}


                                            <input type="hidden" name="product_id[]" value="{{ $item->id }}">
                                            <!-- <h6 class="fw-light text-dark fs-7"> اللون<span class="fw-bold "> اسود</span></h6> -->
                                        </div>
                                        <div class="col-2 col-md-2 number-prodact-orders text-center">
                                            <p class="mt-1 fs-6">
                                                <input type="text" class="price"
                                                    value="{{ $item->orginal_price + $item->tax }}" name="price[]">

                                            </p>

                                        </div>
                                        <div class="col-2 col-md-3  text-center d-flex flex-row-reverse align-items-center">
                                            <input id="demo3" type="text" value="1" name="qunt[]"
                                                class="w-50 text-center">

                                        </div>

                                    </div> --}}
                                    <div class="groub-cart-product p-4 fw-bold" style="border-radius: 15px">
                                        <div class="row align-items-center justify-content-around">
                                            <div class="col-6 col-md-3 pe-0">
                                                <img src="{{ URL::asset('img/products/' . $item->cover_image) }}"
                                                    alt="" />
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <h6 class="fw-bold">{{ $item->name_ar }}</h6>
                                                <p class="fs-7  text-grey fw-light">
                                                    لبن جهينة ميكس بالفراولة - 200 مل
                                                </p>
                                                <h6 class="fw-light fs-7">
                                                    المقاس:<span class="fw-bold ms-2"> كبير</span> اللون:<span
                                                        class="fw-bold">
                                                        اسود</span>
                                                </h6>
                                                <input type="hidden" name="product_id[]" value="{{ $item->id }}">
                                                @php $count = $item->seller_stocks->sum('quantity') @endphp

                                            </div>
                                            <div class="col-3 col-md-1 number-prodact-orders text-center">
                                                <p class="mt-1 fs-6">
                                                    82 L.E<span class="mt-2">82 L.E</span>
                                                </p>
                                            </div>
                                            <div class="col-6 col-md-3 text-center d-flex flex-row-reverse align-items-center">
                                                <input id="demo3" type="text" value="1" name="qunt[]"
                                                    style="margin-bottom: 0px !important; padding:0px !important; margin-top:0px !important; height:36px  !important ;border:0px"

                                                    class="w-50 text-center">
                                            </div>
                                            <div class="col-6 col-md-1 text-center d-flex flex-row-reverse align-items-center">
                                                <button class="btn btn-trash"><i class="fa-solid fa-trash"></i></button>
                                            </div>
                                        </div>
                                        <hr />
                                    </div>
                                    
                                @endforeach

                            </div>
                            <div class="mt-3 terms d-flex">
                                <p class="d-inline me-3 mb-2">
                                    أوافق على استبدال منتجات البقالة بمنتجات مماثلة
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input me-3" style="float:right !important; " type="radio" name="inlineRadioOptions"
                                        id="inlineRadio1" value="option1"  />
                                    <label class="form-check-label me-5" for="inlineRadio1">نعم</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input"style="float:right !important;" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio2" value="option2" />
                                    <label class="form-check-label me-4" for="inlineRadio2">لا</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 mt-1">
                            <div class="row">
                                <div class="d-flex justify-content-between m-auto mt-2 mb-3">
                                    <div class="text-end description">
                                        <h6 class="fw-bold fs-5">
                                            وفر في توتال الفاتورة بقيمة 43 ج عند الاشتراك في الباقة
                                            الفضية
                                        </h6>
                                        <p class="text-grey fs-7">
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                            العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم
                                            مطبوعه ... بروشور او فلاير على سبيل المثال
                                        </p>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn-foot p-2" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalLg">
                                            عرض الك
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="details">

                                
                                <div class="form-check active p-3 mb-3">
                                  <label class="form-check-label" for="flexRadioDefault">
                                        <div class="d-flex justify-content-between me-4 mt-1">
                                              <div>
                                    <input class="form-check-input" style="float:right !important;" type="radio" name="flexRadioDefault" id="flexRadioDefault">
                                   <h6 class="me-4">الباقة الفضية</h6> </div>
                                            <div class="price-2">
                                                <p><span class="fw-bold">142 EGP</span> / اسبوع</p>
                                            </div>
                                        </div>
                                      
                                        <div class="d-flex justify-content-between me-4 mt-1">
                                        <p>
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                            العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم
                                            مطبوعه ... بروشور او فلاير على سبيل المثال .ت
                                        </p>
                                        </div>
                                       
                                    </label>
                                </div>
                                <div class="form-check active p-3 mb-3">
                                  <label class="form-check-label" for="flexRadioDefault2">
                                        <div class="d-flex justify-content-between me-4 mt-1">
                                              <div>
                                    <input class="form-check-input" style="float:right !important;" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                   <h6 class="me-4">الباقة الفضية</h6> </div>
                                            <div class="price-2">
                                                <p><span class="fw-bold">142 EGP</span> / اسبوع</p>
                                            </div>
                                        </div>
                                      
                                        <div class="d-flex justify-content-between me-4 mt-1">
                                        <p>
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                            العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم
                                            مطبوعه ... بروشور او فلاير على سبيل المثال .ت
                                        </p>
                                        </div>
                                       
                                    </label>
                                </div>
                            <div class="form-check active p-3 mb-3">
                                <label class="form-check-label" for="flexRadioDefault3">
                                        <div class="d-flex justify-content-between me-4 mt-1">
                                              <div>
                                    <input class="form-check-input" style="float:right !important;" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                   <h6 class="me-4">الباقة الفضية</h6> </div>
                                            <div class="price-2">
                                                <p><span class="fw-bold">142 EGP</span> / اسبوع</p>
                                            </div>
                                        </div>
                                      
                                        <div class="d-flex justify-content-between me-4 mt-1">
                                        <p>
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                            العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم
                                            مطبوعه ... بروشور او فلاير على سبيل المثال .ت
                                        </p>
                                        </div>
                                       
                                    </label>
                                </div>

                            </div>

                            <div class="d-flex justify-content-between flex-wrap">
                                <div class=" col-12 col-xl-5">
                                    <div class="price-total mb-3">

                                        <p class="mt-3 fw-bold">التكلفة الكلية 142 EGP</p>

                                    </div>
                                </div>
                                <div class=" col-12 col-xl-5">
                                    <div class="Promo-Code d-flex">
                                        <label class="form-check-label Promo-Code-label ms-3">
                                            <i class="fa-solid fa-right-long"></i>
                                        </label>
                                        <input type="text" class="Promo-Code-input text-start w-100 ps-2"
                                            placeholder="Promo Code" name="" id=""
                                            date-text="Promo Code">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>


                    <!-- end content-->
                </div>
                <div class="form-container">
                    <div class="form-group text-center position-relative mar-b-0">
                        <input type="button" value="التالى" class="btn btn-primary position-absolute next" />
                        <input type="button" value="السابق" class="btn btn-primary position-absolute prev back" />

                        {{-- <i class="fa-solid fa-right-long back position-absolute"></i> --}}
                    </div>
                    <hr class="hr-process"/>
                    <div class="row">
                        <div class="col-xl-6 col-md-6 p-3 offset-md-2">
                            <div class="">
                                <h3 class="fw-bold fs-5">معلومات الشحن والتوصيل</h3>
                                <p class="text-grey">
                                    ميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل
                                    المثال ... او نماذج مواقع انترنت ...
                                </p>
                            </div>


                            <div class="col-12 col-md-6 me-1">
                                {{-- <input type="date" class="input-data border-radius" name="deliverd_date"
                                    id="" /> --}}

                                <div class="time mt-3 border-radius">
                                    <p class="pt-2 fw-bold">
                                                3/11/2022 <i class="fa-regular fa-calendar me-2"></i>
                                    </p>
                                </div>
                                <div class="time mt-3 border-radius">
                                    <p class="pt-2 fw-bold fs-7">
                                        المواعيد المتاحة للتسليم 3-6 مساء 6-9 مساء
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-4 row p-0 mt-3 justify-content-end">

                            <div class="mt-2 p-2 border-radius send-gift col-12 col-md-12 mb-2">
                                <label class="form-check-label ms-2" for="send-gift-redio">
                                    <i class="fa-solid fa-gift"></i> ارسال كهدية
                                </label>
                                <input type="checkbox" class="form-check-input" name="gift" id="send-gift-redio" />
                            </div>
                            <div class="content-address">

                                    @if ($favorite_address == null)
                                         <h2>لا يوجد بيانات</h2>
                                    @else
                                    <div id="favorite-id{{ $favorite_address->id }}">

                                        <h2 class="fs-5">
                                        {{ $favorite_address->name_street }}
                                    </h2>
                                    <h6>{{ $favorite_address->country->name_ar . ' . ' . $favorite_address->city->name_ar . ' . ' . $favorite_address->region->name_ar }}
                                    </h6>
                                    <p>
                                        {{ $favorite_address->address_details }}
                                    </p>
                                    </div>
                                    @endif

                                <a class="delete-conf" style="cursor: pointer;" title="delete"
                                    data-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#delete1">
                                    اضافة عنوان
                                </a>
                                <div class="modal fade" id="delete1" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content  b-r-s-cont border-0">

                                            <div class="modal-header">
                                                <div class="modal-title" id="exampleModalLabel">
                                                    اضافة العنوان </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <!-- Modal content -->
                                            <div class="modal-body px-4">
                                                <div class="modal-body  text-center py-0">
                                                    <div class="row">


                                                        <div class="row">
                                                            <div class="col">
                                                                <select name="country_id" id="country_id"
                                                                    class="form-select w-100"
                                                                    aria-label="Default select example">
                                                                    <option selected> البلد </option>

                                                                    @foreach ($country as $iteam)
                                                                        <option value="{{ $iteam->id }}">
                                                                            {{ $iteam->name_ar }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('country')
                                                                    <span class="error-msg-form">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col">
                                                                <select name="city_id" id='city_id'
                                                                    class="form-select w-100"
                                                                    aria-label="Default select example">
                                                                    <option selected> المدينة </option>

                                                                    @foreach ($city as $iteam)
                                                                        <option value="{{ $iteam->id }}">
                                                                            {{ $iteam->name_ar }}</option>
                                                                    @endforeach
                                                                </select>

                                                                @error('city_id')
                                                                    <span class="error-msg-form">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <select  id="region_id"
                                                                    class="form-select w-100 mt-4"
                                                                    aria-label="Default select example">
                                                                    <option selected> المنطقة </option>

                                                                    @foreach ($region as $iteam)
                                                                        <option value="{{ $iteam->id }}">
                                                                            {{ $iteam->name_ar }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('region_id')
                                                                    <span class="error-msg-form">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" name="name_street" id="name_street"
                                                                    class="form-control" placeholder="اسم الشارع"
                                                                    aria-label="Last name">
                                                                @error('name_street')
                                                                    <span class="error-msg-form">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="number" name="building_number"
                                                                    id="building_number" class="form-control"
                                                                    placeholder="رقم الدور" aria-label="First name">
                                                                @error('building_number')
                                                                    <span class="error-msg-form">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col">
                                                                <input type="number" name="apartment_number"
                                                                    id="apartment_number" class="form-control"
                                                                    placeholder="رقم الشقة" aria-label="Last name">
                                                                @error('apartment_number')
                                                                    <span class="error-msg-form">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">

                                                                <textarea name="address_details" id="address_details" rows="5" placeholder="العنوان بالتفصيل"
                                                                    class="form-control" style="height: 115px;"></textarea>
                                                                {{-- <input type="text" class="form-control" placeholder="العنوان بالتفصيل"> --}}
                                                                @error('address_details')
                                                                    <span class="error-msg-form">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-6">
                                                                <input class="form-control" type="text" id="phone"
                                                                    placeholder="e.g. +20 1157593629" name="phone"
                                                                    value="+20 ">
                                                                @error('phone')
                                                                    <span class="error-msg-form">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>





                                                    </div>

                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <div class="left-side">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">خروج </button>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="right-side">
                                                    <a class="btn-form" style="color: #ffff;border-radius: 7px;">حفظ</a>

                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>



                                <a type="button" class="me-4" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    عنويني
                                </a>
                                <div class="modal fade" id="exampleModal2" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-lg modal-dialog modal-dialog-centered  modal-dialog-scrollable ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">عناويني
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    @foreach ($address as $iteam)
                                                        @if (Auth::guard('client')->user()->id == $iteam->client_id)
                                                            <div class="col-lg-12 col-md-12  col-sm-12">
                                                                <div class="content-address">

                                                                    <h2 class="fs-5">
                                                                        @if ($iteam->favorite_address == 1)
                                                                            <i
                                                                                class="fa-solid fa-circle-check  active"></i>
                                                                        @else
                                                                            <a data-adderss_id="{{ $iteam->id }}"

                                                                                class="link-cust-text text-gray-300 me-1 favorite"
                                                                                style="float: right; margin-top: 3px;">
                                                                                <i class="fa-solid fa-circle-check "></i>
                                                                            </a>
                                                                        @endif
                                                                        {{ $iteam->name_street }}
                                                                    </h2>
                                                                    <h6>{{ $iteam->country->name_ar . ' . ' . $iteam->city->name_ar . ' . ' . $iteam->region->name_ar }}
                                                                    </h6>
                                                                    <p>
                                                                        {{ $iteam->address_details }}
                                                                    </p>
                                                                    <input type="hidden" value="{{ $iteam->id }}"
                                                                        name="adderss_id">
                                                                    <a class="phone" href="#">
                                                                        {{ $iteam->phone }} <i
                                                                            class="fa-solid fa-phone me-2"></i></a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">خروج</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="form-container">
                    <div class="form-group text-center position-relative mar-b-0">
                        <input type="submit" value="تم" class="btn btn-primary position-absolute next" />

                        <input type="button" value="السابق" class="btn btn-primary position-absolute prev back" />
                    </div>
                    <div class="container-fluid">
                        <hr class="hr-process"/>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-4">
                                    <h3 class="fw-bold fs-5">معلومات الدفع</h3>
                                    <p>
                                        ميم سواء كانت تصاميم مطبوعه ... بروشور
                                        <br />او فلاير على سبيل المثال ...
                                    </p>
                                </div>

                                <div class="price-total w-50 mb-3">
                                    <p class="mt-3 fw-bold">التكلفة الكلية 142 EGP</p>
                                </div>
                                <div class="select-visa col-12 col-md-6 mb-3">
                                    <select class="js-example-basic-single border-radius form-control">
                                        <option selected="selected">كارت فيزا</option>
                                        <option>فودافون كاش</option>
                                        <option>فورى</option>
                                        <option>الدفع عند الاستلام</option>
                                    </select>
                                </div>
                                <div class="">
                                    <input type="text" class="form-control w-50 num-card mb-3"
                                        placeholder="رقم الكارت" aria-label="First name" />
                                </div>
                                <div class="d-flex">
                                    <div class="col-6 col-md-3 ps-3">
                                        <input type="text" class="form-control card-data"
                                            placeholder=" تاريخ الانتهاء" aria-label="First name" />
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <input type="text" class="form-control card-number" placeholder="CVV"
                                            aria-label="First name" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="paying">
                                    <img src="{{ asset('image/holding-card.png') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group text-center mt-5 mar-b-0">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <input type="button" value="Submit" class="next" />
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      </div> -->
                </div>
                <div class="form-container">
                    <div class="m-auto img-submit text-center">
                        <img src="img/Done-rafiki.svg" alt="" />
                    </div>
                </div>

            </div>
    </div>
    <div class="modal fade" id="exampleModalLg" tabindex="-1" aria-labelledby="exampleModalLgLabel"
        style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="details">
                        <div class="form-check active p-3 mb-3">
                            <input class="form-check-input"style="float:right !important;" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault10">
                            <label class="form-check-label" for="flexRadioDefault10">
                                <div class="d-flex justify-content-between me-4 mt-1">
                                    <h6>الباقة الفضية</h6>
                                    <div class="price-2">
                                        <p><span class="fw-bold">142 EGP</span> / اسبوع</p>
                                    </div>
                                </div>
                                <p>
                                    لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                    العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم
                                    مطبوعه ... بروشور او فلاير على سبيل المثال .ت
                                </p>
                            </label>
                        </div>
                        <div class="form-check active p-3 mb-3">
                            <input class="form-check-input" style="float:right !important;" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault11">
                            <label class="form-check-label" for="flexRadioDefault11">
                                <div class="d-flex justify-content-between me-4 mt-1">
                                    <h6>الباقة الفضية</h6>
                                    <div class="price-2">
                                        <p><span class="fw-bold">142 EGP</span> / اسبوع</p>
                                    </div>
                                </div>
                                <p>
                                    لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                    العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم
                                    مطبوعه ... بروشور او فلاير على سبيل المثال .ت
                                </p>
                            </label>
                        </div>
                        <div class="form-check active p-3 mb-3">
                            <input class="form-check-input"style="float:right !important;" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault12">
                            <label class="form-check-label" for="flexRadioDefault12">
                                <div class="d-flex justify-content-between me-4 mt-1">
                                    <h6>الباقة الفضية</h6>
                                    <div class="price-2">
                                        <p><span class="fw-bold">142 EGP</span> / اسبوع</p>
                                    </div>
                                </div>
                                <p>
                                    لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                    العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم
                                    مطبوعه ... بروشور او فلاير على سبيل المثال .ت
                                </p>
                            </label>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

    <div class="container-fluid p-5">
        <div class="row">
              <div class="d-flex justify-content-between">
                <h3 class="fw-bold fs-5"> الأكثر مبيعا في السوبر ماركت</h3>
                <button class="btn btn-foot w-auto "> عرض المزيد</button>
            </div>
            <div class="swiper mySwiper" style="height: 504px !important;">
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

    <script src="{{ asset('js/multe-forme.js') }}"></script>
    <script src="{{ asset('js/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- Use as a jQuery plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src='https://intl-tel-input.com/node_modules/intl-tel-input/build/js/intlTelInput.js?1549804213570'></script>
    <script>
        $('.delete-conf').click(function(event) {
            var card_id = $(this).data("card_id");
            var modal = $('.delete-conf-input [name="card_id"]')
            modal.val(card_id);

        })
    </script>


    <script>
        $("input[name='qunt[]']").TouchSpin({
            min: 1,
        });
    </script>
    <script>
        $('.price').blur(function() {
            var sum = 1;
            $("input[name='qunt[]']").each(function() {
                sum += Number($(this).val());
            });
        });​​​​​​​​​
    </script>

    <script>
        $('.favorite').click(function() {
            var id = $(this).data("adderss_id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = "{{ route('client.favorite_ajax', 'id') }}";
            url = url.replace('id', id);
            $.ajax({
                url: url,
                type: 'POST',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'post',
                },
                success: function(data) {

                  $('#favorite-id'+id).nextAll().remove();

                    $("#exampleModal2").modal("hide");

                }
            });

        });
        $('.btn-form').click(function() {
            var country_id = $('#country_id').val();
            var city_id = $('#city_id').val();
            var region_id = $('#region_id').val();
            var name_street = $('#name_street').val();
            var building_number = $('#building_number').val();
            var apartment_number = $('#apartment_number').val();
            var address_details = $('#address_details').val();
            var phone = $('#phone').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            var url = "{{ route('client.store_ajax') }}";

            $.ajax({
                url: url,
                type: 'post',
                dataType: "JSON",
                data: {
                    "country_id": country_id,
                    "city_id": city_id,
                    "region_id": region_id,
                    "name_street": name_street,
                    "apartment_number": apartment_number,
                    "building_number": building_number,
                    "address_details": address_details,
                    "phone": phone,
                    "_method": 'post',
                },
                success: function(data) {
                    $("#delete1").hide;
                }
            });
        });


        $('.js-example-basic-single_resp').select2({
            dropdownParent: $('#exampleModalToggle2')
        });
    </script>
    <script>
        // jQuery
        // International telephone format
        // $("#phone").intlTelInput();
        // get the country data from the plugin
        var countryData = window.intlTelInputGlobals.getCountryData(),
            input = document.querySelector("#phone"),
            addressDropdown = document.querySelector("#address-country");

        // init plugin
        var iti = window.intlTelInput(input, {
            hiddenInput: "full_phone",
            utilsScript: "https://intl-tel-input.com/node_modules/intl-tel-input/build/js/utils.js?1549804213570" // just for formatting/placeholders etc
        });

        // populate the country dropdown
        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            var optionNode = document.createElement("option");
            optionNode.value = country.iso2;
            var textNode = document.createTextNode(country.name);
            optionNode.appendChild(textNode);
            addressDropdown.appendChild(optionNode);
        }
        // set it's initial value
        addressDropdown.value = iti.getSelectedCountryData().iso2;

        // listen to the telephone input for changes
        input.addEventListener('countrychange', function(e) {
            addressDropdown.value = iti.getSelectedCountryData().iso2;
        });

        // listen to the address dropdown for changes
        addressDropdown.addEventListener('change', function() {
            iti.setCountry(this.value);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            //hide search
            $('.select2-no-search').select2({
                minimumResultsForSearch: -1
            });
        });
        // $(".price").prop("disabled", true);
    </script>

    {{-- <script>
        var plus = $('.plus');

        plus.click(function(e) {
            // let index = $('.plus').index(this);


            $(".num-counter")[$('.plus').index(this)];
            var e = $(".num-counter").val();
            e++;


            let input = $(this).parent(".quantity-shopping-order")
                .find(".num-counter");

            console.log(input);
            input.val(e);

        });

        $(".minus").click(function() {
            var count = $('.num-counter').val();
            if (count <= 1) {
                count = 1;
                $(".num-counter").val(count);
            } else {
                count--;
                $(".num-counter").val(count);
            }
        });
    </script> --}}


    <script>
        // var incrementQty;
        // var decrementQty;
        // var plusBtn = $(".plus");
        // var minusBtn = $(".minus");
        // var incrementQty = plusBtn.click(function() {
        //     var $n = $(this)
        //         .parent(".quantity-shopping-order")
        //         .find(".num-counter");
        //     $n.val(Number($n.val()));
        //     console.log($n.val(Number($n.val())));
        //     // update_amounts();
        // });

        // var decrementQty = minusBtn.click(function() {
        // 		var $n = $(this)
        // 		.parent(".button-container")
        // 		.find(".qty");
        // 	var QtyVal = Number($n.val());
        // 	if (QtyVal > 0) {
        // 		$n.val(QtyVal-1);
        // 	}
        // 	update_amounts();
        // });
    </script>
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
