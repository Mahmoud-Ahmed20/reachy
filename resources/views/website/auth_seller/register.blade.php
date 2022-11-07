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

<div>
    <div  class="register">
        <div  class="register-form p-5">
          <div class="d-flex justify-content-between">
            <img class="logo-form" src=" {{asset('image/logo.png') }}" alt="">
            <a href="" class="language"> <i class="fa-solid fa-globe"></i> العربية </a>
        </div>
            <h1 class="fw-bold">التسجيل كتاجر على Reachy Mart </h1>
            <p> بيع وزود مبيعاتك دلوقتي على ريتشي مارت</p>

            <form id="myforminput" method="POST" action="{{ route('seller.store') }}" enctype=multipart/form-data>

                @csrf
                <div class="row">
                    <div class="col">
                      <input name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" placeholder="الاسم الأول" aria-label="First name">
                         @error('first_name')
                            <span class="error-msg-form">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                      <input name="second_name" type="text" class="form-control @error('second_name') is-invalid @enderror" value="{{ old('second_name') }}" placeholder="الاسم الثانى " aria-label="Last name">
                        @error('second_name')
                            <span class="error-msg-form">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                  </div>

                  <div class="row">

                    <div class="col">
                      <input name="user" type="text" class="form-control  @error('user') is-invalid @enderror" placeholder="User" aria-label="Last name" value="{{ old('user') }}">
                      @error('user')
                      <span class="error-msg-form">
                          {{ $message }}
                      </span>
                     @enderror
                    </div>
                  </div>
                  <div class="row">

                    <div class="col">
                        <label class="title-photos ">رفع السجل التجارى<i class="fa-solid fa-cloud-arrow-up"></i>
                          <input  name="commercial_register" class="form-control @error('commercial_register') is-invalid @enderror" value="{{ old('commercial_register') }}"  type="file" placeholder=" السجل التجارى">
                          @error('commercial_register')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                      </label>
                  </div>
                    <div class="col">
                        <label class="title-photos ">رفع البطاقة الضريبيه<i class="fa-solid fa-cloud-arrow-up"></i>
                          <input  name="tax_register" class="form-control @error('tax_register') is-invalid @enderror" value="{{ old('tax_register') }}" type="file"  placeholder=" البطاقة الضريبية">
                          @error('tax_register')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                      </label>
                    </div>
                  </div>
                  <div class="row">

                    <div class="col">
                        <input  name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="text"  placeholder="البريد الالكترونى">
                        @if ($errors->has('email'))
                            <span class="error-msg-form">
                                {{ $errors->first('email') }}
                            </span>
                        @else
                            <div class="form-text text-gray-200">
                            </div>
                        @endif
                    </div>
                    <div class="col">
                      <input type="number" name="phone" class="form-control" placeholder="رقم الموبايل"
                      value="{{ old('phone') }}" >
                      @error('phone')
                      <span class="error-msg-form">
                          {{ $message }}
                      </span>
                     @enderror
                    </div>

                  </div>

                  <div class="row">
                    <div class="col">
                      <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="أدخل  السر" aria-label="First name">

                      @error('password')
                      <span class="error-msg-form">
                          {{ $message }}
                      </span>
                     @enderror

                    </div>
                    <div class="col">
                      <input type="password" name="password_confirmation" class="form-control" placeholder="إعادة كتابة كلمة السر" aria-label="Last name"id="password-confirm"
                      value="{{ old('password_confirmation') }}">

                    </div>
                  </div>
                  <div class="row">
                        <div class="col-6">
                            <div class="form-check">
                                <input  class="form-check-input" type="checkbox" id="gridCheck">
                                <label  class="form-check-label" for="gridCheck">
                                  حفظ تسجيل الدخول
                                </label>
                              </div>
                        </div>
                  </div>
                  <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="w-50 p-2 m-4">التسجيل </button>
                    </div>
                  </div>
                 <div class="d-flex justify-content-around">
                    <div class="d-flex justify-content-around">
                        <p class="fw-bold ">لديك حساب؟</p>
                        <a class="" href="{{ route('seller.login') }}">تسجيل الدخول الان </a>
                    </div>
                 </div>
            </form>
        </div>
    </div>
</div>

@endsection


@section('js')

    <!-- select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            //hide search
            $('.select2-no-search').select2({
                minimumResultsForSearch: -1
            });

            //multi select
            $('#multiselect').select2();
            $('#multiselect').on('select2:opening select2:closing', function(event) {
                var $searchfield = $(this).parent().find('.select2-search__field');
                $searchfield.prop('disabled', true);
            });
        });
    </script>

    <!-- validate jquery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js" type="text/javascript">
    </script>
    <script>
        //Rules for the Validator plugin
        var $validator = $('#myforminput').validate({
            rules: {
                first_name: {
                    minlength: 3,
                },
                second_name: {
                    minlength: 3,
                },
                email: {
                    email: true,
                },
                password: {
                    minlength: 7,
                    maxlength: 100,
                },
                password_confirmation: {
                    minlength: 7,
                    maxlength: 100,
                    equalTo: '#password',
                },
                user: {
                    minlength: 3,
                },
                commercial_register: {
                    minlength: 3,
                },
                tax_register: {
                    minlength: 3,
                },
                ,
                phone: {
                    minlength: 50,
                },
            },
            messages: {
                email: {
                    required: "We need your email address to contact you",
                    email: "Your email address must be in the format of name@domain.com"
                },
                password_confirmation: {
                    equalTo: "Password does not match",
                }
            },
            //for inserting erros for some inputs that makes posation problem such as selector 2 and bt datapicker
            errorPlacement: function(error, element) {
                switch (element.attr("name")) {
                    case 'email':
                        error.insertAfter($("#email-js-error-valid"));
                        break;
                    case 'password':
                        error.insertAfter($("#password-js-error-valid"));
                        break;
                    case 'password_confirmation':
                        error.insertAfter($("#password_confirmation-js-error-valid"));
                        break;
                    case 'user':
                        error.insertAfter($("#user-js-error-valid"));
                        break;
                    case 'commercial_register':
                        error.insertAfter($("#commercial_register-js-error-valid"));
                        break;
                    case 'tax_register':
                        error.insertAfter($("#tax_register-js-error-valid"));
                        break;
                    case 'phone':
                        error.insertAfter($("#phone-js-error-valid"));
                        break;
                    case 'inactive':
                        error.insertAfter($("#activate-js-error-valid"));
                        break;

                    default:
                        error.insertAfter(element);
                }

            },
        });
    </script>
@endsection
