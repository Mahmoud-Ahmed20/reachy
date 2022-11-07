@extends('website/layouts.master_top_2')

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

<div  class="register-2">
    <div  class="register-form-2 text-center  p-5">
        <div class=" pt-4">
            <img class="w-25" src="{{asset('image/group2.png')}}" alt="">
        </div>
        <h1>جارى تنشيط الحساب</h1>
        <p> سيتم تنشيط الحساب من خلال الإدارة في مواعيد العمل الرسمية خلال أقرب وقت</p>
        <a class="p-2 w-100" href="{{ route('landing') }}">تصفح الموقع</a>
    </div>
</div>



@endsection





