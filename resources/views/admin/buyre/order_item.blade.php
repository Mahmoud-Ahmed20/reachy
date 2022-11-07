@extends('admin/layouts.master')

@section('title', 'Orders Item')

@section('title-topbar', 'Orders Item')

<!-- css insert -->
@section('css')

    <!-- -- datatables plugin -- -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.3.9/css/autoFill.bootstrap5.min.css">
    <style>
        .payment {
            text-align: center;
            border-radius: 8px;
            border: 1px solid #CCCCCC;
        }

        .payment h6 {
            font-size: 12px;
        }
    </style>
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
            <h3>We can't do it!</h3>
            <p style="color:#ffb4bc">{{ Session::get('error_delete') }}</p>
        </div>
    @endif

@endsection


<!-- content insert -->
@section('content')
    <div class="container-fluid px-2 mt-3">

        <!-- page title link -->
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <span class="mb-0">
                <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.dashboard_admin') }}">Dashboard |</a>
                <a class="text-gray-300">Orders item</a>
            </span>

        </div>

        <div class="card shadow mb-3 pb-2">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-users me-2"></i> All Orders Item</h6>

            </div>

            <!-- Card Body -->
            <div class="card-body">

                <h6 class="mb-4">Request a number # {{ $order->code }}</h6>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <h6>Products:</h6>
                        @foreach ($order->order_item as $item)
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <img src="{{ URL::asset('img/products/' . $item->product->cover_image) }}"
                                        class="w-75" alt="">
                                </div>
                                <div class="col-12 col-md-4">
                                    <h6>{{ $item->product->name_ar }}</h6>
                                    <p>{{ $item->product->description_ar }}</p>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h6>{{ $item->product->orginal_price + $item->product->tax }} LE</h6>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        <div class="p-4">

                            <h6>Final Price {{ $order->final_price }} LE</h6>
                        </div>

                    </div>
                    <div class="col-12 col-md-4">
                        <h6>Payment method</h6>
                        <div class="p-4 payment w-100 mb-5">
                            <h6 class="fs-8">
                                Paiement when recieving

                            </h6>
                        </div>
                        <h6>The date of application </h6>
                        <div class="p-4 payment w-100 mb-5">
                            <h6>
                                {{ $order->created_at }}

                            </h6>
                        </div>

                    </div>
                    <div class="col-12 col-md-4">
                        <h6>
                            status
                        </h6>
                        <div class="p-4 payment w-100 mb-5">
                            <h6>
                                @if ($order->status == 1)
                                    In Progress
                                @elseif($order->status == 2)
                                    Delivered
                                @elseif ($order->status == 3)
                                    Refound
                                @endif
                            </h6>
                        </div>
                        <h6>Shipping and delivery information</h6>
                        <div class="p-4 payment w-100 mb-5">
                            <h6>
                                {{ $address->name_street .
                                    ' ' .
                                    $address->address_details .
                                    ' ' .
                                    $address->building_number .
                                    ' الدور ' .
                                    $address->apartment_number }}

                            </h6>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
@endsection


<!-- js insert -->
@section('js')

    <!-- delete confirmation modal -->
    <script>
        $('.delete-conf').click(function(event) {
            var role_id = $(this).data("role_id");
            var modal = $('.delete-conf-input [name="role_id"]')
            modal.val(role_id);
        })
    </script>

    <script>
        $(document).ready(function() {
            var table = $('#p-lab-table').DataTable({
                lengthChange: true,
                buttons: [{
                    extend: 'csv',
                    split: ['pdf', 'excel'],
                }]
            });
        });
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



@endsection
