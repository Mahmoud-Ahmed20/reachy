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
<!-- content insert -->
@section('content')


<div class="profile">

        <div class="container-fluid">
            <div class="row">
 @include('website/layouts.includes.sidebar')

                <div class="col-12 col-xl-9 mt-3 div-boxshadow p-3">
                    <div class="pro-form p-4">
                        <h1 class="fw-bold fs-5"><i style="color:#3E4763 ;" class="fa-solid fa-user"></i> تعديل المعلومات الشخصية </h1>

                        <form id="myforminput" method="POST" action="{{ route('sett.update.seller') }}" enctype= multipart/form-data>
                            <div class="text-center">

                                <label class="title-photo mb-5 mt-0">
                                    {{-- <img src="{{ URL::asset('img/useravatar/' . $seller->avatar) }}"
                                    class="picture-src" id="mib_PicturePreview" title=""  /> --}}
                                <input type="file" name='avatar' accept="image/*" id="mib_img_input" >
                                </label>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="First name">الاسم الأول</label>
                                  <input type="text" id="First name" class="form-control" aria-label="First name">
                                </div>
                                <div class="col">
                                    <label for="last name">الاسم الثاني</label>
                                  <input type="text" id="last name" class="form-control"  aria-label="Last name">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                    <label for="email">البريد الإلكتروني</label>
                                    <input name="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Write your email here">
                                </div>
                                <div class="col">
                                    <label for="tel">رقم الهاتف</label>
                                  <input type="tel" id="tel" class="form-control"  aria-label="tel">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                    <label for="date">تاريخ الميلاد</label>
                                    <input type="date" id="password" class="form-control"  aria-label="Last name">
                                </div>
                                <div class="col">
                                    <label for="password">كلمة المرور</label>
                                  <input type="password" id="password" class="form-control"  aria-label="Last name">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col text-center">
                                    <button class="w-25 p-2 m-4">التسجيل </button>
                                </div>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
