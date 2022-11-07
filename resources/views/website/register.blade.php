@extends('website.layouts.master_top_2')

@section('title', 'Register - Pain Cure | Dr. Amr Saeed')

<!-- css insert -->
@section('css')

    <!-- animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="{{ URL::asset('plugins/owl/owl.carousel.min.css') }}">

    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- boostrap datepicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

    <!-- international telephone input -->
    <link href="{{ URL::asset('plugins/intltelinput/intlTelInput.css') }}" rel="stylesheet">

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
                            {{-- <a class="text-white">Register</a>
                            <span style="color: #c6ddd0 !important;"> | </span> <a
                                href="{{ route('patient_auth.login') }}" class="text-white"
                                style="color: #c6ddd0 !important;">Login</a> --}}
                        </div>

                        <p><a class="text-gray-200" href="{{ route('landing') }}">Home /</a> Register</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container bg-white position-relative b-r-s-cont p-4 shadow" style="margin-top: -40px; z-index:9;">

        @foreach ($errors->all() as $error)
            <div class="text-red"><i class="fas fa-exclamation me-1"></i> {{ $error }}</div>
        @endforeach

        <div class="multi-setps-form-calander col-12">

            <form id="myform" method="POST" action="{{ route('client.store') }}" enctype="multipart/form-data">

                @csrf

                <!-- progressbar -->
                <ul class="ps-0 progressbar" id="progressbar">
                    <li class="active">

                        <a>
                            <!-- in case we want to use prog selector href="#clinics" -->
                            <div class="icon-circle checked d-flex align-items-center justify-content-center">
                                <i class="bi bi-gear"></i>
                            </div>
                            Basic
                        </a>
                    </li>

                    <li>
                        <a>
                            <div class="icon-circle d-flex align-items-center justify-content-center">
                                <i class="far fa-paper-plane"></i>
                            </div>
                            Sending
                        </a>
                    </li>
                </ul>

                <!-- content -->

                <div class="cont_tap " id="clinics">

                    <div class="row mb-1">
                        <div class="col-12 col-md-5 align-self-center mb-2">

                            <div class="avatar-update-container">
                                <div class="picture">
                                    <img src="{{ URL::asset('img/dashboard/avatars/default-pp.png') }}"
                                        class="picture-src" id="mib_PicturePreview" title="" />
                                    <input type="file" name='avatar' accept="image/*" id="mib_img_input">
                                </div>
                                <h6 class="text-gray-300">Choose Picture</h6>

                                @error('avatar')
                                    <span class="error-msg-form">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>


                        </div>


                        <div class="col-12 col-md-7 mb-2">


                            <div class="mb-3">
                                <label class="form-label">Email
                                    <small>(optional)</small></label>
                                <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Yousef@gmail.com..." value="{{ old('email') }}">
                                    @error('email')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            <div class="mb-3">
                               <label class="form-label">First Name
                                <small>(required)</small></label>
                            <input name="first_name" type="text"
                                class="form-control @error('first_name') is-invalid @enderror"
                                placeholder="Write your first name here" required value="{{ old('first_name') }}">

                            @error('first_name')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>


                        </div>
                    </div>


                    <div class="row mb-2">



                        <div class="col-12 col-md-4 mb-2">
                            <label class="form-label">Second Name
                                <small>(required)</small></label>
                            <input name="second_name" type="text"
                                class="form-control @error('second_name') is-invalid @enderror"
                                placeholder="Write your second name here" required value="{{ old('second_name') }}">

                            @error('second_name')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4 mb-2">
                          <label class="form-label"> Phone
                                <small>(required)</small></label>
                            <input name="phone" type="text"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder="Write your Phone name here" required value="{{ old('phone') }}">

                            @error('phone')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4 mb-2">
                       <label class="form-label">Gendar <small>(required)</small></label>
                            <select
                                class="js-example-basic-single select2-no-search select2-hidden-accessible @error('gendar') is-invalid @enderror"
                                name="gendar" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <div id="gendar-js-error-valid"></div>

                            @error('gendar')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>



                    </div>

                    <div class="row mb-2">
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Password <small>(required)</small></label>
                            <input id="password" name="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Wrtie your password here..." required>

                            @if ($errors->has('password'))
                                <span class="error-msg-form">
                                    {{ $errors->first('password') }}
                                </span>
                            @else
                                <div class="form-text text-gray-200">We'll never share your email with anyone else.
                                </div>
                            @endif
                        </div>


                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Confirm password <small>(required)</small></label>
                            <input name="password_confirmation" type="password" class="form-control"
                                placeholder="Confirm your password..." id="password-confirm" required>
                        </div>

                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <input type="submit" name="next" class="next-form-steps btn btn-primary action-button-next"
                            value="sand" />
                    </div>
                </div>




            </form>
        </div>
    </div>

@endsection

<!-- js insert -->
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
        });
    </script>

    <!-- jquery ui datepicker -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function() {
            $('.hasdatetimepicker').datepicker({
                todayHighlight: true,
                format: "yyyy-mm-dd",
            });
        });
    </script>

    <!-- validate jquery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js" type="text/javascript">
    </script>
    <script>
        //Rules for the Validator plugin
        var $validator = $('#myform').validate({
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
                    case 'role':
                        error.insertAfter($("#role-js-error-valid"));
                        break;
                    case 'first_branch_id':
                        error.insertAfter($("#first_branch_id-js-error-valid"));
                        break;
                    case 'gendar':
                        error.insertAfter($("#gendar-js-error-valid"));
                        break;
                    case 'birthday':
                        error.insertAfter($("#birthday-js-error-valid"));
                        break;
                    case 'country':
                        error.insertAfter($("#country-js-error-valid"));
                        break;
                    case 'city':
                        error.insertAfter($("#city-js-error-valid"));
                        break;
                    case 'phone_number':
                        error.insertAfter($("#phonenumber-js-error-valid"));
                        break;
                    case 'sec_phone_number':
                        error.insertAfter($("#secphonenumber-js-error-valid"));
                        break;

                    default:
                        error.insertAfter(element);
                }

            },
        });
    </script>
    {{-- <script>
        //for country and cities ajax inputs
        $('select[name="country_id"]').on('change', function(e) {
            e.preventDefault();

            var countryID = $(this).val();
            var url = "{{ route('patient_auth.createcityajax', ':id') }}";
            url = url.replace(':id', countryID);

            if (countryID) {
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="city_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city_id"]').append('<option value="' +
                                value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="city"]').empty();
            }
        });
    </script> --}}


    <!-- international telephone input -->
    <script src="{{ URL::asset('plugins/intltelinput/intlTelInput.min.js') }}"></script>

    <script>
        //to enable international telephone input (#int-miphone) is where we need to insert it
        const phoneInputField = document.querySelector("#int-miphone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            //preferred countries https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2
            preferredCountries: ["eg", "sa", "ae", "qa"],
            utilsScript: "{{ URL::asset('plugins/intltelinput/utils.js') }}",
        });
        const phoneInputField2 = document.querySelector("#int-miphone2");
        const phoneInput2 = window.intlTelInput(phoneInputField2, {
            //preferred countries https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2
            preferredCountries: ["eg", "sa", "ae", "qa"],
            utilsScript: "{{ URL::asset('plugins/intltelinput/utils.js') }}",
        });
    </script>

@endsection
