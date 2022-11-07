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
        <nav class="navbar fixed-top">
            <div class="container-fulid">

                <div class="offcanvas  offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="pro-info w-100  px-5">
                        <div class="profile-title d-flex ">
                            <div>
                                <!-- <img src="image/Mask Group 18.png" alt=""> -->
                                <img src="image/Mask Group 18.png" alt="">
                            </div>
                            <div class="ms-2 me-2 mt-2">
                                <h1 class="text-lg">Amr Ibrahim</h1>
                                <p >My Profile</p>
                            </div>
                        </div>
                        <p style="font-size:12px;" class="text-center">رصيدك الحالي</p>
                        <h2 class="text-center main-color">550 EGP</h2>
                        <div>
                            <ul>
                                <li class="mt-3 main-color"><a href="#" class="main-color"><i
                                            class="fa-solid fa-user  text-capitalize"> </i> My Info </a></li>
                                <li class="mt-3"><a href="#"><i class="fa-solid fa-key   text-capitalize"> </i>
                                        Password </a></li>
                                <li class="mt-3"><a href="#"><i class="fa-solid fa-user  text-capitalize"> </i>
                                        Orders </a></li>
                                <li class="mt-3"><a href="#"><i class="fa-solid fa-user  text-capitalize"> </i> Live
                                        Shopping </a></li>
                                <li class="mt-3"><a href="#"><i class="fa-solid fa-user  text-capitalize"> </i> My
                                        Transaction </a></li>
                                <li class="mt-3"><a href="#"><i class="fa-solid fa-user  text-capitalize"> </i>
                                        Reviews </a></li>
                                <li class="mt-3"><a href="#"><i class="fa-solid fa-user  text-capitalize"> </i>
                                        Reviews </a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </nav>
        <div class=" ps-0 pe-0">
            <div class="row mb-5" style="margin-right:0">
                @include('website/layouts/includes/sidebar_2')
                <div class="col-md-9 fullscrin b_color_order px-4">
        <div class="row pt-4">
          <div class="col d-flex align-items-center">
            <h3 class="fw-bold fs-6">Account</h3>
            <i class="fa-solid fa-angle-right ps-3 pe-3 fs-6 text-gray-400"></i>
            <h3 class="text-gray-300 fs-6">Update Password </h3>
          </div>
        </div>
              <div class="container">

                    <!-- forme   -->
                        <form action="" method="post">
                            <div class="row mt-3">
                                        <div class="col-6 m-auto">
                                            <label for="exampleInputoldpassword" class="form-label"> Old Password</label>
                                            <input type="password" class="form-control" value="Amr" id="exampleInputoldpassword">
                                        </div>
                            </div>
                            <div class="row mt-3">
                                         <div class="col-6 m-auto">
                                            <label for="txtPassword" class="form-label">New Password </label>
                                            <input id="password-field" type="password" class="form-control" name="password" value="secret">
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style="float: right;
                                            margin-top: -27px;
                                            margin-right: 12px;
                                            position: relative;
                                            z-index: 2;
                                            cursor: pointer;"></span>

                                        </div>
                            </div>
                            <div class="row mt-3 mb-4">
                                 <div class="col-6 m-auto">
                                            <label for="exampleInputconfirmpassword" class="form-label"> Confirm Password </label>
                                            <input type="password" class="form-control"  value="Ibrahim" id="exampleInputconfirmpassword">
                                        </div>
                            </div>
                            <div class="text-center">

                                <button class="btn main-color-bg text-white p-2 w-25 text-center" type="submit">Update</button>
                            </div>

                        </form>
                    <!-- end forme   -->
            </div>



                </div>
            </div>
        </div>

    @endsection

    <!-- js insert -->
    @section('js')
    <script>
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
    </script>

    @endsection
