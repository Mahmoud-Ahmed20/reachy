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
                <a id="flash-msg-btn" class="text-blue-300 clickable-product_items-pointer"><i class="fas fa-times"></i></a>
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
                <a id="flash-msg-btn" class="text-blue-300 clickable-product_items-pointer"><i class="fas fa-times"
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

                <div class="col-12 col-xl-9 box-shadow p-3 mt-5">
                    <div class="container-fluid ">


                        <div class="credit-card d-flex mb-4">
                            <i class="fa-solid fa-cart-plus"></i>
                        </div>
                        <div class="row">
                   
                            <div class="col-xl-3 mb-4">
                                <h6 class="fw-bold text-center">المنتجات</h6>
                                <div class="d-flex mt-3">
                                    <div class="img-table">

                                        <img src="{{ URL::asset('img/products/' . $product_items->product->cover_image) }}"/>

                                    </div>

                                    <div class="loat-none " >
                                        <h6 class="text-grey-400 " style="margin-right:20px">{{$product_items->product->name_ar}}</h6>
                                        <p class="text-grey-400 " style="margin-right:20px"> </p>
                                    </div>

                                </div>

                                <div class="total-cost text-center mb-3 fw-bold mt-3">
                                التكلفة الكلية {{$product_items->order->final_price + $product_items->order->total_tax}} EGP
                                </div>

                                <div class="total-cost text-center mb-3 fw-bold mt-3">
                                تاريخ التسليم {{$product_items->order->out_delivery_date }} 
                                </div>

                                

                            </div>
                            <div class="col-xl-2 mb-4">
                                <div class="mb-4">
                                    <h6 class="fw-bold text-center">السعر</h6>
                                </div>
                                <div class="text-center">
                                   
                                </div>
                            </div>

                            <div class="col-xl-4 mb-4">
                                <div class="container">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-center">طريقة الدفع</h6>
                                    </div>
                                    <div class="d-flex payment-method mt-3 p-3 mb-3">
                                        <div><img src="img/NoPath.png" alt=""></div>
                                        <div class="pe-5 text-grey">
                                            كارت فيزا
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="fw-bold">تاريخ الطلب</h6>
                                    </div>

                                    <div class="payment-method mt-4 text-grey  p-3 mb-3">
                                        
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="fw-bold"> معلومات الشحن والتوصيل </h6>
                                    </div>

                                </div>

                            </div>

                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection

<!-- js insert -->
@section('js')
<script>
    $('.update_product_items_modal_btn').click(function(event) {
        var product_items_status = $(this).data("product_items_status");
        var modal = $('.delete-conf-input [name="product_items_status"]')
        modal.val(product_items_status);
        $('.modal').modal('hide');
        $('#update_product_items_modal').modal('show');
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

