@extends('layouts.master')

@section('title', 'Attendance | Proxima - Medical Management app')

@section('title-topbar', __('basic.attendance'))

<!-- css insert -->
@section('css')

    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('fixedcontent')

    <!-- session successful message -->
    @if (Session::has('success'))
        <div id="flash-msg" class="shadow pt-3">
            <div class="d-flex justify-content-between mb-2">
                <i class="fas fs-1 fa-check"></i>
                <a id="flash-msg-btn" class="text-blue-300 clickable-item-pointer"><i class="fas fa-times"></i></a>
            </div>
            <h3>Sent Successfully</h3>
            <p class="text-blue-300">{{ Session::get('success') }}</p>
        </div>
    @endif

    <!-- session successful message -->
    @if (Session::has('error_delete'))
        <div id="flash-msg" class="shadow pt-3" style="background-color:#ff4152;">
            <div class="d-flex justify-content-between mb-2">
                <i class="fas fs-1 fa-times"></i>
                <a id="flash-msg-btn" class="text-blue-300 clickable-item-pointer"><i class="fas fa-times"
                        style="color:#ffb4bc"></i></a>
            </div>
            <h3>There is a problem</h3>
            <p style="color:#ffb4bc">{{ Session::get('error_delete') }}</p>
        </div>
    @endif

@endsection


<!-- content insert -->
@section('content')

    <div class="col-6">
        <div id="branch_id_all-js-error-valid"></div>

        @error('branch_id_all')
            <span class="error-msg-form">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="container-fluid px-2 mt-3">

        <div class="row justify-content-center position-relative">

            <div class="col-12 col-md-10 col-lg-8 col-xl-7 text-center">
                <img class="img-fluid p-md-2" width="500px"
                    src="{{ URL::asset('img/dashboard/undraw_reminders_re.svg') }}" alt="">

                <div class="search-eng-cont" style="margin-top: -100px">

                    <div class="p-4 px-4 px-md-5 bg-white b-r-l-cont"
                        style="box-shadow: -1px 1rem 1rem 7px rgb(58 59 69 / 15%) !important; ">

                        <div class="text-start d-flex justify-content-between mb-2">
                            <h6 class="text-gray-400 fw-bold">
                                <i class="fas fa-clock me-1"></i> {{ __('basic.current time') }}:
                            </h6>
                            <p class="text-gray-300 text-end"> {{ Carbon\Carbon::now() }}</p>
                        </div>

                        @if (!$atten)
                            <div class="text-start d-flex justify-content-between align-items-center mb-2">
                                <h6 class="text-gray-400 fw-bold">
                                    <i class="fas fa-map-pin me-1"></i> {{ __('basic.my location') }}:
                                </h6>

                                <div id="cont_location">

                                    <iframe id="iframe_lt_lon" style="display: none"
                                        src="https://maps.google.com/maps?q=30.013809,31.192262&t=&z=15&ie=UTF8&iwloc=&output=embed">
                                    </iframe>

                                </div>

                            </div>
                        @endif

                        @if (empty($atten->leave_time))

                            @if (Auth::user()->branch_id == 0)
                                <div class="text-start d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="text-gray-400 fw-bold">
                                        <i class="fas fa-globe-africa me-1"></i> {{ __('basic.branch') }}:
                                    </h6>

                                    <div class="col-6 col-md-4">
                                        <select id="branch_id_all"
                                            class="select2-no-search select2-hidden-accessible @error('branch_id_all') is-invalid @enderror"
                                            name="branch_id_all" required>
                                            @foreach ($branches as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="branch_id_all-js-error-valid"></div>

                                        @error('branch_id_all')
                                            <span class="error-msg-form">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                        @endif

                        <hr>

                        <div class="text-start d-flex justify-content-between align-items-center mb-2">
                            <h6 class="text-gray-400 fw-bold">
                                <i class="fas fa-door-open me-1"></i> {{ __('basic.arrived') }}:
                            </h6>
                            @if ($atten)
                                <p class="text-gray-300 text-end"><i class="fas fa-check me-1"></i>
                                    {{ date('d M Y | h:i A', strtotime($atten->arrived_time)) }}</p>
                            @else
                                <a data-bs-toggle="modal" data-bs-target="#attendance_modal"
                                    class="status-col-link main-color-btn text-white clickable-item-pointer shadow-sm b-r-l-cont rate-appointment p-2 px-3">
                                    <i class="fas fa-paper-plane fa-sm"></i>
                                    {{ __('basic.arrive') }}
                                </a>
                            @endif
                        </div>

                        @if (!empty($atten->arrived_time))

                            <div class="text-start d-flex justify-content-between align-items-center mb-2">
                                <h6 class="text-gray-400 fw-bold">
                                    <i class="fas fa-door-closed"></i> {{ __('basic.leave') }}:
                                </h6>
                                @if ($atten->leave_time)
                                    <p class="text-gray-300 text-end"><i class="fas fa-check me-1"></i>
                                        {{ date('d M Y | h:i A', strtotime($atten->leave_time)) }}
                                    </p>
                                @else
                                    <a data-bs-toggle="modal" data-bs-target="#attendance_modal"
                                        class="status-col-link main-color-btn text-white clickable-item-pointer shadow-sm b-r-l-cont rate-appointment p-2 px-3">
                                        <i class="fas fa-paper-plane fa-sm"></i>
                                        {{ __('basic.leave') }}
                                    </a>
                                @endif
                            </div>
                        @endif

                        @if (!empty($atten->leave_time))
                            <hr>
                            <div class="text-start d-flex justify-content-between align-items-center mb-2">
                                <h6 class="text-gray-400 fw-bold">
                                    <i class="fas fa-stopwatch"></i> {{ __('basic.working hours') }}:
                                </h6>
                                <p class="text-gray-300 text-end"><i class="fas fa-check me-1"></i>
                                    @php
                                        $totalDuration = Carbon\Carbon::parse($atten->leave_time)
                                            ->diff($atten->arrived_time)
                                            ->format('%H hour %i minute');
                                    @endphp
                                    {{ $totalDuration }}
                                </p>
                            </div>
                        @endif


                    </div>

                </div>

            </div>
        </div>




    </div>


    <!-- Modal -->
    <div class="modal fade" id="attendance_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
            <div class="modal-content b-r-s-cont border-0">

                <div class="modal-header">
                    <div class="modal-title" id="exampleModalLabel"><i class="fas fa-charging-station me-1"></i>
                        Attendance</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal content -->
                <div class="modal-body px-4">

                    <div class="modal-body delete-conf-input text-center py-0">
                        <p class="mb-0">{{ __('basic.attendance confirm msg') }}</p><br>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="left-side">
                        <button type="button" class="btn btn-default btn-link" data-bs-dismiss="modal">Never
                            Mind</button>
                    </div>
                    <div class="divider"></div>
                    <div class="right-side">
                        <button id="get_location" type="submit" class="btn btn-default btn-link text-success">
                            <div id="spinner_loding" style="display: none;"
                                class="spinner-border text-success spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            {{ __('basic.send') }}
                        </button>
                    </div>
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

    <script>
        $(document).ready(function() {

            //--------------------- fetch appoingtments -------------------

            getLocation();

            function getLocation() {
                location_cont = $('#cont_location');

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                } else {
                    location_cont.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            $(document).on('click', '#get_location', function() {
                $('#spinner_loding').show();

                location_cont = $('#cont_location');
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition_send, showError);
                } else {
                    location_cont.innerHTML = "Geolocation is not supported by this browser.";
                }
            })

            function showPosition(position) {
                var lati = $('#lati');
                var long = $('#long');

                location_cont = $('#cont_location');

                iframe_lt_lon = $('#iframe_lt_lon');

                iframe_lt_lon.attr('src',
                    'https://maps.google.com/maps?q=' + position.coords.latitude + ',' + position.coords
                    .longitude + '&t=&z=15&ie=UTF8&iwloc=&output=embed');

                iframe_lt_lon.show();

                //lati.val(position.coords.latitude);
                //long.val(position.coords.longitude);
                //$('#attendance_modal').modal('show');
            }

            function showPosition_send(position) {
                var lati = position.coords.latitude;
                var long = position.coords.longitude;

                console.log(position.coords.longitude);

                var url = "{{ route('sett.hr_worker_attendance_insert') }}";

                var branch_id_all = $('#branch_id_all').val();

                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        '_method': "POST",
                        'lati': lati,
                        'long': long,
                        'branch_id': branch_id_all,
                    },
                    success: function(data) {
                        $('#attendance_modal').modal('hide')
                        location.reload();
                    }
                });

            }


            function showError(error) {
                location_cont = $('#cont_location');
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        location_cont.innerHTML = "User denied the request for Geolocation."
                        break;
                    case error.POSITION_UNAVAILABLE:
                        location_cont.innerHTML = "Location information is unavailable."
                        break;
                    case error.TIMEOUT:
                        location_cont.innerHTML = "The request to get user location timed out."
                        break;
                    case error.UNKNOWN_ERROR:
                        location_cont.innerHTML = "An unknown error occurred."
                        break;
                }
            }

        });
    </script>

@endsection
