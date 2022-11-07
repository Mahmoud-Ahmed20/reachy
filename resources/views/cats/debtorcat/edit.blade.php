@extends('layouts.master')

@section('title', 'Edit Debtor | Proxima - Medical Management app')

@section('title-topbar', 'Edit Debtor')

<!-- css insert -->
@section('css')

@endsection


<!-- content insert -->
@section('content')

    <div class="container-fluid px-0 px-md-2 mt-3">

        <!-- page title link -->
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <span class="mb-0">
                <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.home') }}">Dashboard |</a>
                <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.debtorcat.index') }}">Debtors | </a>
                <a class="text-gray-300">New Debtor</a>
            </span>
        </div>

        <div class="card card-input shadow mb-3 pb-3">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-map-marker-alt me-1"></i> Edit Debtor</h6>
            </div>


            <!-- Card Body -->
            <div class="card-body px-4 px-md-5">

                <form id="myform" method="POST" action="{{ route('sett.debtorcat.update', $debtor->id) }}"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row mb-1 justify-content-center">

                        <div class="col-12 col-md-11 col-lg-8">

                            <div class="row mb-1">
                                <div class="col-12 col-md-5 align-self-center mb-2">

                                    <div class="avatar-update-container">
                                        <div class="picture">
                                            <img src="{{ URL::asset('img/useravatar/' . $debtor->avatar) }}"
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
                                        <label class="form-label">First Name
                                            <small>(required)</small></label>
                                        <input name="first_name" type="text"
                                            class="form-control @error('first_name') is-invalid @enderror"
                                            placeholder="Ahmed212 ..." autofocus required
                                            value="{{ $debtor->first_name }}">
                                    </div>

                                    @error('first_name')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror


                                    <div class="mb-3">
                                        <label class="form-label">Second Name
                                            <small>(optional)</small></label>
                                        <input name="second_name" type="text"
                                            class="form-control @error('second_name') is-invalid @enderror"
                                            placeholder="Ibrahm ..." value="{{ $debtor->second_name }}">
                                    </div>

                                    @error('second_name')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror


                                    <div class="mb-3">
                                        <label class="form-label">Company Name
                                            <small>(optional)</small></label>
                                        <input name="company_name" type="text"
                                            class="form-control @error('company_name') is-invalid @enderror"
                                            placeholder="Lamar Company ..." value="{{ $debtor->company_name }}">
                                    </div>

                                    @error('company_name')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4 mb-2">
                        <input type="submit" name="next" class="next-form-steps btn btn-primary action-button-next"
                            value="Send">
                    </div>

                </form>
            </div>

        </div>

    </div>

@endsection

<!-- js insert -->
@section('js')

    <!-- validate jquery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js" type="text/javascript">
    </script>
    <script>
        //Rules for the Validator plugin
        var $validator = $('#myform').validate({
            rules: {
                name: {
                    minlength: 3,
                },
                address: {
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
                    default:
                        error.insertAfter(element);
                }

            },
        });
    </script>

@endsection
