@extends('admin.layouts.master')

@section('title', 'Seller Show')

@section('title-topbar', 'Seller Show')

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
                <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.admin.seller.index') }}">Seller | </a>
                <a class="text-gray-300"> {{ $seller->first_name }} </a>
            </span>
        </div>

        <div class="card card-input shadow mb-3 pb-3">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500">Seller</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body px-3">




                <div class="row mb-2 ">


                    <div class="col-12 col-md-6 align-self-center mb-2">

                        <div class="avatar-update-container">
                            <div class="picture">
                                <img src="{{ URL::asset('img/useravatar/' . $seller->avatar) }}" class="picture-src"
                                    id="mib_PicturePreview" title="" />
                            </div>
                        </div>


                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label">Email</label>
                        <h6> {{ $seller->email }}</h6>

                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label">First Name</label>
                        <h6>{{ $seller->first_name }}</h6>
                    </div>

                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label">Second Name</label>
                        <h6>{{ $seller->second_name }}</h6>
                    </div>

                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label">User</label>
                        <h6>{{ $seller->user }}</h6>
                    </div>

                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label">phone</label>
                        <h6>{{ $seller->phone }}</h6>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label">Activision</label>
                        <h6>
                            @if ($seller->inactive == 0)
                                Active
                            @else
                                Deactivate
                            @endif
                        </h6>

                    </div>

                    <div class="col-12 col-md-6 align-self-center mb-2">
                    </div>
                    <div class="col-12 col-md-6 align-self-center mb-2">

                        <div class="avatar-update-container">
                            <div class="picture">
                                <img src="{{ URL::asset('img/useravatar/' . $seller->commercial_register) }}" class="picture-src"
                                    id="mib_PicturePreview" title="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 align-self-center mb-2">

                        <div class="avatar-update-container">
                            <div class="picture">
                                <img src="{{ URL::asset('img/useravatar/' . $seller->commercial_register) }}" class="picture-src"
                                    id="mib_PicturePreview" title="" />
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12 col-md-6 mb-2">
                        <label class="form-label">Note</label>
                        <p>{{ $buyre->note }}</p>

                    </div> --}}
                    {{-- <div class="col-12 col-md-6 mb-2">
                        <label class="form-label">Phone Number</label>
                        <p>{{ $buyre->phone }}</p>
                    </div> --}}



                </div>




            </div>

        </div>
    </div>

@endsection

<!-- js insert -->
@section('js')



@endsection
