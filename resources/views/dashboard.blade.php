@extends('admin/layouts.master')

@section('title', 'Dashboard | Proxima - Medical Management app')

@section('title-topbar', __('basic.dashboard'))

<!-- css insert -->
@section('css')
@endsection


<!-- content insert -->
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid px-2 mt-0 mt-md-5 pt-0 pt-md-4">

        <!-- welcome msg & note -->
        <div class="row mb-4">
            <div class="col-12 col-md-8 mb-4 mb-md-0">
                <div class="card shadow h-100">
                    <!-- Card Body -->
                    <div class="wlc-msg d-flex card-body h-100">

                        <div class="row flex-row-reverse justify-content-between align-items-center">

                            <div class="col-12 col-md-5">
                                <img class="img-fluid p-md-2"
                                    src="{{ URL::asset('img/dashboard/undraw_personal_information.svg') }}" alt="">
                            </div>

                            <div class="col-12 col-md-7 ps-4">
                                <h1 class="fw-bold mt-1 lh-1" style="color: #1a78f1;">
                                    {{ __('basic.hello') }}
                                    <small class="fs-6 fw-bold text-gray-600 lh-1 text-capitalize">
                                        {{ Auth::user()->first_name . ' ' . Auth::user()->second_name }}</small>
                                </h1>
                                <p class="text-gray-400 mb-2">{{ __('basic.dashboard msg') }}</p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

            <div class="col">
                <div class="card shadow notes-dashbaord h-100">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 fw-bold">{{ __('basic.note') }}</h6>
                        <div class="dropdown no-arrow">

                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body d-flex align-items-center text-center h-100 justify-content-center position-relative"
                        id="note_add">
                        @if (!empty($user_note->note))
                            <textarea id="note_insert" name="note" style="height: 68px !important;" class="form-control border-0"
                                placeholder="Write here your notes .." rows="4" spellcheck="false">{{ $user_note->note }}</textarea>
                        @else
                            <a class="add-new-note link-cust-text text-gray-400" href="#">
                                <i class="fas fa-plus-circle fa-sm fa-fw fs-4"></i>
                                <p class="fw-light mb-0">{{ __('basic.put your note') }}</p>
                            </a>
                        @endif

                    </div>

                </div>
            </div>
        </div>


        <!-- overview analysis -->
        <div class="row">

            <!-- total doctors -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100  p-1 " style="background-color: #1a78f1;">
                    <div class="card-body p-2 px-5 px-md-4">
                        <div class="row no-gutters align-items-center">
                            <p class="text-center text-s fw-bold text-blue-200">{{ __('basic.total workers') }}</p>

                            <div class="col me-2 p-0">
                                <div class="h1 mb-0 fw-bold text-white"></div>
                                <div class="text-xxs text-blue-300 text-uppercase">
                                    {{ __('basic.workers') }}</div>
                            </div>

                            <div class="col-auto p-0 text-white">

                                <svg width="75px" height="75px" viewBox="0 0 48 48" fill="#ffffff"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 10C13.1046 10 14 9.10457 14 8C14 6.89543 13.1046 6 12 6C11.2597 6 10.6134 6.4022 10.2676 7H10C8.34315 7 7 8.34315 7 10V19H9V10C9 9.44772 9.44772 9 10 9H10.2676C10.6134 9.5978 11.2597 10 12 10Z"
                                        fill="#ffffff" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.1602 19L9 19H7C6.44772 19 5.99531 19.4487 6.04543 19.9987C6.27792 22.5499 7.39568 24.952 9.22186 26.7782C10.561 28.1173 12.2098 29.0755 14 29.583V32C14 33.3064 14.835 34.4177 16.0004 34.8294C16.043 38.7969 19.2725 42 23.25 42C27.2541 42 30.5 38.7541 30.5 34.75V30.75C30.5 28.6789 32.1789 27 34.25 27C36.3211 27 38 28.6789 38 30.75V33.1707C36.8348 33.5825 36 34.6938 36 36C36 37.6569 37.3431 39 39 39C40.6569 39 42 37.6569 42 36C42 34.6938 41.1652 33.5825 40 33.1707V30.75C40 27.5744 37.4256 25 34.25 25C31.0744 25 28.5 27.5744 28.5 30.75V34.75C28.5 37.6495 26.1495 40 23.25 40C20.3769 40 18.0429 37.6921 18.0006 34.8291C19.1655 34.4171 20 33.306 20 32V29.583C21.7902 29.0755 23.4391 28.1173 24.7782 26.7782C26.6044 24.952 27.7221 22.5499 27.9546 19.9987C28.0048 19.4487 27.5523 19 27 19L27 10C27 8.34315 25.6569 7 24 7H23.7324C23.3866 6.4022 22.7403 6 22 6C20.8954 6 20 6.89543 20 8C20 9.10457 20.8954 10 22 10C22.7403 10 23.3866 9.5978 23.7324 9H24C24.5523 9 25 9.44772 25 10V19H23.8399C23.2876 19 22.8486 19.4509 22.7545 19.9952C22.5505 21.1746 21.9872 22.2717 21.1294 23.1294C20.0343 24.2246 18.5489 24.8399 17 24.8399C15.4512 24.8399 13.9658 24.2246 12.8706 23.1294C12.0129 22.2717 11.4495 21.1746 11.2455 19.9952C11.1514 19.4509 10.7124 19 10.1602 19ZM24.5805 21H25.775C25.4013 22.6396 24.5721 24.1559 23.364 25.364C21.6762 27.0518 19.387 28 17 28C14.6131 28 12.3239 27.0518 10.6361 25.364C9.42797 24.1559 8.59877 22.6396 8.22502 21L9.41953 21C9.77024 22.3291 10.4676 23.5548 11.4564 24.5436C12.9267 26.0139 14.9208 26.8399 17 26.8399C19.0793 26.8399 21.0734 26.0139 22.5437 24.5436C23.5325 23.5548 24.2298 22.3291 24.5805 21ZM39 35C39.5523 35 40 35.4477 40 36C40 36.5523 39.5523 37 39 37C38.4477 37 38 36.5523 38 36C38 35.4477 38.4477 35 39 35ZM18 30V32C18 32.5523 17.5523 33 17 33C16.4477 33 16 32.5523 16 32V30H18Z"
                                        fill="#ffffff" />
                                </svg>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- total doctors -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 p-1 ">
                    <div class="card-body p-2 px-5 px-md-4">
                        <div class="row no-gutters align-items-center">
                            <p class="text-center text-s fw-bold text-gray-400">{{ __('basic.total patients') }}</p>

                            <div class="col me-2 p-0">
                                <div class="h1 mb-0 fw-bold text-grat-800"></div>
                                <div class="text-xxs text-gray-400 text-uppercase">
                                    {{ __('basic.patients') }}</div>
                            </div>

                            <div class="col-auto p-0 text-white">
                                <svg width="75px" height="75px" viewBox="0 0 48 48" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M24 13C26.4853 13 28.5 10.9853 28.5 8.5C28.5 6.01472 26.4853 4 24 4C21.5147 4 19.5 6.01472 19.5 8.5C19.5 10.9853 21.5147 13 24 13ZM37.9201 15.4404C38.2292 16.5008 37.6201 17.6111 36.5596 17.9201C34.1842 18.6124 32.0379 19.1337 30 19.4812V30.9944L30 31V42C30 43.0693 29.1589 43.9495 28.0906 43.998C27.0224 44.0464 26.105 43.246 26.0082 42.1811L25.0082 31.1811C25.0027 31.1206 25 31.0602 25 31H23C23 31.0602 22.9973 31.1206 22.9918 31.1811L21.9918 42.1811C21.895 43.246 20.9776 44.0464 19.9094 43.998C18.8412 43.9495 18 43.0693 18 42L18 19.4443C15.9674 19.0938 13.8288 18.583 11.4653 17.9272C10.4009 17.6319 9.7775 16.5296 10.0728 15.4653C10.3682 14.4009 11.4704 13.7775 12.5348 14.0728C17.1431 15.3515 20.6058 15.9845 24.0087 15.9997C27.4047 16.0149 30.8587 15.4152 35.4404 14.0799C36.5009 13.7708 37.6111 14.3799 37.9201 15.4404Z"
                                        fill="#9C9C9C" />
                                </svg>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- total income -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 p-1 ">
                    <div class="card-body p-2 px-5 px-md-4">
                        <div class="row no-gutters align-items-center">


                            @role('Super-admin')
                                <p class="text-center text-s fw-bold text-gray-400">{{ __('basic.month income') }}</p>
                                <div class="col me-2 p-0">
                                    <div class="h1 mb-0 fw-bold text-grat-800">

                                    </div>
                                    <div class="text-xxs text-gray-400 text-uppercase">
                                        EGP</div>
                                </div>
                                <div class="col-auto p-0 text-white">
                                    <i class="fas fa-dollar-sign px-3 px-md-2 fa-3x text-gray-400"></i>
                                </div>
                            @endrole

                            @role('Doctor')
                                <p class="text-center text-s fw-bold text-gray-400">{{ __('basic.month bookings') }}</p>
                                <div class="col me-2 p-0">
                                    <div class="h1 mb-0 fw-bold text-grat-800"></div>
                                    <div class="text-xxs text-gray-400 text-uppercase">
                                        {{ __('basic.appointments') }}</div>
                                </div>
                                <div class="col-auto p-0 text-white">
                                    <i class="bi bi-calendar2-week px-3 px-md-2 fa-3x text-gray-400"></i>
                                </div>
                            @endrole

                            @role('Branch-manager|Receptionist|Call-center')
                                <p class="text-center text-s fw-bold text-gray-400">{{ __('basic.month bookings') }}</p>
                                <div class="col me-2 p-0">
                                    <div class="h1 mb-0 fw-bold text-grat-800"></div>
                                    <div class="text-xxs text-gray-400 text-uppercase">
                                        {{ __('basic.appointments') }}</div>
                                </div>
                                <div class="col-auto p-0 text-white">
                                    <i class="bi bi-calendar2-week px-3 px-md-2 fa-3x text-gray-400"></i>
                                </div>
                            @endrole


                        </div>
                    </div>
                </div>
            </div>

            <!-- total expenses -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 p-1 ">
                    <div class="card-body p-2 px-5 px-md-4">
                        <div class="row no-gutters align-items-center">

                            @role('Super-admin')
                                <p class="text-center text-s fw-bold text-gray-400">{{ __('basic.month expenses') }}</p>
                                <div class="col me-2 p-0 text-truncate">
                                    <div class="h1 text-truncate mb-0 fw-bold text-grat-800"></div>
                                    <div class="text-xxs text-gray-400 text-uppercase">
                                        {{ __('basic.egp') }}</div>
                                </div>
                                <div class="col-auto p-0 text-white">
                                    <i class="fas fa-coins px-2 fa-3x text-gray-400"></i>
                                </div>
                            @endrole

                            @role('Doctor')
                                <p class="text-center text-s fw-bold text-gray-400">{{ __('basic.year bookings') }}</p>
                                <div class="col me-2 p-0">
                                    <div class="h1 mb-0 fw-bold text-grat-800"></div>
                                    <div class="text-xxs text-gray-400 text-uppercase">
                                        {{ __('basic.appointments') }}</div>
                                </div>
                                <div class="col-auto p-0 text-white">
                                    <i class="bi bi-calendar2-range px-3 px-md-2 fa-3x text-gray-400"></i>
                                </div>
                            @endrole

                            @role('Branch-manager|Receptionist|Call-center')
                                <p class="text-center text-s fw-bold text-gray-400">{{ __('basic.year bookings') }}</p>
                                <div class="col me-2 p-0">
                                    <div class="h1 mb-0 fw-bold text-grat-800"></div>
                                    <div class="text-xxs text-gray-400 text-uppercase">
                                        {{ __('basic.appointments') }}</div>
                                </div>
                                <div class="col-auto p-0 text-white">
                                    <i class="bi bi-calendar3-range px-3 px-md-2 fa-3x text-gray-400"></i>
                                </div>
                            @endrole

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Content Row -->
        <div class="row">

            <!-- today's appointments -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 fw-bold">{{ __('basic.patients overview') }}</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area pb-4">
                            <div class="">

                                <canvas id="patient_overview" class="profit_expense">
                                    <!-- the code and its style is printed from js -->

                                </canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- last patients -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 fw-bold">{{ __('basic.last patients') }}</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body pb-0">


                            <a class="d-flex mb-3 align-items-center"
                                href="">
                                <img class="rounded-circle avatar-small me-2"
                                    src="">
                                <div class=" ">
                                    <h6 class="mb-1 text-s fw-bold text-gray-700"></h6>
                                    <p class="mb-0 text-xs text-gray-300"></p>
                                </div>
                            </a>


                    </div>

                    <!-- Card footer -->
                    <div class="card-footer text-center ">
                        <a href=""
                            class="text-xs link-cust-text text-gray-300 clickable-item-pointer">
                            <i class="fas fa-chevron-down"></i> {{ __('basic.more') }}
                        </a>
                    </div>

                </div>
            </div>
        </div>

        @role('Super-admin')
            <!-- Content Row -->
            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 fw-bold">{{ __('basic.earnings overview') }}</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area pb-4">
                                <div class="">
                                    <div class="text-center">
                                        <span class="me-2">
                                            <i class="fas fa-circle text-success"></i> Profits
                                        </span>
                                        <span class="me-2">
                                            <i class="fas fa-circle text-primary"></i> Expense
                                        </span>
                                    </div>

                                    <canvas id="profit_expense" class="profit_expense">
                                        <!-- the code and its style is printed from js -->

                                    </canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 fw-bold">{{ __('basic.revenue sources') }}</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pb-2">
                                <canvas id="myChart-credit">
                                    <!-- the code and its style is printed from js -->
                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endrole
    </div>


@endsection

<!-- js insert -->
@section('js')

    <!-- -- Chart.js plugin -- -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @php
    $chart_color = ['#1a78f1', '#38dfa8', '#d13c62', '#12c7d9', '#03c2c3', '#5035df', '#17a673', '#2e59d9', '#9aeded', '#f3d56a', '#7c859d', '#a4adc5'];
    @endphp




    <script>
        // Patient overview
        var ctx = document.getElementById("patient_overview");
        var myLineChart_patient = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Patient",
                    lineTension: 0.5,
                    backgroundColor: "#1a78f1",
                    borderColor: "#1a78f1",
                    pointRadius: 3,
                    pointBackgroundColor: "#1a78f1",
                    pointBorderColor: "#1a78f1",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [

                    ],
                }, ],
            },

            options: {
                maintainAspectRatio: true,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return '$' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "#dc3545",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                plugins: {
                    legend: {
                        display: false
                    }
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#dc3545",
                    titleMarginBottom: 10,
                    titleFontColor: '#dc3545',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });


        // Area Chart Example
        var ctx = document.getElementById("profit_expense");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Profits",
                    lineTension: 0.5,
                    backgroundColor: "#1cc88a",
                    borderColor: "#1cc88a",
                    pointRadius: 3,
                    pointBackgroundColor: "#1cc88a",
                    pointBorderColor: "#1cc88a",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [

                    ],
                }, {
                    label: "Expenses",
                    lineTension: 0.5,
                    backgroundColor: "#4e73df",
                    borderColor: "#4e73df",
                    pointRadius: 3,
                    pointBackgroundColor: "#4e73df",
                    pointBorderColor: "#4e73df",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "#4e73df",
                    pointHoverBorderColor: "#4e73df",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [

                    ],
                }],
            },
            options: {
                maintainAspectRatio: true,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return '$' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                plugins: {
                    legend: {
                        display: false
                    }
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });

        // --------- profit chart ---------
        var ctx_recourse = document.getElementById("myChart-credit");
        var myPieChart2 = new Chart(ctx_recourse, {
            type: 'doughnut',
            data: {
                labels: [

                ],
                datasets: [{
                    data: [

                    ],
                    @php
                        $i = 0;
                    @endphp
                    backgroundColor: [

                    ],
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.yLabel;
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true
                    },
                    colorschemes: {
                        scheme: 'brewer.Paired12'
                    }
                },
                cutoutPercentage: 80,
            },
        });
    </script>

    <script>
        $(document).ready(function() {

            $(document).on('click', '.add-new-note', function() {

                $('#note_add').html(
                    '<textarea id="note_insert" name="note" style="height: 68px !important;" class="form-control border-0" placeholder="Write here your notes .." rows="4" spellcheck="false"></textarea>'
                );
            })

            $(document).on('keyup', '#note_insert', function() {
                console.log('asdasd');

                var query_text = $(this).val();

                $.ajax({
                    url: '{{ route('sett.ad_note_ajax') }}',
                    type: "POST",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        '_method': "PATCH",
                        'query': query_text,
                    },
                    success: function(data) {}
                });
            })

        })
    </script>
@endsection
