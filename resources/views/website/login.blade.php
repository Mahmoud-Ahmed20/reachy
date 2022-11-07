@extends('website/layouts.master_top')

@section('title', 'Register - Pain Cure | Dr. Amr Saeed')

<!-- css insert -->
@section('css')

    <!-- animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="{{ URL::asset('plugins/owl/owl.carousel.min.css') }}">

    <!-- google recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endsection

<!-- content insert -->
@section('content')

    <div class="bradcam_area breadcam_bg bradcam_overlay"
        style="background-image: url('{{ asset('img/dashboard/system/landing/bradcam.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-white">
                        <div class="fs-1">
                            <a class="text-white">Login</a>
                            <span style="color: #c6ddd0 !important;"> | </span> <a href="{{ route('client.register') }}"
                                class="text-white" style="color: #c6ddd0 !important;">Register</a>
                        </div>
                        <p><a class="text-gray-200" href="{{ route('landing') }}">Home /</a> Login</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container bg-white position-relative b-r-s-cont p-5 shadow" style="margin-top: -40px; z-index:9;">

        <div class="row justify-content-center">
            <div class="col-12 col-md-6">

                <h3 class="text-gray-800 mb-2 fw-bold">Sign in</h3>

                <form method="POST" action="{{ route('client.login_sub') }}">
                    @csrf

                    <div class="form-group mb-2">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Phone
                            Number</label>
                        <input id="phone_number" name="phone_number" type="text"
                            class="form-control form-control-user @error('phone_number') is-invalid @enderror"
                            id="exampleInputphone_number" value="{{ old('phone_number') }}" required
                            autocomplete="phone_number" autofocus placeholder="Enter your Mobile or Email...">
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <input name="password" type="password"
                            class="form-control form-control-user @error('password') is-invalid @enderror" id="password"
                            placeholder="Password" required autocomplete="current-password">

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

                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input-user" name="remember" id="remember"
                                id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label-user" for="remember">Remember
                                Me</label>
                        </div>
                    </div>

                    <button type="submit" class="btn text-green-ligh-bg fw-bold text-white btn-user col-12">
                        Login
                    </button>
                </form>

                <div class="mt-3">
                    <span class="text-gray-300"><i class="fas fa-question-circle"></i> You need to login to get all
                        serivces </span> <a class=" text-green-ligh" href="{{ route('client.register') }}">
                        Register Now</a>
                </div>
            </div>
        </div>
    </div>

@endsection

<!-- js insert -->
@section('js')

@endsection
