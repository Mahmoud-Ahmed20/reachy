@extends('admin/layouts.master')

@section('title', 'Edit User')

@section('title-topbar', 'Edit User')

<!-- css insert -->
@section('css')

    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- boostrap datepicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

    <!-- international telephone input -->
    <link href="{{ URL::asset('plugins/intltelinput/intlTelInput.css') }}" rel="stylesheet">


@endsection


<!-- content insert -->
@section('content')

    <div class="container-fluid px-2 mt-3">

        <!-- page title link -->
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <span class="mb-0">
                <a class="link-cust-text text-gray-200 fw-light" href="">Dashboard |</a>
                <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.admin.index') }}">Users | </a>
                <a class="text-gray-300">Edit user</a>
            </span>
        </div>

        <div class="card card-input shadow mb-3 pb-3">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-user-edit me-2"></i> Edit {{ $user->first_name }}
                    Profile
                </h6>
            </div>

            <!-- Card Body -->
            <div class="card-body px-3">

                <div class="multi-setps-form-calander col-12">

                    <form id="myform" method="POST" action="{{ route('sett.admin.update', $user->id) }}"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')


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
                                        <i class="bi bi-person"></i>
                                    </div>
                                    Personal
                                </a>
                            </li>

                            <li>
                                <a>
                                    <div class="icon-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-pin-map"></i>
                                    </div>
                                    Work
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
                                            <img src="{{ URL::asset('img/useravatar/' . $user->avatar) }}"
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
                                        <label class="form-label">First Name <small>(required)</small></label>
                                        <input name="first_name" type="text"
                                            class="form-control @error('first_name') is-invalid @enderror"
                                            placeholder="Ahmed..." value="{{ $user->first_name }}" autofocus required>
                                    </div>

                                    @error('first_name')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                    <div class="mb-3">
                                        <label class="form-label">Last Name <small>(required)</small></label>
                                        <input name="second_name" type="text"
                                            class="form-control @error('second_name') is-invalid @enderror"
                                            placeholder="Yousef..." value="{{ $user->second_name }}" required>
                                    </div>

                                    @error('second_name')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row mb-2">

                                <div class="col-12 col-md-4 mb-2">
                                    <label class="form-label">Email <small>(required)</small></label>
                                    <input name="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Write your email here" value="{{ $user->email }}" required>

                                    <input name="old_email" type="hidden" value="{{ $user->email }}">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @else
                                        <div class="form-text text-gray-200">We'll never share your email with anyone else.
                                        </div>
                                    @endif
                                </div>

                                <div class="col-12 col-md-4 mb-2">
                                    <label class="form-label">Role <small>(required)</small></label>
                                    <select class="js-example-basic-single select2-no-search select2-hidden-accessible"
                                        name="role[]" multiple required>
                                        @foreach ($roles as $iteam)
                                            <option value="{{ $iteam->id }}"
                                                @if (in_array($iteam->id, $userRole)) selected @endif>
                                                {{ $iteam->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="role-js-error-valid"></div>

                                    @error('role')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>



                            </div>


                            <div class="row mb-2">
                                <div class="col-12 col-md-6 mb-2">
                                    <label class="form-label">New Password <small>(required)</small></label>
                                    <input id="password" name="newpassword" type="password"
                                        class="form-control @error('newpassword') is-invalid @enderror"
                                        placeholder="Wrtie your password here...">

                                    @if ($errors->has('newpassword'))
                                        <span class="error-msg-form">
                                            {{ $errors->first('newpassword') }}
                                        </span>
                                    @else
                                        <div class="form-text text-gray-200">Leave it empty if you do not want to change it.
                                        </div>
                                    @endif
                                </div>


                                <div class="col-12 col-md-6 mb-2">
                                    <label class="form-label">Confirm New password <small>(required)</small></label>
                                    <input name="newpassword_confirmation" type="password" class="form-control"
                                        placeholder="Confirm your password..." id="password-confirm">
                                </div>

                            </div>

                            <div class="d-flex justify-content-end mt-3">
                                <input type="button" name="next"
                                    class="next-form-steps btn btn-primary action-button-next" value="Continue" />
                            </div>
                        </div>


                        <div class="cont_tap" id="time">

                            <div class="row mb-2">

                                <div class="col-12 col-md-6 mb-2">
                                    <label class="form-label">Gendar <small>(required)</small></label>
                                    <select
                                        class="js-example-basic-single select2-no-search select2-hidden-accessible @error('gendar') is-invalid @enderror"
                                        name="gendar" required>
                                        <option value="male" @if ($user->gendar === 'male') selected @endif>Male
                                        </option>
                                        <option value="female" @if ($user->gendar === 'female') selected @endif>Female
                                        </option>
                                    </select>
                                    <div id="gendar-js-error-valid"></div>

                                    @error('gendar')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                                <div class="col-12 col-md-6 mb-2">


                                    <label class="form-label">Birthday <small>(required)</small></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-calendar2-week-fill"></i> </div>
                                        </div>
                                        <input name="birthday" type="text"
                                            class="form-control hasdatetimepicker @error('birthday') is-invalid @enderror"
                                            placeholder="YYYY/MM/DD" value="{{ $user->birthday }}" required>
                                    </div>
                                    <div id="birthday-js-error-valid"></div>

                                    @error('birthday')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                            </div>

                            <hr>

                            <div class="row mb-2">

                                <div class="col-12 col-md-6 mb-2">
                                    <label class="form-label">Country <small>(required)</small></label>
                                    <select
                                        class="js-example-basic-single select2-hidden-accessible @error('country_id') is-invalid @enderror"
                                        name="country_id" required>
                                        @foreach ($countries as $iteam)
                                            <option value="{{ $iteam->id }}"
                                                @if ($user->country_id == $iteam->id) selected @endif>
                                                {{ $iteam->name_en }}</option>
                                        @endforeach
                                    </select>
                                    <div id="country-js-error-valid"></div>

                                    @error('country_id')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                                <div class="col-12 col-md-6 mb-2">
                                    <label class="form-label">City <small>(required)</small></label>
                                    <select
                                        class="js-example-basic-single select2-hidden-accessible @error('city_id') is-invalid @enderror"
                                        name="city_id" required>
                                        <option value="{{ $user->city['id'] }}" selected>
                                            {{ $user->city['name_en'] }}
                                        </option>
                                    </select>

                                    <div id="city-js-error-valid"></div>

                                    @if ($errors->has('city'))
                                        <span class="error-msg-form">
                                            {{ $errors->first('city') }}
                                        </span>
                                    @else
                                        <div class="form-text text-gray-200">Select the country first
                                        </div>
                                    @endif
                                </div>

                            </div>

                            <hr>

                            <div class="row mb-2">

                                <div class="col-12 col-md-6 mb-2">
                                    <label class="form-label">Phone Number <small>(required)</small></label>
                                    <input id="int-miphone" name="phone_number" type="tel"
                                        class="form-control @error('phone_number') is-invalid @enderror"
                                        value="{{ $user->phone_number }}" required>

                                    <input name="old_phone_number" type="hidden" value="{{ $user->phone_number }}">

                                    <div id="phonenumber-js-error-valid">
                                    </div>

                                    @if ($errors->has('phone_number'))
                                        <span class="error-msg-form">
                                            {{ $errors->first('phone_number') }}
                                        </span>
                                    @else
                                        <div class="form-text text-gray-200">We'll never share your email with anyone else.
                                        </div>
                                    @endif
                                </div>



                                <div class="col-12 col-md-6 mb-2">
                                    <label class="form-label">Second Phone Number <small>(optional)</small></label>
                                    <input id="int-miphone2" name="sec_phone_number" type="tel"
                                        class="form-control @error('sec_phone_number') is-invalid @enderror"
                                        value="{{ $user->sec_phone_number }}">

                                    <div id="secphonenumber-js-error-valid"></div>

                                    @error('sec_phone_number')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror


                                </div>


                            </div>

                            <div class="d-flex justify-content-between p-4">
                                <input type="button" name="previous"
                                    class="previous-form-steps btn btn-secondary action-button-previous"
                                    value="Previous" />
                                <input type="button" name="next"
                                    class="next-form-steps btn btn-primary action-button-next" value="Continue" />
                            </div>
                        </div>

                        <div class="cont_tap" id="about">

                            <div class="row mb-2">


                                <div class="col-12 col-md-4 mb-2">
                                    <label class="form-label">Activision <small>(required)</small></label>
                                    <select
                                        class="js-example-basic-single select2-no-search select2-hidden-accessible @error('deactivate') is-invalid @enderror"
                                        name="deactivate" required>
                                        <option value="0" @if ($user->deactivate === '0') selected @endif>Active
                                        </option>
                                        <option value="1" @if ($user->deactivate === '1') selected @endif>
                                            Deactivate</option>
                                    </select>
                                    <div id="deactivate-js-error-valid"></div>

                                    @error('deactivate')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                            </div>

                            <div class="row mb-2">
                                <div class="mb-3">
                                    <label class="form-label">Note <small>(optional)</small></label>
                                    <textarea name="note" class="form-control" placeholder="Write here your notes .." rows="4"
                                        spellcheck="false">{{ $user->note }}</textarea>
                                </div>

                                @error('note')
                                    <span class="error-msg-form">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between p-4">
                                <input type="button" name="previous"
                                    class="previous-form-steps btn btn-secondary action-button-previous"
                                    value="Previous" />
                                <input type="submit" name="next"
                                    class="next-form-steps btn btn-primary action-button-next" value="Continue" />
                            </div>
                        </div>

                        <div class="cont_tap" id="sending">
                            <div class="d-flex justify-content-center p2">
                                <img src="{{ URL::asset('img/dashboard/system/loading-dash.svg') }}"
                                    style="width: 195px;" alt="Loading" />
                            </div>
                        </div>

                    </form>
                </div>

            </div>

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
                newpassword: {
                    minlength: 7,
                    maxlength: 100,
                },
                password_confirmation: {
                    minlength: 7,
                    maxlength: 100,
                    equalTo: '#password',
                },
                sec_phone_number: {
                    minlength: 3,
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
                    case 'gendar':
                        error.insertAfter($("#gendar-js-error-valid"));
                        break;
                    case 'birthday':
                        error.insertAfter($("#birthday-js-error-valid"));
                        break;
                    case 'country_id':
                        error.insertAfter($("#country-js-error-valid"));
                        break;
                    case 'city_id':
                        error.insertAfter($("#city-js-error-valid"));
                        break;
                    case 'started_work':
                        error.insertAfter($("#startedwork-js-error-valid"));
                        break;
                    case 'phone_number':
                        error.insertAfter($("#phonenumber-js-error-valid"));
                        break;
                    case 'sec_phone_number':
                        error.insertAfter($("#secphonenumber-js-error-valid"));
                        break;
                    case 'deactivate':
                        error.insertAfter($("#deactivate-js-error-valid"));
                        break;

                    default:
                        error.insertAfter(element);
                }


            },
        });
    </script>
    <script>
        //for country and cities ajax inputs
        $('select[name="country_id"]').on('change', function(e) {

            e.preventDefault();

            var countryID = $(this).val();
            var url = "{{ route('sett.createcityajax', ':id') }}";
            url = url.replace(':id', countryID);

            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="city_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city_id"]').append('<option value="' +
                                value.id + '">' + value.name_en + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="city"]').empty();
            }
        });
    </script>


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
