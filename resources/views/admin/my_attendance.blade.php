@extends('layouts.master')

@section('title', 'My attendance | Proxima - Medical Management app')

@section('title-topbar', 'My Attendance')

<!-- css insert -->
@section('css')

    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- boostrap datepicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

    <!-- -- datatables plugin -- -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.3.9/css/autoFill.bootstrap5.min.css">

@endsection



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


<!-- content insert -->
@section('content')
    <div class="container-fluid px-2 mt-3">

        <!-- page title link -->
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <span class="mb-0">
                <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.home') }}">Dashboard |</a>
                <a class="text-gray-300">My Attendance</a>
            </span>
            <div class="d-flex justify-content-center">
                <div class="calendar-datepicker me-1">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text ps-3"><i class="bi bi-calendar2-week-fill"></i> </div>
                        </div>
                        <input id="calendar-date-input" type="text" class="form-control hasdatetimepicker"
                            placeholder="YYYY/MM" value="{{ request()->date }}" style="width: 133px;">
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-3 pb-2">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-person-booth me-2"></i> My Attendance <span
                        class="text-gray-300 fw-normal">
                        @if (request()->date)
                            {{ request()->date }}
                        @else
                            this month
                        @endif
                    </span></h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-300"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">

                    </div>
                </div>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table display datatable-modal" id="p-lab-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-xxs text-center">{{ __('basic.date') }}</th>
                                <th class="text-xxs text-center">{{ __('basic.branch') }}</th>
                                <th class="text-xxs text-center">{{ __('basic.start') }}</th>
                                <th class="text-xxs text-center">{{ __('basic.end') }}</th>
                                <th class="text-xxs text-center">{{ __('basic.working hours') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($atten as $item)
                                <tr>
                                    <td class="text-center">
                                        {{ date('d M Y', strtotime($item->arrived_time)) }}
                                    </td>
                                    <td class="text-center">
                                        {{ $item->branch->name }}
                                    </td>
                                    <td class="text-center">
                                        {{ date('h:i A', strtotime($item->arrived_time)) }}
                                    </td>
                                    <td class="text-center">
                                        {{ date('h:i A', strtotime($item->leave_time)) }}
                                    </td>
                                    <td class="text-center fw-bold">
                                        @php
                                            $totalDuration = Carbon\Carbon::parse($item->leave_time)
                                                ->diff($item->arrived_time)
                                                ->format('%H hour %i minute');
                                            $totalDuration_hours = Carbon\Carbon::parse($item->leave_time)
                                                ->diff($item->arrived_time)
                                                ->format('%H');
                                        @endphp
                                        @if ($totalDuration_hours >= $fixed_working_hours)
                                            <i class="fas fa-check me-1 text-green"></i>
                                        @endif {{ $totalDuration }}

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
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
            $('.myselect2-insert-nosearch').select2({
                dropdownParent: $("#cancel_rate"),
                minimumResultsForSearch: -1
            });

            var logID = 'log',
                log = $('<div id="' + logID + '"></div>');
            $('body').append(log);
            $('[type*="radio"]').change(function() {
                var me = $(this);
                log.html(me.attr('value'));
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
                format: "mm-yyyy",
                viewMode: "months",
                minViewMode: "months"
            });
        });

        $(document).ready(function() {
            $(document).on('change', '#calendar-date-input', function() {
                var date = $(this).val();

                var url = "{{ route('sett.hr_my_attendance', ':date') }}";
                url = url.replace(':date', date);

                window.location.href = url;
            });
        })
    </script>

    <!-- -- datatables plugin -- -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.bootstrap5.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>


    <script>
        var table = $('#p-lab-table').DataTable({
            lengthChange: false,
            "pageLength": 31,
            "order": [
                [0, "ASC"]
            ],
            buttons: {
                dom: {
                    button: {
                        className: 'btn btn-table-export me-0' //Primary class for all buttons
                    }
                },
                buttons: [{
                        extend: 'copyHtml5',
                        footer: true
                    },
                    {
                        extend: 'excelHtml5',
                        footer: true
                    },
                    {
                        extend: 'pdfHtml5',
                        footer: true
                    },
                    {
                        extend: 'print',
                        footer: true
                    }
                ]
            }
        });
        table.buttons().container().appendTo('#p-lab-table_wrapper .col-md-6:eq(0)');
    </script>


@endsection
