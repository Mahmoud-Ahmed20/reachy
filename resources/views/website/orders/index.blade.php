@extends('website/layouts.master')

@section('title', 'Orders')

<!-- css insert -->
@section('css')



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
        <form action="{{ route('client.orders.store') }}" method="post">
            @csrf
            <div class="container-fluid">
                <div class="form-container">

                    <!-- content -->
                    <div class="form-group text-center position-relative mar-b-0">
                        <input type="button" value="التالى" class="btn btn-primary position-absolute next" />
                    </div>
                    <hr />

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
                                <div class="row align-items-center justify-content-around">
                                    {{-- @foreach ($addtocard as $item)
                                        <div class="col-4 col-md-3 pe-0">
                                            <img src="{{ URL::asset('img/products/' . $item->Product->cover_image) }}"
                                                alt="" />
                                        </div>
                                        <div class="col-4 col-md-3">

                                            <h6 class="fw-bold"> {{ $item->Product->name_en }}</h6>
                                            <p class="fs-7  text-grey fw-light">
                                                {{ $item->Product->name_ar }}
                                            </p> --}}
                                    {{-- <h6 class="fw-light fs-7">
                                            المقاس:<span class="fw-bold ms-2"> كبير</span> اللون:<span class="fw-bold">
                                                اسود</span>
                                        </h6> --}}

                                    {{-- <input type="hidden" name="product_id" value="{{ $item->Product->id }}">
                                            <!-- <h6 class="fw-light text-dark fs-7"> اللون<span class="fw-bold "> اسود</span></h6> -->
                                        </div>
                                        <div class="col-2 col-md-2 number-prodact-orders text-center">
                                            <p class="mt-1 fs-6">
                                                <input type="text"
                                                    value="{{ $item->Product->orginal_price + $item->Product->tax }}"
                                                    name="price">

                                            </p>

                                        </div>
                                        <div
                                            class="col-2 col-md-2 quantity-shopping-order text-center d-flex align-items-center">
                                            <span class="btns-plus plus">+</span><input type="text"
                                                class="input-shopping num-counter" value="1" name="quantity" /><span
                                                id="minus" class="btns-plus minus">-</span>
                                        </div> --}}
                                    {{-- <div class="col-2 col-md-2">
                                            <a class="delete-conf" style="color: #D62828;cursor: pointer;" title="delete"
                                                data-effect="effect-scale" data-card_id="{{ $item->id }}"
                                                data-bs-toggle="modal" data-bs-target="#delete1">
                                                <i class="fa-solid fa-trash-can color-i2 "></i>حذف
                                            </a>
                                            <div class="modal fade" id="delete1" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
                                                    <div class="modal-content b-r-s-cont border-0">

                                                        <div class="modal-header">
                                                            <div class="modal-title" id="exampleModalLabel"><i
                                                                    class="fas fa-trash me-1"></i>
                                                                حذف </div>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>

                                                        <form action="{{ route('client.address.destroy', $item->id) }}"
                                                            method="post">
                                                            {{ method_field('delete') }}
                                                            {{ csrf_field() }}

                                                            <!-- Modal content -->
                                                            <div class="modal-body px-4">

                                                                <div class="modal-body  text-center py-0">
                                                                    <p class="mb-0">هل انت متاكد من هذا المنتج
                                                                    </p><br>
                                                                    <input type="hidden" name="card_id"
                                                                        value="{{ $item->id }}">
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <div class="left-side">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">خروج </button>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="right-side">
                                                                    <button type="submit" class="btn btn-danger ">حذف
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    {{-- @endforeach --}}

                                </div>
                                <hr />
                            </div>
                            <div class="mt-3 terms">
                                <p class="d-inline me-3 mb-2">
                                    أوافق على استبدال منتجات البقالة بمنتجات مماثلة
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio1" value="option1" />
                                    <label class="form-check-label" for="inlineRadio1">نعم</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio2" value="option2" />
                                    <label class="form-check-label" for="inlineRadio2">لا</label>
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
                                            عرض الكل
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="details">
                                <div class="active details-active p-3 mb-3">
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <input class="form-check-input" type="radio" value=""
                                                id="flexCheckDefault1" />
                                            <label class="form-check-label me-2 fw-bold" for="flexCheckDefault1">
                                                الباقة الفضية
                                            </label>
                                        </div>
                                        <div class="price-2">
                                            <p><span class="fw-bold">142 EGP</span> / اسبوع</p>
                                        </div>
                                    </div>
                                    <div class="me-4">
                                        <p>
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                            العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم
                                            مطبوعه ... بروشور او فلاير على سبيل المثال .ت
                                        </p>
                                    </div>
                                </div>
                                <div class="active p-3 mb-3">
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <input class="form-check-input" type="radio" value=""
                                                id="flexCheckDefault2" />
                                            <label class="form-check-label me-2 fw-bold" for="flexCheckDefault2">
                                                الباقة الفضية
                                            </label>
                                        </div>
                                        <div class="price-2">
                                            <p><span class="fw-bold">142 EGP</span> / اسبوع</p>
                                        </div>
                                    </div>
                                    <div class="me-4">
                                        <p>
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                            العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم
                                            مطبوعه ... بروشور او فلاير على سبيل المثال .ت
                                        </p>
                                    </div>
                                </div>
                                <div class="active p-3 mb-3">
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <input class="form-check-input" type="radio" value=""
                                                id="flexCheckDefault3" />
                                            <label class="form-check-label me-2 fw-bold" for="flexCheckDefault3">
                                                الباقة الفضية
                                            </label>
                                        </div>
                                        <div class="price-2">
                                            <p><span class="fw-bold">142 EGP</span> / اسبوع</p>
                                        </div>
                                    </div>
                                    <div class="me-4">
                                        <p>
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                            العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم
                                            مطبوعه ... بروشور او فلاير على سبيل المثال .ت
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="col-xl-5">
                                    <div class="price-total">
                                        <input type="text" name="total_price">
                                        <p class="mt-3 fw-bold">التكلفة الكلية 142 EGP</p>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="Promo-Code">
                                        <label class="form-check-label Promo-Code-label ms-5">
                                            <i class="fa-solid fa-right-long"></i>
                                        </label>
                                        <input type="text" class="Promo-Code-input text-start"
                                            placeholder="Promo Code" name="" id="" />
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
                        <i class="fa-solid fa-right-long back position-absolute"></i>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-xl-6 col-md-6 p-3 offset-md-2">
                            <div class="">
                                <h3 class="fw-bold fs-5">معلومات الشحن والتوصيل</h3>
                                <p class="text-grey">
                                    ميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل
                                    المثال ... او نماذج مواقع انترنت ...
                                </p>
                            </div>
                            <div class="d-flex">
                                <div class="col-6">
                                    <select class="js-example-basic-single border-radius form-control">
                                        <option selected="selected">orange</option>
                                        <option>white</option>
                                        <option>purple</option>
                                    </select>
                                </div>
                                <div class="col-6 me-1">
                                    <input type="date" class="input-data border-radius" name="deliverd_date"
                                        id="" />
                                </div>
                            </div>
                            <div class="time mt-3 border-radius">
                                <p class="pt-2 fw-bold fs-7">
                                    المواعيد المتاحة للتسليم 3-6 مساء 6-9 مساء
                                </p>
                            </div>
                        </div>
                        <div class="col-4 p-3 mt-3">
                            <div class="mt-2 p-2 border-radius send-gift col-12 col-md-5 mb-2">
                                <label class="form-check-label ms-2" for="send-gift-redio">
                                    <i class="fa-solid fa-gift"></i> ارسال كهدية
                                </label>
                                <input type="checkbox" class="form-check-input" name="gift" id="send-gift-redio" />
                            </div>
                            <div class="col-12  mt-4">
                                <select name="adderss_id" class="js-example-basic-single form-control">
                                    {{-- <option selected="selected">{{  }}</option> --}}
                                    @foreach ($address as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name_street . '.' . $item->country->name_ar . '.' . $item->city->name_ar . '.' . $item->region->name_ar }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-container">
                    <div class="form-group text-center position-relative mar-b-0">
                        <input type="submit" value="تم" class="btn btn-primary position-absolute next" />
                        <i class="fa-solid fa-right-long back position-absolute"></i>
                    </div>
                    <div class="container-fluid">
                        <hr />
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
                                    <img src="img/holding-card.png" alt="" />
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
                        <div class="active p-3 mb-3">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <input class="form-check-input" type="radio" value=""
                                        id="flexCheckDefault2" />
                                    <label class="form-check-label me-2 fw-bold" for="flexCheckDefault2">
                                        الباقة الفضية
                                    </label>
                                </div>
                                <div class="price-2">
                                    <p><span class="fw-bold">142 EGP</span> / اسبوع</p>
                                </div>
                            </div>
                            <div class="me-4">
                                <p>
                                    لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                    العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم
                                    مطبوعه ... بروشور او فلاير على سبيل المثال .ت
                                </p>
                            </div>
                        </div>
                        <div class="active p-3 mb-3">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <input class="form-check-input" type="radio" value=""
                                        id="flexCheckDefault2" />
                                    <label class="form-check-label me-2 fw-bold" for="flexCheckDefault2">
                                        الباقة الفضية
                                    </label>
                                </div>
                                <div class="price-2">
                                    <p><span class="fw-bold">142 EGP</span> / اسبوع</p>
                                </div>
                            </div>
                            <div class="me-4">
                                <p>
                                    لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                    العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم
                                    مطبوعه ... بروشور او فلاير على سبيل المثال .ت
                                </p>
                            </div>
                        </div>
                        <div class="active p-3 mb-3">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <input class="form-check-input" type="radio" value=""
                                        id="flexCheckDefault2" />
                                    <label class="form-check-label me-2 fw-bold" for="flexCheckDefault2">
                                        الباقة الفضية
                                    </label>
                                </div>
                                <div class="price-2">
                                    <p><span class="fw-bold">142 EGP</span> / اسبوع</p>
                                </div>
                            </div>
                            <div class="me-4">
                                <p>
                                    لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                    العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم
                                    مطبوعه ... بروشور او فلاير على سبيل المثال .ت
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>




@endsection
@section('js')

    <script src="{{ asset('js/multe-forme.js') }}"></script>
    <script>
        $('.delete-conf').click(function(event) {
            var card_id = $(this).data("card_id");
            console.log(card_id);
            var modal = $('.delete-conf-input [name="card_id"]')
            modal.val(card_id);

        })
    </script>
    <script>
        var plus = $('.plus');

        plus.click(function(e) {
            // let index = $('.plus').index(this);
            console.log($(".num-counter")[$('.plus').index(this)]);
            var e = $(".num-counter").val();
            e++;


            let input = $(this).parent(".quantity-shopping-order")
                .find(".num-counter");
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
    </script>


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

@endsection
