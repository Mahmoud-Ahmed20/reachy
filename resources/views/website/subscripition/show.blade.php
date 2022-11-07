@extends('website/layouts.master_top')

@section('title', 'Profile')

<!-- css insert -->
@section('css')

@endsection

<!-- content insert -->
@section('content')


    <!-- contente -->
    <section>
        <div class="container-fluid">
            <div class="row">
                @include('website.layouts.includes.sidebar_2')
                @foreach ($sub as $item)
                    <div class="col-12 col-xl-9 box-shadow  p-4">
                        <div class="credit-card pe-2 mb-4">
                            <h3 class="fw-bold fs-5"><i class="fa-solid fa-credit-card"></i> {{ $item->name_ar }}</h3>
                        </div>
                        <div class="container-fluid p-4  ">
                            <div class="row">
                                <div class="col-lg-12 mt-1 back-gift ">
                                    <div class="float-start mt-5 p-4 ms-5">
                                        <h2 class="fw-bold fs-3">اشترك دلوقتي في الباقة الفضية</h2>
                                        <p> وهتوفر لحد 1250 جنيه على مشترياتك </p>
                                        <button class="btn-banner"> تسوق الان</button>
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-5">
                                    <div class="paper">
                                        <img src="{{ URL::asset('img/subscription/' . $item->img) }}" width="100%"
                                            alt="" srcset="">
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-5">
                                    <h3 class="fw-bold fs-4 me-3"> {{ $item->name_ar }}</h3>
                                    <p class="mt-3"><span class="fw-bold fs-4 me-4">{{ $item->amount_money }} EGP</span>
                                    <ul class="me-3">

                                        <li class="mb-4"><i class="fa-solid fa-circle-check ms-2"></i> تقدر تشتري بتوفير
                                            لحد
                                            <span class="fw-bold"> {{ $item->limited_cost }}ج</span>
                                        </li>
                                        <li class="mb-5"><i class="fa-solid fa-circle-check ms-2"></i> وفر حتى <span
                                                class="fw-bold">{{ $item->limited_cost }}ج</span></li>
                                    </ul>

                                    @if (Auth::guard('client')->user()->subuscription_id == null)
                                        <button type="button" class=" bt-new-package fw-bold"> الاشتراك
                                        </button>
                                    @elseif (Auth::guard('client')->user()->subuscription_id == $item->id)
                                        <button type="button" class=" bt-new-package fw-bold"> تم الاشتراك في هذة الباقة
                                        </button>
                                    @else
                                        <button type="button" class=" bt-new-package fw-bold"> ترقية
                                        </button>
                                    @endif
                                </div>
                                <div class="col-lg-4 mt-5">
                                    <h2 class="fw-bold fs-4">تفاصيل الباقـــة</h2>
                                    {{-- <p class="text-grey mt-3 fs-6">وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                        العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير
                                        على  سبيل المثال ... او نماذج مواقع انترنت
                                        وعند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم ويتم وضع
                                        النصوص
                                        النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية بالتصميم قد تشغل
                                        المشاهد
                                        عن وضع الكثير من الملاحظات او الانتقادات للتصميم الاساسي.

                                        وخلافاَ للاعتقاد السائد فإن لوريم إيبسوم ليس نصاَ عشوائياً، بل إن له جذور في الأدب
                                        اللاتيني الكلاسيكي منذ العام 45 قبل الميلاد. من كتاب "حول أقاصي الخير والشر"

                                    </p> --}}
                                    <p class="text-grey mt-3 fs-6 text-break">{{ $item->description_ar }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach




            </div>

        </div>
        </div>
    </section>



@endsection


<!-- js insert -->
@section('js')

@endsection
