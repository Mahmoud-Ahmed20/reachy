@extends('website/layouts.master_top')

@section('title', 'Profile')

<!-- css insert -->
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

@endsection

<!-- content insert -->
@section('content')





    <div class="profile">

        <div class="container-fluid">
            <div class="row">
                @include('website.layouts.includes.sidebar_2')

                <div class="col-12 col-xl-9 mt-3 div-boxshadow p-3">
                    <div class="pro-form p-4">
                        <h1 class="fw-bold fs-5"><i style="color:#3E4763 ;" class="fa-solid fa-user"></i> تعديل المعلومات
                            الشخصية </h1>

                        <form action="{{ route('client.update.profile') }}" method="post" enctype="multipart/form-data">

                            @csrf
                            <div class="text-center">

                                <label class="title-photo mb-5 mt-0">
                                    <div class="picture">
                                        <img src="{{ URL::asset('img/useravatar/' . Auth::guard('client')->user()->avatar) }}"
                                            class="picture-src" id="mib_PicturePreview" title="" />
                                        <input type="file" name='avatar' accept="image/*" id="mib_img_input">
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
                                    <input type="text" id="First name" name="first_name" class="form-control"
                                        aria-label="First name" value="{{ Auth::guard('client')->user()->first_name }}">
                                </div>
                                <div class="col">
                                    <label for="last name">الاسم الثاني</label>
                                    <input type="text" id="last name"
                                        value="{{ Auth::guard('client')->user()->second_name }}" name="second_name"
                                        class="form-control" aria-label="Last name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="email">البريد الإلكتروني</label>
                                    <input type="email" class="form-control" id="email"
                                        value="{{ Auth::guard('client')->user()->email }}" name="email"
                                        aria-label="email">
                                </div>
                                <div class="col">
                                    <label for="tel">رقم الهاتف</label>
                                    <input type="tel" id="tel" value="{{ Auth::guard('client')->user()->phone }}"
                                        class="form-control" aria-label="tel" name="phone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="last name"> البلد</label>
                                    <select name="country_id" class="js-example-basic-single border-radius form-control">
                                        @if (Auth::guard('client')->user()->country_id == null)
                                            <option selected value="0">
                                                اختر البلد
                                            </option>
                                        @endif

                                        @foreach ($Country as $item)
                                            <option @if (Auth::guard('client')->user()->second_name == $item->id) selected @endif
                                                value="{{ $item->id }}">{{ $item->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="password">كلمة المرور</label>
                                    <input type="password" id="password" class="form-control" aria-label="Last name"
                                        name="password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <button class="w-25 p-2 m-4">تعديل </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection


<!-- js insert -->
@section('js')

@endsection
