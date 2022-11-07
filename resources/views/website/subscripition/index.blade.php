@extends('website/layouts.master_top')

@section('title', 'Profile')

<!-- css insert -->
@section('css')
<style>
    .package-select:focus{
        background-color:#ffff;
        color:#000;
        border: #003049 1px solid;
    }
    .package .bt-new:hover{
        color: #D62828 !important;
    background-color: #0000 !important;
    }

</style>
@endsection

<!-- content insert -->
@section('content')


    <!-- contente -->
    <section>
        <div class="container-fluid">
            <div class="row">
                @include('website.layouts.includes.sidebar_2')

                <div class="col-12 col-xl-9  p-4 mt-3">
                    <div class="credit-card d-flex mb-3">
                        <i class="fa-solid fa-credit-card"></i>
                        <h3 class="fw-bold fs-5 mt-1"> إشتـراكاتي</h3>
                    </div>
                    <div class="over1">
                        <div class="row">
                            @if (Auth::guard('client')->user()->subuscription_id == null)
                            <div class="over1 mt-4">
                                <div class="row">
                                    @foreach ($subscurpition as $item)
                                        <div class="col-xl-3 col-md-4 col-sm-12 col-xs-12 mb-4">
                                            <div class="package box-shadow">
                                                <h3 class="mb-0">اشترك في {{ $item->name_ar }}</h3>
                                                <div class="">
                                                    <div class="package-photo">
                                                        <img src="{{ URL::asset('img/subscription/' . $item->img) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="package-title mt-3">
                                                        <p class="fw-bold mb-0"> {{ $item->name_ar }}</p>
                                                        <p class="mb-0"><span>{{ $item->amount_money }} EGP
                                                    </div>
                                                </div>
                                                <ul class="p-3 mt-0 mb-0">
                                                    {{-- <li><i class="fa-solid fa-circle-check"></i>الباقة متاحة لمدة <span>اسبوع</span>
                                                        فقط</li> --}}
                                                    <li><i class="fa-solid fa-circle-check"></i>تقدر تشتري بتوفير لحد
                                                        <span>{{ $item->limited_cost }}ج</span>
                                                    </li>
                                                    <li><i class="fa-solid fa-circle-check"></i>وفر حتى
                                                        <span>{{ $item->limited_cost }}ج</span>
                                                    </li>
                                                </ul>
                                                <div class="dropdown  text-center fs-7" dir="ltr">
                                                    <button class="package-select p-3" type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">  الترقية الي الباقة</button>
                                                    <ul class="dropdown-menu" style="width: 67%;" >

                                                        <li>
                                                         
                                                                الدفع الان
                                                         
                                                            <a class="dropdown-item  fs-7" href="#">
                                                                الدفع مع اول ارودر
                                                            </a>

                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @else
                                <div class="col-xl-3 col-md-6 col-sm-12 col-xs-12 mt-1 mb-4">
                                    <div class="package active-package box-shadow">
                                        <h3>اشترك في {{ Auth::guard('client')->user()->subuscription->name_ar }}</h3>
                                        <div class="">
                                            <div class="package-photo">
                                                <img src="{{ URL::asset('img/subscription/' . Auth::guard('client')->user()->subuscription->img) }}"
                                                    alt="">
                                            </div>
                                            <div class="package-title mt-3">
                                                <p class="fw-bold mb-0"">
                                                    {{ Auth::guard('client')->user()->subuscription->name_ar }}
                                                </p>
                                                <p class="mb-0"><span>{{ Auth::guard('client')->user()->subuscription->amount_money }}
                                                        EGP
                                            </div>
                                        </div>
                                        <ul class="p-3 mt-0 mb-0">
                                            {{-- <li><i class="fa-solid fa-circle-check"></i>الباقة متاحة لمدة <span>اسبوع</span>
                                                فقط</li> --}}
                                            <li><i class="fa-solid fa-circle-check"></i>تقدر تشتري بتوفير لحد
                                                <span>{{ Auth::guard('client')->user()->subuscription->limited_cost }}ج</span>
                                            </li>
                                            <li><i class="fa-solid fa-circle-check"></i>وفر حتى
                                                <span>{{ Auth::guard('client')->user()->subuscription->limited_cost }}ج</span>
                                            </li>
                                        </ul>
                                        <a href="{{ route('client.subscriptionWebsite.show', Auth::guard('client')->user()->subuscription->slug_en) }}"
                                            class="btn mb-2 bt-new d-flex justify-content-center align-items-center ">تفاصيل</a>
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>
                    @if (Auth::guard('client')->user()->subuscription_id == null)

                    @else
                    <div class="credit-card d-flex mt-5 mb-3">
                        <h3 class="fw-bold fs-5 mt-1"> الترقية الي باقة جديدة</h3>
                    </div>
                    <div class="over1 mt-4">
                        <div class="row">
                            @foreach ($subscurpition as $item)
                                <div class="col-xl-3 col-md-4 col-sm-12 col-xs-12 mb-4">
                                    <div class="package box-shadow">
                                        <h3>اشترك في {{ $item->name_ar }}</h3>
                                        <div class="">
                                            <div class="package-photo">
                                                <img src="{{ URL::asset('img/subscription/' . $item->img) }}"
                                                    alt="">
                                            </div>
                                            <div class="package-title mt-3">
                                                <p class="fw-bold mb-0"> {{ $item->name_ar }}</p>
                                                <p class="mb-0"><span>{{ $item->amount_money }} EGP
                                            </div>
                                        </div>
                                        <ul class="p-3 mt-0 mb-0">
                                            {{-- <li><i class="fa-solid fa-circle-check"></i>الباقة متاحة لمدة <span>اسبوع</span>
                                                فقط</li> --}}
                                            <li><i class="fa-solid fa-circle-check"></i>تقدر تشتري بتوفير لحد
                                                <span>{{ $item->limited_cost }}ج</span>
                                            </li>
                                            <li><i class="fa-solid fa-circle-check"></i>وفر حتى
                                                <span>{{ $item->limited_cost }}ج</span>
                                            </li>
                                        </ul>
                                        <div class="dropdown  text-center fs-7" dir="ltr">
                                            <button class="package-select p-3" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">  الترقية الي الباقة</button>
                                            <ul class="dropdown-menu" style="width: 67%;" >

                                                <li>
                                                   
                                                        الدفع الان
                                           
                                                    <a class="dropdown-item  fs-7" href="#">
                                                        الدفع مع اول ارودر
                                                    </a>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </div>





            </div>

        </div>
        </div>
    </section>



@endsection


<!-- js insert -->
@section('js')

@endsection
