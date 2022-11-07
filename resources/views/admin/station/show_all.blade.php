@extends('admin/layouts.master')

@section('title', 'All Stations | Proxima - Medical Management app')

@section('title-topbar', __('basic.all Stations'))

<!-- css insert -->
@section('css')

    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- boostrap datepicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

    <!-- datepicker time and date -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/plugins/monthSelect/style.min.css">

@endsection

<!-- content insert -->

<!-- content insert -->
@section('content')

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

@endsection

<div class="container-fluid px-md-2 mt-3">

    <!-- page title link -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <span class="mb-0">
            <a class="link-cust-text text-gray-200 fw-light" href="">{{ __('basic.dashboard') }}
                |</a>
            <a class="link-cust-text text-gray-200 fw-light"
                href="">{{ __('basic.Stations') }} | </a>
            <a class="text-gray-300">{{ __('basic.all Orders') }}</a>
        </span>
    </div>



    <div class="row">

        <div class="col me-0 me-md-3 mb-3 mb-md-0 px-0 ">

            <div class="position-relative" style="top: 0; left: 0; width: 100%; height: 100%;">

                <div class="bg-white b-r-s-cont shadow pb-4 position-sticky top-0">
                    <h6 class="mb-0 p-3 main-color-bg text-white" style="border-radius: 18px 18px 0px 0px;"><i
                            class="fas fa-filter"></i> {{ __('basic.search filter') }}</h6>

                    <form id="myform" class="mt-1" method="GET"
                        action="{{ route('sett.show_all_orders') }}">

                        <div class="accordion search-accordion" id="accordionExample">

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSpec">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseStat" aria-expanded="true"
                                        aria-controls="collapseStat">
                                        <i class="fas fa-user me-1"></i> {{ __('basic.type') }}
                                    </button>
                                </h2>
                                <div id="collapseStat" class="accordion-collapse collapse show"
                                    aria-labelledby="headingSpec" data-bs-parent="#accordionExample">
                                    <div class="accordion-body py-0 px-3">
                                        <div class="form-group">
                                            <div class="form-check mb-1">
                                                <input class="form-check-input" value="1" type="radio"
                                                    name="status" id="s1"
                                                    @if (request()->get('status') == 1) checked @endif>
                                                <label class="form-check-label" for="s1">
                                                    In progress
                                                </label>
                                            </div>
                                            <div class="form-check mb-1">
                                                <input class="form-check-input" value="2" type="radio"
                                                    name="status" id="s2"
                                                    @if (request()->get('status') == 2) checked @endif>
                                                <label class="form-check-label" for="s2">
                                                    Done
                                                </label>
                                            </div>
                                            <div class="form-check mb-1">
                                                <input class="form-check-input" value="3" type="radio"
                                                    name="status" id="s3"
                                                    @if (request()->get('status') == 3) checked @endif>
                                                <label class="form-check-label" for="s3">
                                                    Canceled
                                                </label>
                                            </div>
                                            {{-- <div class="form-check mb-1">
                                                <input class="form-check-input" value="4" type="radio"
                                                    name="status" id="s4"
                                                    @if (request()->get('status') == 4) checked @endif>
                                                <label class="form-check-label" for="s4">
                                                    Refound
                                                </label>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-content-center align-items-center mt-3">
                            <a class="text-gray-300 me-2"
                                href="">{{ __('basic.reset') }}</a>
                            <button class="b-r-l-cont btn btn-primary px-4">{{ __('basic.search') }}</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>

        <div class="col-12 col-md-9">
            <div>
             <div class="ps-0 pe-0">
                    <h3 class="text-gray-500 mb-3">
                        All Orders
                    </h3>
                    <!-- end card  -->
                    @foreach ($orders as $item)
                        <div class="bg-white b-r-s-cont mb-2 px-3 py-2">
                            <div class="row">
                                <div class="col-12 col-md-4 d-flex justify-content-between align-items-center ">
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('sett.show_all_details', $item->id) }}"> <img
                                                class="avatar-m2 me-2 b-r-xs align-self-center"
                                                src="{{ URL::asset('img/products/' . $item->product->cover_image) }}" />
                                        </a>
                                        <div class="p-3 text-self-center">
                                            <a href="{{ route('sett.show_all_details', $item->id) }}"
                                                class="text-m-3 fw-bold link-cust-text text-gray-500 text-s2 mb-1">
                                                {{ $item->product->name_en }}

                                            </a>
                                            <p class="text-with text-gray-400 text-xxs">Order Placed:<span
                                                    class="text-blue-100 text-gray-500 fw-bold">
                                                    {{ date('d M Y', strtotime($item->created_at)) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4 d-flex justify-content-center align-items-center">
                                    <div class="text-center">
                                        <h6 class="text-with text-gray-400 text-s mb-2">Order Number</h6>
                                        <p class="text-s fw-bold text-gray-600"> {{ $item->order->code }} </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 d-flex justify-content-center align-items-center">
                                    @if ($item->status == 1)
                                    @php
                                        $msg = 'In Progress';
                                        $btn_color = 'text-blue-700';
                                    @endphp
                                @elseif ($item->status == 2)
                                    @php
                                        $msg = 'Done';
                                        $btn_color = 'text-green';
                                    @endphp
                                    @elseif ($item->status == 3)
                                    @php
                                        $msg = 'Canseled';
                                        $btn_color = 'text-green';
                                    @endphp
                                @endif
                                <a href="{{ route('sett.station_order_details', $item->id) }}"
                                    class="px-4 hover_btn py-2 rounded-pill {{ $btn_color }}">
                                    {{ $msg }}
                                </a>
                                </div>

                            </div>

                        </div>
                    @endforeach

                    <div class="d-flex mt-4 justify-content-end">
                    </div>
              </div>

            </div>

            <div class="d-flex mt-4 justify-content-end">
                {{ $orders->appends(request()->input())->links() }}
            </div>

        </div>
    </div>


</div>

@endsection


<!-- js insert -->
@section('js')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('.js-example-basic-single').select2({
        minimumResultsForSearch: -1,
    });
    $(".myselect2-additem-insert").select2({
        dropdownParent: $("#add_notes")
    });
    //hide search
    $('.select2-no-search-additem').select2({
        dropdownParent: $("#add_notes"),
        minimumResultsForSearch: -1
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

<!-- datapicker date and time -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/plugins/monthSelect/index.min.js"></script>

<script>
    $(document).ready(function() {
        //-------- datepicker time --------
        $('.datepicker_time').flatpickr({
            enableTime: true,
            mode: "range",
            locale: {
                rangeSeparator: 'to'
            },
            plugins: [
                new monthSelectPlugin({
                    shorthand: true, //defaults to false
                    dateFormat: "m-Y", //defaults to "F Y"
                    altFormat: "F Y", //defaults to "F Y"
                    theme: "dark", // defaults to "light"
                })
            ]
        });

    })
</script>

<script>
    $(document).ready(function() {

        //--------------------- fetch appoingtments -------------------

        //rate insert
        $(document).on('keyup', '#search-eng', function() {

            var patient_username = $(this).val();


            url = url.replace(':id', patient_username);

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    '_method': "PATCH",
                    'status': 4,
                },
                success: function(data) {
                    if (data.status == 1) {
                        $("#successful_msg").html(' ').show();
                        $("#successful_msg").html(
                            '<div class="flash-msg shadow pt-3 text-center" style="background-color: #20cd7d;">' +
                            '<div class="mb-2">' +
                            '<i class="far fa-smile-beam text-xl"></i>' +
                            '</div>' +
                            '<h3>Welcome ' + data.name + '!</h3>' +
                            '<p style="color:#cfffe4">Happy to see you again</p>' +
                            '</div>').delay(5000).fadeOut()
                        $("#search-eng").val('');
                    } else {
                        $("#successful_msg").html(' ').show();
                        $("#successful_msg").html(
                            '<div class="flash-msg shadow pt-3 text-center" style="background-color:#ff4152;">' +
                            '<div class="mb-2 text-center">' +
                            '<i class="text-center far fa-frown text-xl"></i>' +
                            '</div>' +
                            '<h3>Sorry, it is invalid QR or date</h3>' +
                            '<p style="color:#ffb4bc">Please try again</p>' +
                            '</div>').delay(5000).fadeOut()
                        $("#search-eng").val('');
                    }
                }
            });

        });

        $(document).on('click', ".patient_lead_history", function() {

            $('.modal').modal('hide');
            $('#add_notes').modal('show');

        })

    });
</script>

@endsection
