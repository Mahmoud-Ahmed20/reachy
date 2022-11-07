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





    <div class="row">


        <div class="col-12 col-md-12">
            <div>
                
             <div class="ps-0 pe-0">
                    <h3 class="text-gray-500 mb-3">
                        All Orders
                    </h3>
                    <!-- end card  -->
                    @foreach ($order_item as $item)
                
                        <div class="bg-white b-r-s-cont mb-2 px-3 py-2">
                            <div class="row">
                                <div class="col-12 col-md-4 d-flex justify-content-between align-items-center ">
                                    <div class="d-flex align-items-center">
                                   
                                        <a href=""> <img
                                                class="avatar-m2 me-2 b-r-xs align-self-center"
                                                src="{{ URL::asset('img/products/' . $item->order_item[0]->product->cover_image) }}" />
                                        </a>
                                        <div class="p-3 text-self-center">
                                            <a href=""
                                                class="text-m-3 fw-bold link-cust-text text-gray-500 text-s2 mb-1">
                                                
                                                {{$item->order_item[0]->product->name_ar}}
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
                                        <p class="text-s fw-bold text-gray-600"> {{ $item->code }} </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 d-flex justify-content-center align-items-center">
                                @if ($item->status == 1)
                                    @php
                                        $msg = 'In Progress';
                                        $btn_color = 'text-blue-700';
                                    @endphp
                                    @elseif ($item->status == 4)
                                    @php
                                        $msg = 'Our for delivery';
                                        $btn_color = 'text-green';
                                    @endphp
                                    @elseif ($item->status == 5)
                                    @php
                                        $msg = 'Deliverd';
                                        $btn_color = 'text-green';
                                    @endphp
                                @endif
                                
                                <a href="{{ route('sett.deliverd_item', $item->id) }}"
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
