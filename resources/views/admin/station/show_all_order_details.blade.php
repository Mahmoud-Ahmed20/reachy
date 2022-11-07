@extends('admin/layouts.master')

@section('title', 'All Patients | Proxima - Medical Management app')

@section('title-topbar', __('Order Details'))

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

    <div class="profile">
        <nav class="navbar fixed-top">
            <div class="container-fulid">
            </div>
        </nav>

        <div class="ps-0 pe-0">
            <div class="row mb-5" style="margin-right:0">



                <div class="col-12 col-lg-12 fullscrin px-5 pt-5">


                    <h3 class="text-gray-400 mb-3">
                        Order Details of <span class="text-gray-700"># {{ $order_item->order->code }}</span>
                    </h3>

                    <div class="d-flex justify-content-between mb-4 pe-0 pe-md-5">
                        <div class="">
                            <p class="m-0 p-0 text-gray-400">Order Placed : <span
                                    class="text-gray-900 font-weight-bold">{{ date('d M Y', strtotime($order_item->created_at)) }}</span>
                            </p>

                            @if ($order_item->order->status == 1)
                                @php
                                    $msg = 'Progress';
                                    $btn_color = 'text-blue-700';
                                @endphp
                            @elseif ($order_item->order->status == 2)
                                @php
                                    $msg = 'Warehouse delivered';
                                    $btn_color = 'text-green';
                                @endphp
                                @elseif ($order_item->order->status == 3)
                                @php
                                    $msg = 'Assigne delivery ';
                                    $btn_color = 'text-green';
                                @endphp
                                @elseif ($order_item->order->status == 4)
                                @php
                                    $msg = 'Out for delivery';
                                    $btn_color = 'text-green';
                                @endphp
                                @elseif ($order_item->order->status == 5)
                                @php
                                    $msg = 'Delivered';
                                    $btn_color = 'text-green';
                                @endphp

                            @endif

                            <p class="m-0 p-0 text-gray-400">Status:
                                <span class="font-weight-bold {{ $btn_color }}">{{ $msg }}</span>
                            </p>
                            <div class="d-flex mb-3 " style="display: flex;margin: 3px;">
                                <form action = "{{ route('sett.update_status_order' , $order_item->id) }}" method="POST">

                                    @csrf

                                    <select class="form-select" name="status">
                                        <option @if ($order_item->order->status == 1)
                                        selected
                                    @endif value="2">Progress</option>
                                        <option @if ($order_item->order->status == 2)
                                        selected
                                    @endif value="2">Warehouse delivered</option>
                                        <option @if ($order_item->order->status == 3)
                                        selected
                                    @endif value="3">Assigne delivery</option>
                                        <option @if ($order_item->order->status == 4)
                                        selected
                                    @endif value="4">Out for delivery</option>
                                        <option @if ($order_item->order->status == 5)
                                        selected
                                    @endif value="5">Delivered</option>

                                        </select>

                                    <div class="ps-3" style="position: absolute;left: 359px;top: 246px;">
                                        <button type="submit" class="btn btn-default btn-primary">Send
                                        </button>
                                    </div>
                                </form>
                            </div>
                            @if ($order_item->order->status == 1)
                                <p class="m-0 p-0 text-gray-400">Deposit amount: <span
                                    class="text-gray-900 font-weight-bold">{{ date('d M Y', strtotime($order_item->eller_confirmation_date)) }}
                                </p>
                            @elseif ($order_item->order->status == 2)
                                <p class="m-0 p-0 text-gray-400">Delivered Date: <span
                                        class="text-gray-900 font-weight-bold">{{ date('d M Y', strtotime($order_item->delivered_dates)) }}
                                        <span class="text-gray-400 text-xxs">EGP {{ $order_item->order->sub_total   }}</span></span>
                                </p>
                           
                            @endif
                            <hr>
                            <p class="m-0 p-0 text-gray-400">Price: <span
                                    class="text-gray-900 fw-bold">{{ $order_item->price }} <span
                                        class="text-gray-400 text-xxs">EGP</span></span>
                            </p>
                            <p class="m-0 p-0 text-gray-400">Tax: <span
                                class="text-gray-900 fw-bold">{{ $order_item->tax }} <span
                                    class="text-gray-400 text-xxs">EGP</span></span>
                            </p>
                            <p class="m-0 p-0 text-gray-400">Domestic Delivery: <span
                                class="text-gray-900 fw-bold">{{ $order_item->order->domestic_delivery_fee }} <span
                                    class="text-gray-400 text-xxs">EGP</span></span>
                        </p>
                            <p class="m-0 p-0 text-gray-400">Total Price: <span
                                    class="text-gray-900 fw-bold">{{ $order_item->final_price }} <span
                                        class="text-gray-400 text-xxs">EGP</span></span>
                            </p>
                        </div>
                        <div>
                            <p class="mb-1 text-gray-400">Ship to:</p>
                            <div class="">
                                <h6 class="text-gray-700 text-capitalize">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $order_item->order->address->client->first_name . ' ' . $order_item->order->address->client->second_name }}
                                </h6>
                                <p class="text-gray-400 mb-0 text-s">
                                    {{ $order_item->order->address->building_number . ', ' . $order_item->order->address->name_street }}
                                </p>
                                <p class="text-gray-400 mb-0 text-s">{{ $order_item->order->address->address_details  }}</p>
                                <p class="text-gray-400 mb-1">
                                    {{ $order_item->order->address->city->name_en . ', ' . $order_item->order->address->region->name_en }}
                                </p>
                                <p class="text-gray-600 fw-bold"><i class="fas fa-phone me-1"></i>
                                    {{ $order_item->order->address->phone }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- end card  -->


                        <div class="bg-white b-r-s-cont mb-2 px-3 py-2 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-4 d-flex justify-content-between align-items-center ">
                                    <div class="d-flex align-items-center">
                                        <a > <img
                                                class="avatar-m2 me-2 b-r-xs align-self-center"
                                                src="{{ URL::asset('img/products/'. $order_item->product->cover_image)  }}" />
                                        </a>
                                        <div class="p-3 text-self-center">
                                            <a href=""
                                                class="text-m-3 fw-bold link-cust-text text-gray-500 text-s2 mb-1">
                                                {{ $order_item->product->name_en }}
                                            </a>
                                            <p class="text-with text-gray-400 text-xxs mb-0">Order Placed: <span
                                                    class="text-blue-100 text-gray-500 fw-bold">
                                                    {{ date('d M Y', strtotime($order_item->created_at)) }}</span>
                                            </p>
                                             <p class="text-with text-gray-400 text-xxs mb-0">Seller: <span
                                                    class="text-blue-100 text-gray-500 fw-bold">{{ $order_item->seller->user }}</span>
                                            </p>
                                            <p class="text-with text-gray-400 text-xxs mb-0">Quantity: <span
                                                    class="text-blue-100 text-gray-500 fw-bold">{{ $order_item->quantity}}</span>
                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4 d-flex align-items-center">
                                    <div class="text-start">

                                        <p class="text-s mb-1 text-gray-300">Final Price: <span
                                                class="fw-bold text-gray-600">
                                                {{ $order_item->final_price }} </span>
                                            <span class="text-gray-400 text-xs">EGP</span>
                                        </p>

                                    </div>
                                </div>
                                <div class="col-6 col-md-4 d-flex justify-content-center align-items-center">

                                 

                                    @if ($order_item->status == 1)
                                        @php
                                            $msg = ' in progress ';
                                            $btn_color = 'not_accepted-color-btn';
                                        @endphp
                                    @elseif ($order_item->status == 2)
                                        @php
                                            $msg = 'Seller confirmation';
                                            $btn_color = 'active-color-btn';
                                        @endphp
                                        @elseif ($order_item->status == 3)
                                        @php
                                            $msg = 'assigne delivery';
                                            $btn_color = 'active-color-btn';
                                        @endphp
                                        @elseif ($order_item->status == 4)
                                        @php
                                            $msg = 'out for delivery';
                                            $btn_color = 'active-color-btn';
                                        @endphp
                                        @elseif ($order_item->status == 5)
                                        @php
                                            $msg = 'delivered';
                                            $btn_color = 'active-color-btn';
                                        @endphp
                                    @endif

                                    <form action = "{{ route('sett.update_status' , $order_item->id) }}" method="POST">

                                        @csrf

                                        <select class="form-select" name="status">
                                        <option @if ($order_item->status == 1)
                                        selected
                                        @endif value="1">progress </option>
                                            <option @if ($order_item->status == 2)
                                            selected
                                        @endif value="2">Seller Confirmation</option>
                                        <option @if ($order_item->status == 3)
                                            selected
                                        @endif value="3">Delivered</option>
                                        <option @if ($order_item->status == 4)
                                            selected
                                        @endif value="4">refund </option>
                                        <option @if ($order_item->status == 5)
                                            selected
                                        @endif value="5">delivered refund</option>
                                        <option @if ($order_item->status == 6)
                                            selected
                                        @endif value="6">money refund</option>
                                        <option @if ($order_item->status == 7)
                                            selected
                                        @endif value="7">Canceled</option>
                                        </select>

                                        <div class="d-flex pt-4 justify-content-center">
                                            <button type="submit" class="btn btn-default btn-primary">Send
                                            </button>
                                        </div>
                                    </form>


                                </div>
                            </div>

                        @if ($order_item->status == 1)
                            <div class="row justify-content-center order_steps">
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            1
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light">Progress </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            2
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light">Seller Confirmation </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold"> Progress </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                            @elseif ($order_item->status == 2)
                                <div class="row justify-content-center order_steps">
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Progress</p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            1
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light">Progress </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold"> Progress </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            2
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Seller Confirmation </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold"> Seller Confirmation</p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            3
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Delivered </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Delivered </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                              
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                           4
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                           5
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> delivered refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">delivered refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            6
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> money refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">money refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            7
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Canceled </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Canceled </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                            @elseif ($order_item->status == 3)
                                <div class="row justify-content-center order_steps">
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Progress</p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            1
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light">Progress </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold"> Progress </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            2
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Seller Confirmation </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold"> Seller Confirmation</p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            3
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Delivered </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Delivered </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                              
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                           4
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                           5
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> delivered refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">delivered refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            6
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> money refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">money refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            7
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Canceled </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Canceled </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                            @elseif ($order_item->status == 4)
                                <div class="row justify-content-center order_steps">
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Progress</p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            1
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light">Progress </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold"> Progress </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            2
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Seller Confirmation </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold"> Seller Confirmation</p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            3
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Delivered </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Delivered </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                              
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                           4
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                           5
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> delivered refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">delivered refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            6
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> money refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">money refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            7
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Canceled </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Canceled </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                            @elseif ($order_item->status == 5)
                                <div class="row justify-content-center order_steps">
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Progress</p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            1
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light">Progress </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold"> Progress </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            2
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Seller Confirmation </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold"> Seller Confirmation</p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            3
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Delivered </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Delivered </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                              
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                           4
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                           5
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> delivered refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">delivered refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            6
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> money refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">money refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            7
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Canceled </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Canceled </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                            @elseif ($order_item->status == 6)
                                <div class="row justify-content-center order_steps">
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Progress</p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            1
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light">Progress </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold"> Progress </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            2
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Seller Confirmation </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold"> Seller Confirmation</p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            3
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Delivered </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Delivered </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                              
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                           4
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                           5
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> delivered refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">delivered refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            6
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> money refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">money refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            7
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Canceled </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Canceled </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                            @elseif ($order_item->status == 7)
                                <div class="row justify-content-center order_steps">
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Progress</p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            1
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light">Progress </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold"> Progress </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            2
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Seller Confirmation </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold"> Seller Confirmation</p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            3
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Delivered </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Delivered </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>

                              
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                           4
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                           5
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> delivered refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">delivered refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            6
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> money refund </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">money refund </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
                                    </div>
                                </div>
                                
                                <div class="col align-self-center text-start mt-2">
                                    <div class="d-flex justify-content-start">
                                        <p
                                            class="rounded-circle border_2 text-gray-400 m-1 size_30 d-flex justify-content-center align-items-center">
                                            7
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s text-gray-400 align-items-center">
                                            <p class="mb-0 me-2 fw-light"> Canceled </p>
                                            <hr class="float-end">
                                        </h6>
                                    </div>
                                </div>
                                <div class="col align-self-center mt-2">
                                    <div class="d-flex justify-content-start">
                                        <div class="rounded-circle border_2 m-1 size_30 p-1"><i
                                                class="fa fa-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="d-flex m-0 text-s me-2 align-items-center mb-0">
                                            <p class="mb-0 me-2 fw-bold">Canceled </p>
                                            <hr class="select float-end">
                                        </h6>
                                        <p class="text-gray-300 text-xxs mb-0">
                                            {{ date('d M Y', strtotime($order_item->created_at)) }}</p>
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
    <div class="modal fade" id="delete1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
            <div class="modal-content b-r-s-cont borders-0">

                <div class="modal-header">
                    <div class="modal-title" id="exampleModalLabel"><i class="fa fa-trash me-1"></i>
                        Canceled Item</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="" method="post">
                    {{ method_field('post') }}
                    {{ csrf_field() }}

                    <!-- Modal content -->
                    <div class="modal-body px-4">

                        <div class="modal-body delete-conf-input text-center py-0">
                            <p class="mb-0">ِAre you sure you want to canceled
                                this
                                item?</p><br>
                            <input type="hidden" name="item_id" value="">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="left-side">
                            <button type="button" class="btn btn-default btn-link" data-bs-dismiss="modal">Never
                                Mind</button>
                        </div>
                        <div class="divider"></div>
                        <div class="right-side">
                            <button type="submit" class="btn btn-default btn-link text-red">Canceled
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

