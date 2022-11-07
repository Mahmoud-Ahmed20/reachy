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
                    <div class="row pt-5">
                        <div class="col d-flex ps-5">
                            <h3>Account</h3>
                            <!-- <i class="text-gray-400 ps-5"> > </i>? -->
                            <i class="fa-solid fa-angle-right ps-5 text-lg text-gray-400"></i>
                            <h3 class="text-gray-300 ps-5">My Info </h3>
                        </div>
                    </div>
              <div class="container">
                 <!-- img and name   -->
                 <div class="  text-center mb-4">
                        <img src="image/Mask Group 18.png" class="rounded-circle mb-3" alt="">
                        <div class="ms-4">
                            <h6>Amr Ibrahim</h6>
                            <p class="text-gray-300"> Egypt </p>
                        </div>
                        <div>
                        </div>
                    </div>
                    <!-- end img and name   -->

                    <!-- forme   -->
                        <form action="" method="post">
                            <div class="row mb-4">
                                        <div class="col-6">
                                            <label for="exampleInputFerstName" class="form-label">Frest Name</label>
                                            <input type="text" class="form-control text-center" value="Amr " id="exampleInputFerstName">
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleInputLastName" class="form-label">Last Name </label>
                                            <input type="text" class="form-control text-center"  value="Ibrahim" id="exampleInputLastName">
                                        </div>
                            </div>
                            <div class="row mb-4">
                                        <div class="col-6">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <input type="email" class="form-control text-center " value="AmrIbrahim@gamil.com" id="exampleInputEmail1">
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleInputLastPhone" class="form-label"> Phone </label>
                                            <input type="text" class="form-control text-center "  value="01157593629" id="exampleInputLastPhone">
                                        </div>
                            </div>
                            <div class="row mb-4">
                                        <div class="col-6">
                                            <label for="exampleInputContry" class="form-label">Contry </label>
                                            <input type="text" class="form-control text-center " value="Egypt" id="exampleInputContry">
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleInputLastCtiy" class="form-label"> Ctiy </label>
                                            <input type="text" class="form-control text-center "  value="Giza" id="exampleInputLastCtiy">
                                        </div>
                            </div>
                            <div class=" text-center">
                                <button class="btn main-color-bg text-white p-2 w-25 text-center mb-5" type="submit">Save</button>
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


    @endsection
