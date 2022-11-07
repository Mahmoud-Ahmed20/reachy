@extends('layouts.master')

@section('title', 'New Service | Proxima - Medical Management app')

@section('title-topbar', 'New Service')

<!-- css insert -->
@section('css')

    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection


<!-- content insert -->
@section('content')

    <div class="container-fluid px-0 px-md-2 mt-3">

        <!-- page title link -->
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <span class="mb-0">
                <a class="link-cust-text text-gray-200 fw-light"
                    href="{{ route('sett.home') }}">{{ __('basic.dashboard') }} |</a>
                <a class="link-cust-text text-gray-200 fw-light"
                    href="{{ route('sett.service_item.index') }}">{{ __('basic.services') }} | </a>
                <a class="text-gray-300">{{ __('patientappo.new service') }}</a>
            </span>
        </div>

        <div class="card card-input shadow mb-3 pb-3">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-x-ray me-1"></i>
                    {{ __('patientappo.new service') }}
                </h6>
            </div>


            <!-- Card Body -->
            <div class="card-body px-4 px-md-5">

                <form id="myform" method="POST" action="{{ route('sett.service_item.store') }}">

                    @csrf

                    <div class="row mb-1 justify-content-center">

                        <div class="col-12 col-md-10 col-lg-7">
                            <div class="row">

                                <div class="col-12 mb-3">
                                    <label class="form-label">{{ __('basic.specialty') }}
                                        <small>({{ __('basic.required') }})</small></label>
                                    <select id="specialty"
                                        class="js-example-basic-single select2-hidden-accessible @error('specialty_id') is-invalid @enderror"
                                        name="specialty_id" required>
                                        @foreach ($specialty as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="specialty_id-js-error-valid"></div>

                                    @error('specialty_id')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">{{ __('basic.branch') }}
                                        <small>({{ __('basic.required') }})</small></label>
                                    <select id="branch"
                                        class="js-example-basic-single select2-hidden-accessible @error('branch_id') is-invalid @enderror"
                                        name="branch_id" required>
                                        <option value="0">All</option>
                                        @foreach ($branch as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="branch_id-js-error-valid"></div>

                                    @error('branch_id')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">{{ __('basic.type') }}
                                        <small>({{ __('basic.required') }})</small></label>
                                    <select id="type"
                                        class="js-example-basic-single select2-hidden-accessible @error('service_inv_cat') is-invalid @enderror"
                                        name="service_inv_cat" required>
                                        @foreach ($service as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="service_inv_cat-js-error-valid"></div>

                                    @error('service_inv_cat')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">{{ __('basic.name') }}
                                        <small>({{ __('basic.required') }})</small></label>
                                    <input name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Serivce Name ..." required>

                                    @error('name')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">{{ __('basic.price') }}
                                        <small>({{ __('basic.required') }})</small></label>
                                    <input name="price" type="number"
                                        class="form-control @error('price') is-invalid @enderror"
                                        placeholder="Serivce Price ..." required>

                                    @error('price')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">{{ __('basic.package') }}
                                        <small>({{ __('basic.required') }})</small></label>
                                    <select id="package"
                                        class="js-example-basic-single select2-hidden-accessible @error('pulses_type') is-invalid @enderror"
                                        name="package" required>
                                        <option value="0">Not a Package</option>
                                        <option value="1">Sessions Package</option>
                                        <option value="2">Pulses Package</option>
                                    </select>
                                    <div id="package-js-error-valid"></div>

                                    @error('package')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div id="pulses_cont" class="col-12 mb-3" style="display: none">
                                    <label class="form-label">{{ __('basic.pulses') }}
                                        <small>({{ __('basic.optional') }})</small></label>
                                    <input id="pulses_amount" name="pulses_amount" type="number"
                                        class="form-control @error('pulses_amount') is-invalid @enderror"
                                        placeholder="Pulses amount ..." disabled>

                                    @error('pulses_amount')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div id="package_items_number_cont" class="col-12 mb-3" style="display: none">
                                    <label class="form-label">{{ __('basic.package items number') }}
                                        <small>({{ __('basic.required') }})</small></label>
                                    <input id="package_items_number" name="package_items_number" type="number"
                                        class="form-control @error('pulses') is-invalid @enderror"
                                        placeholder="Package items number ..." required disabled>

                                    @error('package_items_number')
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
                    case 'gendar':
                        error.insertAfter($("#gendar-js-error-valid"));
                        break;
                    default:
                        error.insertAfter(element);
                }

            },
        });
    </script>
    <script>
        $(document).ready(function() {

            //for packages
            $("#package").on('change', function() {
                var type = $(this).val();
                if (type == 0) {
                    $('#package_items_number_cont').hide();
                    $('#package_items_number').prop('disabled', true);
                    if ($('#type').val() == 3) {
                        $('#pulses_cont').show();
                        $('#pulses_amount').prop('disabled', false);
                    }
                } else {
                    $('#package_items_number_cont').show();
                    $('#package_items_number').prop('disabled', false);
                    $('#pulses_cont').hide();
                    $('#pulses_amount').prop('disabled', true);
                }
            });

            //for session
            $("#type").on('change', function() {
                var type = $(this).val();
                if (type == 3) {
                    $('#pulses_cont').show();
                    $('#pulses_amount').prop('disabled', false);
                } else {
                    $('#pulses_cont').hide();
                    $('#pulses_amount').prop('disabled', true);
                }
            });

        });
    </script>

@endsection
