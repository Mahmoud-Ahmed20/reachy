@extends('website.layouts.master')

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

                        <form  method="POST" action="{{ route('seller.edit_profile') }}" enctype= multipart/form-data>
                            @csrf
                            <div class="text-center">

                                <label class="title-photo mb-5 mt-0 ">

                                    <div class="picture">
                                        <img src="{{ URL::asset('img/useravatar/' . Auth::guard('seller')->user()->avatar) }}"
                                            class="picture-src" id="mib_PicturePreview" title=""  />
                                        <input type="file" name='avatar' accept="image/*" id="mib_img_input" >
                                    </div>
                                    <h6 class="text-black mt-3 mb-0">Choose Picture</h6>

                                    @error('avatar')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="First name">الاسم الأول</label>
                                    <input name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                                    placeholder="Write the given City name arabic here.." value="{{ Auth::guard('seller')->user()->first_name }}" >

                                    <div id="first_name-js-error-valid"></div>
                                    @error('first_name')
                                    <span class="error-msg-form">
                                        {{ $message }}
                                    </span>
                                     @enderror
                                </div>
                                <div class="col">
                                    <label for="last name">الاسم الثاني</label>
                                    <input name="second_name" type="text" class="form-control @error('second_name') is-invalid @enderror"
                                    placeholder="Write the given City name arabic here.." value="{{ Auth::guard('seller')->user()->second_name }}" >

                                    <div id="second_name-js-error-valid"></div>
                                    @error('second_name')
                                    <span class="error-msg-form">
                                        {{ $message }}
                                    </span>
                                     @enderror
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                    <label for="email">البريد الإلكتروني</label>
                                    <input name="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Write your email here" value="{{ Auth::guard('seller')->user()->email }}" >

                                <div id="email-js-error-valid"></div>
                                    @error('email')
                                    <span class="error-msg-form">
                                        {{ $message }}
                                    </span>
                                     @enderror
                                </div>
                                <div class="col">
                                    <label for="tel">رقم الهاتف</label>
                                    <input id="int-miphone" name="phone" type="tel"
                                    class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ Auth::guard('seller')->user()->phone }}" >

                                   <div id="phonenumber-js-error-valid"></div>
                                   @if ($errors->has('phone'))
                                       <span class="error-msg-form">
                                           {{ $errors->first('phone') }}
                                       </span>

                                   @endif
                                </div>

                              </div>
                            <div class="row">
                                <div class="col">
                                    <label for="tel">User</label>
                                    <input id="int-miphone" name="user" type="text"
                                    class="form-control @error('user') is-invalid @enderror"
                                    value="{{ Auth::guard('seller')->user()->user }}" >

                                    <div id="user-js-error-valid"></div>
                                    @error('user')
                                    <span class="error-msg-form">
                                        {{ $message }}
                                    </span>
                                        @enderror
                                </div>


                                </div>
                              <div class="row">

                                <div class="col">
                                    <label for="password">كلمة المرور</label>
                                    <input id="password" name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Wrtie your password here..."  >
                                </div>
                                <div class="col">
                                    <label for="date">تأكيد كلمة المرور</label>
                                    <input name="password_confirmation" type="password" class="form-control"
                                    placeholder="Confirm your password..." id="password-confirm:">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col text-center">
                                    <button type="submit"class="w-25 p-2 m-4">تعديل </button>
                                </div>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

