@extends('website.layouts.master_top')

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
                @include('website/layouts.includes.sidebar_2')

                <div class="col-12 col-xl-9 box-shadow p-3 mt-5">
                    <div class="container-fluid ">


                        <div class="credit-card d-flex mb-2">
                            <i class="fa-solid fa-cart-plus"></i>
                            <h3 class="fw-bold">طلب رقم # {{ $order->code }}</h3>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 mb-4">
                                <h6 class="fw-bold">المنتجات</h6>
                                @foreach ($order->order_item as $item)
                                    <div class="d-flex mt-3">
                                        <div class="img-table">

                                            <img src="{{ URL::asset('img/products/' . $item->product->cover_image) }}" />

                                        </div>

                                        <div class="prodact-orders">
                                            <h6 class="fw-bold">{{ $item->product->name_ar }}</h6>
                                            <p class="text-grey"> {{ $item->product->description_ar }}</p>
                                        </div>
                                        <div class="number-prodact-orders pt-2 fw-bold" style="width: 23%;">
                                            {{ $item->product->orginal_price + $item->product->tax }}
                                            LE
                                        </div>
                                    </div>
                                @endforeach

                                <div class="total-cost text-center mb-3 fw-bold mt-3">
                                    التكلفة الكلية {{ $order->final_price }} EGP
                                </div>



                            </div>
                            <div class="col-xl-4 mb-4">
                                <div class="container">
                                    <div class="mb-4">
                                        <h6 class="fw-bold">طريقة الدفع</h6>
                                    </div>
                                    <div class="d-flex payment-method mt-3 p-3 mb-3">
                                        <div><img src="img/NoPath.png" alt=""></div>
                                        <div class="pe-5 text-grey">
                                            الدفع عند الاستلام
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="fw-bold">تاريخ الطلب</h6>
                                    </div>

                                    <div class="payment-method mt-4 text-grey  p-3 mb-3">
                                        {{ $order->created_at }}
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="fw-bold"> معلومات الشحن والتوصيل </h6>
                                    </div>
                                    <div class="payment-method mt-4 text-grey  p-3 mb-3">
                                        {{ $address->name_street .
                                            ' ' .
                                            $address->address_details .
                                            ' ' .
                                            $address->building_number .
                                            ' الدور ' .
                                            $address->apartment_number }}
                                    </div>

                                    {{-- @foreach ($order->address as $item)
                        @endforeach --}}
                                </div>

                            </div>
                            <div class="col-xl-4">
                                <div class="mb-3">
                                    <h6 class="fw-bold"> حالة الطلب </h6>
                                </div>

                                    
                                @if ($order->status == 0)
                                    <div class="payment-method-succss  mb-3 fw-bold text-center">
                                        <h5><span>منتظرة</span></h5>
                                    </div>
                                @elseif ($order->status == 1)
                                    <div class="payment-method-succss  mb-3 fw-bold text-center">
                                        <h5><span>في المحطة</span></h5>
                                    </div>
                                @elseif ($order->status == 2)
                                    <div class="payment-method-succss  mb-3 fw-bold text-center">
                                        <h5><span>في الطريق</span></h5>
                                    </div>
                                @elseif ($order->status == 3)
                                    <div class="payment-method-succss  mb-3 fw-bold text-center">
                                        <h5><span> تم التسليم</span></h5>
                                    </div>
                                @elseif ($order->status == 4)
                                    <div class="cancel  mb-3 fw-bold text-center">
                                        <h5><span> تم الغاء الطلب</span></h5>
                                    </div>
                                @endif

                                @if ($order->cancel_date == null)
                                    <div>
                                        <a class="btn btn-cancelling-order delete-conf" style="cursor: pointer;"
                                            title="الغاء الطلب" data-effect="effect-scale"
                                            data-order_id="{{ $order->id }}" data-bs-toggle="modal"
                                            data-bs-target="#delete1">الغاء الطلب
                                        </a>
                                        <div class="modal fade" id="delete1" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
                                                <div class="modal-content b-r-s-cont border-0">

                                                    <div class="modal-header">
                                                        <div class="modal-title" id="exampleModalLabel"><i
                                                                class="fas fa-trash me-1"></i>
                                                            الغاء الطلب </div>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('client.delete_order') }}" method="post">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}

                                                        <!-- Modal content -->
                                                        <div class="modal-body px-4">

                                                            <div class="modal-body  text-center py-0">
                                                                <h3 class="fs-6">سبب الغاء الطلب </h3>
                                                                <textarea class="w-100 mt-2" name="client_note" id="" cols="1" rows="4"></textarea>
                                                                <input type="hidden" name="order_id"
                                                                    value="{{ $order->id }}">
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <div class="left-side">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">خروج </button>
                                                            </div>
                                                            <div class="divider"></div>
                                                            <div class="right-side">
                                                                <button type="submit" class="btn btn-danger ">الغاء
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </form>

                                                </div>
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



@endsection

<!-- js insert -->
@section('js')

    <!-- delete confirmation modal -->
    <!-- delete confirmation modal -->
    <script>
        $('.delete-conf').click(function(event) {
            var order_id = $(this).data("order_id");
            console.log(order_id);
            var modal = $('.delete-conf-input [name="order_id"]')
            var mahmoud = modal.val(order_id);
            console.log(mahmoud);
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
