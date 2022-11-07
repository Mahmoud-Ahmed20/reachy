@extends('layouts.master')

@section('title', 'Create attendance | Proxima - Medical Management app')

@section('title-topbar', 'Create attendance')

<!-- css insert -->
@section('css')

    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- datepicker time and date -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

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
                <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.admin.index') }}">Users | </a>
                <a class="text-gray-300">Create attendance</a>
            </span>
        </div>

        <div class="card card-input shadow mb-3 pb-3">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-x-ray me-1"></i>
                    Create attendance
                </h6>
            </div>

            <!-- Card Body -->
            <div class="card-body px-4 px-md-5">

                <form id="myform" method="POST" action="{{ route('sett.hr_insert_attendance_admin') }}">

                    @csrf
                    @method('POST')

                    <div class="row mb-1 justify-content-center">

                        <div class="col-12 col-md-10 col-lg-7">
                            <div class="row">

                                <div class="col-12 mb-3">
                                    <label class="form-label">{{ __('basic.branch') }}
                                        <small>({{ __('basic.required') }})</small></label>
                                    <select id="branch_id"
                                        class="js-example-basic-single select2-hidden-accessible @error('branch_id') is-invalid @enderror"
                                        name="branch_id" required>
                                        @foreach ($branches as $item)
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
                                    <label class="form-label">Worker
                                        <small>(requried)</small></label>

                                    <input id="doctor_receivable_id" type="text"
                                        class="form-control @error('doctor_id') is-invalid @enderror"
                                        placeholder="Write here doctor name ...">

                                    @error('doctor_id')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                    <input type="hidden" id="doctor_id" name="doctor_id" value="">

                                    <div id="doctor_search-eng-show-list"
                                        class="search-eng-results list-group p-4 bg-white b-r-l-b-cont"
                                        style="box-shadow: -1px 1rem 1rem 7px rgb(58 59 69 / 15%) !important; display:none; margin-top: -3px; border:1px solid #bcd8ff; border-top: 0px">
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">{{ __('basic.start') }}
                                        <small>({{ __('basic.required') }})</small></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-calendar2-week-fill"></i>
                                            </div>
                                        </div>
                                        <input name="arrived_time" type="text"
                                            class="form-control datepicker_time bg-white @error('arrived_time') is-invalid @enderror"
                                            placeholder="YYYY/MM/DD HM" data-enable-time="true" value="" required>
                                    </div>
                                    <span id="arrived_time_error" class="error-msg-form"></span>

                                    @error('arrived_time')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-2">
                                    <label class="form-label">{{ __('basic.end') }}
                                        <small>({{ __('basic.required') }})</small></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-calendar2-week-fill"></i>
                                            </div>
                                        </div>
                                        <input name="leave_time" type="text"
                                            class="form-control datepicker_time_only bg-white @error('leave_time') is-invalid @enderror"
                                            placeholder="YYYY/MM/DD HM" data-enable-time="true" value="" required>
                                    </div>
                                    <span id="leave_time_error" class="error-msg-form"></span>

                                    @error('leave_time')
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

    <!-- datapicker date and time -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        //-------- datepicker time --------
        $('.datepicker_time').flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
        $('.datepicker_time_only').flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });
    </script>


    <script>
        //search doctor
        $("#doctor_receivable_id").keyup(function() {
            let search_query = $(this).val();

            var url = "{{ route('sett.invo_doctor_search', ':search_query') }}";
            url = url.replace(':search_query', search_query);

            if (search_query != "") {
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        $("#doctor_search-eng-show-list").show();

                        if (data !== "") {
                            var html = ''
                            $.each(data, function(key, value) {
                                html +=
                                    '<div data-doctor_id="' + value.id +
                                    '" data-doctor_name="' + value.name +
                                    '" class="doctor_search-eng-a clickable-item-pointer list-group-item list-group-item-action border-1 text-gray-500" style="cursor: pointer;"><i class="fas fa-search text-gray-200 me-2"></i> ' +
                                    value.name + '</div>';
                            });
                            $('#doctor_search-eng-show-list').html(html);
                        }

                        if (data == "") {
                            $('#doctor_search-eng-show-list').html(
                                '<a class="list-group-item list-group-item-action border-0"><i class="fas fa-search text-gray-200 me-2"></i>No Record</a>'
                            );
                        }
                    },
                });
            } else {
                $("#doctor_search-eng-show-list").empty();
                $("#doctor_search-eng-show-list").hide();;
            }
        });

        //send the id from the doctor search
        $(document).on("click", ".doctor_search-eng-a", function() {

            id = $(this).data('doctor_id');
            name = $(this).data('doctor_name');

            $('#doctor_id').val(id);
            $('#doctor_receivable_id').val(name);
            $("#doctor_search-eng-show-list").hide();;
        })
    </script>

@endsection
