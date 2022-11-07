@extends('layouts.master')

@section('title', 'Edit Place | Proxima - Medical Management app')

@section('title-topbar', 'Edit Place')

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
                <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.oper_placecat.index') }}">Place |
                </a>
                <a class="text-gray-300">New Place</a>
            </span>
        </div>

        <div class="card card-input shadow mb-3 pb-3">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-map-marker-alt me-1"></i> Edit Operation Place</h6>
            </div>


            <!-- Card Body -->
            <div class="card-body px-4 px-md-5">

                <form id="myform" method="POST" action="{{ route('sett.oper_placecat.update', $oper_placecat->id) }}">

                    @csrf
                    @method('PUT')

                    <div class="row mb-1 justify-content-center">

                        <div class="col-12 col-md-10 col-lg-7">
                            <div class="row">

                                <div class="col-12 mb-3">
                                    <label class="form-label">Name
                                        <small>(required)</small></label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Operation Place Name.." value="{{ $oper_placecat->name }}" required>

                                    @error('name')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-12 mb-3">
                                    <label class="form-label">Address
                                        <small>(required)</small></label>
                                    <input name="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror"
                                        placeholder="Operation Place Address.." value="{{ $oper_placecat->address }}"
                                        required>

                                    @error('address')
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
