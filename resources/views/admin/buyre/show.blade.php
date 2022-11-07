@extends('admin.layouts.master')

@section('title', 'Client Show')

@section('title-topbar', 'Client Show')

<!-- css insert -->
@section('css')

    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection


<!-- content insert -->
@section('content')

    <div class="container-fluid px-2 mt-3">

        <!-- page title link -->
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <span class="mb-0">
                {{-- <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.home') }}">Dashboard |</a> --}}
                <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.buyre.index') }}">Clinte | </a>
                <a class="text-gray-300"> {{ $buyre->first_name }} </a>
            </span>
        </div>

        <div class="card card-input shadow mb-3 pb-3">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500">Client</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body px-3">




                <div class="row mb-2 ">


                    <div class="col-12 col-md-6 align-self-center mb-2">

                        <div class="avatar-update-container">
                            <div class="picture">
                                <img src="{{ URL::asset('img/useravatar/' . $buyre->avatar) }}" class="picture-src"
                                    id="mib_PicturePreview" title="" />
                            </div>
                        </div>


                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label">Email</label>
                        <h6> {{ $buyre->email }}</h6>

                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label">First Name</label>
                        <h6>{{ $buyre->first_name }}</h6>
                    </div>

                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label">Second Name</label>
                        <h6>{{ $buyre->second_name }}</h6>
                    </div>

                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label">Gendar</label>
                        <h6>{{ $buyre->gendar }}</h6>
                    </div>

                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label">Countries</label>
                        @if ($buyre->country == null )

                        @else
                        <h6>{{ $buyre->country->name_ar }}</h6>
                        @endif

                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label">Activision</label>
                        <h6>
                            @if ($buyre->inactive == 0)
                                Active
                            @else
                                Deactivate
                            @endif
                        </h6>

                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label">Note</label>
                        <p>{{ $buyre->note }}</p>

                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label">Phone Number</label>
                        <p>{{ $buyre->phone }}</p>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <a href="{{ route('sett.ShowOrders.client', $buyre->id) }}"
                            class="btn btn-sm status-col-link main-color b-r-xs mb-1" title="Orders"><i
                                class="fas fa-shopping-cart"></i> Order </a>
                    </div>


                </div>




            </div>

        </div>
    </div>

@endsection

<!-- js insert -->
@section('js')



@endsection
