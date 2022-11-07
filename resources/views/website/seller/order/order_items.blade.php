@extends('website/layouts.master_top')

@section('title', 'Pain Cure | Dr. Amr Saeed for back pain treatment | دكتور عمرو سعيد لعلاج الالم')

<!-- css insert -->
@section('css')

    <!-- animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="{{ URL::asset('plugins/owl/owl.carousel.min.css') }}">

    <!-- swiper slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <style>

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

    <div class="add-product">

        <div class="container-fluid">
            <div class="row">
                @include('website/layouts.includes.sidebar')

                <div class="col-12 col-md-9  col-xl-9 box-shadow p-3 mt-5">
                    <div class="container-fluid ">


                        <div class="credit-card d-flex mb-4">
                            <i class="fa-solid fa-cart-plus"></i>
                            <h3 class="fw-bold">طلب رقم # {{$order->code}}</h3>
                        </div>
                        <div class="row">

                            <div class="col-xl-5">
                                <h6 class="fw-bold">المنتجات</h6>
                                <div class="d-flex mt-3">
                                    <div class="img-table">
                                        <img src="{{ URL::asset('img/products/' . $order_items->product->cover_image	) }}"/>
                                    </div>
                                    <div class="loat-none" >
                                        <h6 class="text-grey-400 " style="margin-right:20px">{{$order_items->product->name_ar}}</h6>
                                        <p class="text-grey-400 " style="margin-right:20px"> {{$order_items->product->description_ar}}</p>
                                    </div>                                   
                                </div>
                                <div class="mt-3">
                                    <h6 class="fw-bold">السعر</h6>
                                    {{$order_items->order->final_price}} LE EGP
                                </div>
                                <div class="total-cost text-center mb-3 fw-bold mt-3">
                                    التكلفة الكلية {{$order_items->order->final_price + $order_items->order->total_tax}} EGP
                                </div>

                            </div>
                            <div class="col-xl-4 mb-4">
                                <div class="container">
                                    <div class="mb-4">
                                        <h6 class="fw-bold">طريقة الدفع</h6>
                                    </div>
                                    <div class="d-flex payment-method mt-3 p-3 mb-3">
                                        <div><img src="img/NoPath.png" alt=""></div>
                                        <div class="text-grey">
                                            كارت فيزا
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="fw-bold">تاريخ الطلب</h6>
                                    </div>

                                    <div class="payment-method mt-4 text-grey  p-3 mb-3">
                                        {{ $order->arrived_date }}
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="fw-bold"> معلومات الشحن والتوصيل </h6>
                                    </div>

                                    <div class="payment-method mt-4 text-grey  p-3 mb-3">
                                        {{   $order->address->name_street . ' ' . $order->address->address_details
                                            . ' ' . $order->address->building_number
                                            . ' الدور '  . $order->address->apartment_number }}
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-3">
                                @if ($order_items->status == 1)
                                    @php
                                        $msg = 'Progress';
                                        $btn_color = 'not_accepted-color-btn';
                                        $update_status = 2;
                                        $modal_status = 'update_item_modal_btn';
                                    @endphp
                                @elseif ($order_items->status == 2)
                                    @php
                                        $msg = 'Seller confirmation';
                                        $btn_color = 'active-color-btn';
                                        $update_status = 3;
                                        $modal_status = 'update_item_modal_btn';
                                    @endphp
                                    @elseif ($order_items->status == 3)
                                    @php
                                        $msg = 'Delivered';
                                        $btn_color = 'active-color-btn';
                                        $update_status = 4;
                                        $modal_status = 'update_item_modal_btn';
                                    @endphp
                                @endif

               
                            
                                <div class="mb-3">
                                    <h6 class="fw-bold"> حالة الطلب </h6>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="">
                                            <div data-status="{{ $update_status }}"
                                                class="px-4 py-2 mb-1 rounded-pill clickable-item-pointer  {{ $modal_status }} {{ $btn_color }}"
                                                style="color:#D62828; font-weight: bold; cursor:pointer;">
                                                {{ $msg }}
                                            </div>
                                            @php
                                                $refund_14_days = \Carbon\Carbon::parse($order_items->order->delivered_date)
                                                    ->diff(\Carbon\Carbon::now())
                                                    ->format('%d');
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                                @if ($order_items->status == 1)
                                <div class="row">
                                    <div class="col-xl-3 text-center mt-2">
                                        <div class="">
                                            <div class="rounded-circle border_2 m-1 size_30 p-1 d-flex"><i
                                                    class="fa-solid fa-check fs-5"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                                <p class="mb-0 me-2">Progress</p>
                                                <hr class="select ">
                                            </h6>
                                            <p class="text-gray-300 text-xxs mb-0">
                                                {{ date('d M Y', strtotime($order_items->created_at)) }}</p>
                                        </div>
                                    </div>

                          
                                </div>
                                @elseif ($order_items->status == 2)
                                <div class="col text-center order_steps">
                                    <div class="col text-center d-flex mt-2">
                                        
                                            <div class="rounded-circle border_2 m-1 size_30 p-1 d-flex align-content-center justify-content-center"><i
                                                    class="fa-solid fa-check fs-5"></i>
                                            </div>
                                        
                                        <div class="d-flex align-items-center">
                                            <h6 class="d-flex m-0 text-s me-2 align-items-center">
                                                <p class="mb-0  fw-bold">Seller confirmation</p>
                                                <hr class="select ">
                                            </h6>
                                            <p class="text-gray-300 text-xxs mb-0 me-3">
                                                {{ date('d M Y', strtotime($order_items->delivered_date)) }}</p>
                                        </div>
                                    </div>

                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Delete Modal -->
<div class="modal fade" id="update_item_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content b-r-s-cont border-0">

        <div class="modal-header">
            <div class="modal-title" id="exampleModalLabel"><i class="fas fa-box-open me-1"></i>
                Update Item</div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="{{ route('seller.order_item_update', 'test' ) }}" method="post">
            {{ method_field('post') }}
            {{ csrf_field() }}

            <!-- Modal content -->
            <div class="modal-body px-4">

                <div class="modal-body delete-conf-input text-center py-0">
                    <p class="mb-0">Are you sure you want to update
                        this
                        item?</p><br>
                    <input type="hidden" name="order_item_id" value="{{ $order_items->id }}">
                    <input type="hidden" name="status" value="">
                </div>
            </div>

            <div class="modal-footer">
                <div class="left-side">
                    <button type="button" class="btn btn-default btn-link" data-bs-dismiss="modal">Never
                        Mind</button>
                </div>
                <div class="divider"></div>
                <div class="right-side">
                    <button type="submit" class="btn btn-default btn-link text-green">Update
                    </button>
                </div>

            </div>
        </form>

    </div>
</div>
</div>

    @endsection

<!-- js insert -->
@section('js')
<script>
    $('.update_item_modal_btn').click(function(event) {
        var status = $(this).data("status");
        var modal = $('.delete-conf-input [name="status"]')
        modal.val(status);
        $('.modal').modal('hide');
        $('#update_item_modal').modal('show');
    })
</script>
    <!-- delete confirmation modal -->
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

