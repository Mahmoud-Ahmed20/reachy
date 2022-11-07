@extends('layouts.master')

@section('title', 'Edit Coupon | Proxima - Medical Management app')

@section('title-topbar', 'Edit Coupon')

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
                <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.home') }}">Dashboard
                    |</a>
                <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.couponcat.index') }}">Coupon | </a>
                <a class="text-gray-300">Edit Coupon</a>
            </span>
        </div>

        <div class="card card-input shadow mb-3 pb-3">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-money-check-alt me-1"></i> Edit Coupon</h6>
            </div>


            <!-- Card Body -->
            <div class="card-body px-4 px-md-5">

                <form id="myform" method="POST" action="{{ route('sett.couponcat.update', $coupon->id) }}">

                    @csrf
                    @method('PUT')

                    <div class="row mb-1 justify-content-center">

                        <div class="col-12 col-md-10 col-lg-7">
                            <div class="row">

                                <div class="col-12 mb-3">
                                    <label class="form-label">Code
                                        <small>(required)</small></label>
                                    <input name="code" type="text" value="{{ $coupon->code }}"
                                        class="form-control @error('code') is-invalid @enderror"
                                        placeholder="Coupon code ..." required disabled>

                                    @error('code')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Type
                                        <small>(required)</small></label>
                                    <select id="type"
                                        class="js-example-basic-single select2-hidden-accessible @error('type') is-invalid @enderror"
                                        name="type" required>
                                        <option @if ($coupon->type == 'fixed') selected @endif value="fixed">Fixed</option>
                                        <option @if ($coupon->type == 'percent') selected @endif value="percent">Percent</option>
                                    </select>
                                    <div id="type-js-error-valid"></div>

                                    @error('type')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-12 mb-3">
                                    <label class="form-label">Value
                                        <small>(required)</small></label>
                                    <input name="value" type="number" value="{{ $coupon->value }}"
                                        class="form-control @error('value') is-invalid @enderror"
                                        placeholder="Coupon Value ..." required @if ($coupon->type !== 'fixed') disabled @endif>

                                    @error('value')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Percent
                                        <small>(required)</small></label>
                                    <input name="percent" type="number" value="{{ $coupon->percent_off }}"
                                        class="form-control @error('percent') is-invalid @enderror"
                                        placeholder="Coupon Percent ..." required required @if ($coupon->type !== 'percent') disabled @endif>

                                    @error('percent')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Status
                                        <small>(required)</small></label>
                                    <select id="status"
                                        class="js-example-basic-single select2-hidden-accessible @error('status') is-invalid @enderror"
                                        name="status" required>
                                        <option @if ($coupon->status == '0') selected @endif value="0">Deactivate</option>
                                        <option @if ($coupon->status == '1') selected @endif value="1">Active</option>
                                    </select>
                                    <div id="status-js-error-valid"></div>

                                    @error('status')
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
                    case 'type':
                        error.insertAfter($("#type-js-error-valid"));
                        break;
                    case 'status':
                        error.insertAfter($("#status-js-error-valid"));
                        break;
                    default:
                        error.insertAfter(element);
                }

            },
        });



        $("#type").on('change', function() {
            var type = $(this).val();
            console.log(type);

            if (type === "fixed") {
                $('input[name = "value"]').prop('disabled', false);
                $('input[name = "percent"]').prop('disabled', true);
            } else {
                $('input[name = "percent"]').prop('disabled', false);
                $('input[name = "value"]').prop('disabled', true);
            }
        })
    </script>

@endsection
