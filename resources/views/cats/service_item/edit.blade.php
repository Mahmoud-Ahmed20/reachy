@extends('layouts.master')

@section('title', 'Edit Service | Proxima - Medical Management app')

@section('title-topbar', 'Edit Service')

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
                    href="{{ route('sett.home') }}">{{ __('basic.dashboard') }}
                    |</a>
                <a class="link-cust-text text-gray-200 fw-light"
                    href="{{ route('sett.service_item.index') }}">{{ __('basic.services') }} | </a>
                <a class="text-gray-300">{{ __('patientappo.edit service') }}</a>
            </span>
        </div>

        <div class="card card-input shadow mb-3 pb-3">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-x-ray me-1"></i>
                    {{ __('patientappo.edit service') }}
                </h6>
            </div>

            <!-- Card Body -->
            <div class="card-body px-4 px-md-5">

                <form id="myform" method="POST" action="{{ route('sett.service_item.update', $service->id) }}">

                    @csrf
                    @method('PUT')

                    <div class="row mb-1 justify-content-center">

                        <div class="col-12 col-md-10 col-lg-7">
                            <div class="row">

                                <div class="col-12 mb-3">
                                    <label class="form-label">{{ __('basic.specialty') }}
                                        <small>({{ __('basic.required') }})</small></label>
                                    <select id="specialty"
                                        class="js-example-basic-single select2-hidden-accessible @error('specialty_id') is-invalid @enderror"
                                        name="specialty_id" disabled>
                                        @foreach ($specialty as $item)
                                            <option @if ($service->specialty_id === $item->id) selected @endif
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="specialty_id-js-error-valid"></div>

                                    @error('specialty_id')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                @if ($service->id !== 2)
                                    <div class="col-12 mb-3">
                                        <label class="form-label">{{ __('basic.branch') }}
                                            <small>({{ __('basic.required') }})</small></label>
                                        <select id="branch_id"
                                            class="js-example-basic-single select2-hidden-accessible @error('branch_id') is-invalid @enderror"
                                            name="branch_id" required>
                                            <option @if ($service->branch_id == 0) selected @endif value="0">All
                                            </option>
                                            @foreach ($branch as $item)
                                                <option @if ($service->branch_id === $item->id) selected @endif
                                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="branch_id-js-error-valid"></div>

                                        @error('branch_id')
                                            <span class="error-msg-form">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                @endif

                                <div class="col-12 mb-3">
                                    <label class="form-label">{{ __('basic.type') }}
                                        <small>({{ __('basic.required') }})</small></label>
                                    <select id="type"
                                        class="js-example-basic-single select2-hidden-accessible @error('type') is-invalid @enderror"
                                        name="type" disabled>
                                        @foreach ($service_inv_cat as $item)
                                            <option @if ($service->service_inv_cat_id === $item->id) selected @endif
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="tyoe-js-error-valid"></div>

                                    @error('type')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">{{ __('basic.name') }}
                                        <small>({{ __('basic.required') }})</small></label>
                                    <input name="name" type="text" value="{{ $service->name }}"
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
                                    <input name="price" type="number" value="{{ $service->price }}"
                                        class="form-control @error('price') is-invalid @enderror"
                                        placeholder="Serivce Price ..." required>

                                    @error('price')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                @if ($service->service_inv_cat_id == 3)
                                    @if ($service->package == 0)
                                        <div class="col-12 mb-3">
                                            <label class="form-label">{{ __('basic.pulses') }}
                                                <small>({{ __('basic.required') }})</small></label>
                                            <input id="pulses_amount" name="pulses_amount" type="number"
                                                class="form-control @error('pulses_amount') is-invalid @enderror"
                                                placeholder="Pulses amount ..." value="{{ $service->pulses }}">

                                            @error('pulses_amount')
                                                <span class="error-msg-form">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    @endif
                                @endif

                                @if ($service->package == 1 || $service->package == 2)
                                    <div class="col-12 mb-3">
                                        <label class="form-label">{{ __('basic.package items number') }}
                                            <small>({{ __('basic.required') }})</small></label>
                                        <input id="package_items_number" name="package_items_number" type="number"
                                            class="form-control @error('package_items_number') is-invalid @enderror"
                                            placeholder="package items number  ..."
                                            value="{{ $service->package_items_number }}" required>

                                        @error('package_items_number')
                                            <span class="error-msg-form">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4 mb-2">
                        <input type="submit" name="next" class="next-form-steps btn btn-primary action-button-next"
                            value="{{ __('basic.send') }}">
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

@endsection
