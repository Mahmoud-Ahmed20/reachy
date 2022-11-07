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

<div  class="register-3">
    <div  class="register-form-3   p-5">
        <div class="d-flex justify-content-between">
            <img class="logo-form" src="{{asset('image/logo.png')}}" alt="">
            <a href="" class="language"> <i class="fa-solid fa-globe"></i> العربية </a>
        </div>
        <div class="text-center pt-5">
            <img class="w-25" src="{{asset('image/Group_2151.png')}}" alt="">
        </div>
        <h1>التسجيل كبائع</h1>
        <p>بيع وزود مبيعاتك دلوقتي على ريتشي مارت</p>
        <form  id="myforminput" method="POST" action="{{ route('seller.login_sub') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <input id="phone" name="phone" type="number"
                    class="form-control form-control-user @error('phone') is-invalid @enderror"
                    id="exampleInputphone_number"
                    autocomplete="phone" autofocus placeholder="Enter your Mobile or Email...">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                <div class="col">
                    <input name="password" type="password"
                    class="form-control form-control-user @error('password') is-invalid @enderror" id="password"
                    placeholder="Password"  autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="d-flex text-center mb-2">
                    <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}">
                    </div>
                </div>

                @error('g-recaptcha-response')
                    <span class="error-msg-form">
                        {{ $message }}
                    </span>
                @enderror
              </div>
              <div class="row">
                <div class="col text-center">
                    <button type="submit" class="w-50 p-2 m-4">التسجيل </button>
                </div>
              </div>
             <div class="d-flex justify-content-around">
                <div class="d-flex justify-content-around">
                    <p class="fw-bold "> ليس لديك حساب؟</p>
                    <a class="" href="{{ route('seller.register') }}">  إنشاء حساب </a>
                </div>
             </div>
        </form>
    </div>
</div>

@endsection


<!-- js insert -->
@section('js')

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<!-- js insert -->
@section('js')

    <!-- validate jquery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js" type="text/javascript">
    </script>
    <script>
        //Rules for the Validator plugin
        var $validator = $('#myforminput').validate({
            rules: {

                password: {
                    minlength: 3,
                    maxlength: 100,
                },
                phone: {
                    minlength: 3,
                },
            },
            messages: {
                phone: {
                    required: "We need your email address to contact you",
                    phone: "Your Phone number or Password is not correct!"
                },
                password: {
                    equalTo: "Password does not match",
                }
            },
            //for inserting erros for some inputs that makes posation problem such as selector 2 and bt datapicker
            errorPlacement: function(error, element) {
                switch (element.attr("name")) {
                    case 'password':
                        error.insertAfter($("#password-js-error-valid"));
                        break;
                    case 'phone':
                        error.insertAfter($("#phone-js-error-valid"));
                        break;


                    default:
                        error.insertAfter(element);
                }

            },
        });
    </script>
@endsection
