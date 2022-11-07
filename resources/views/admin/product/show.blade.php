@extends('admin.layouts.master')

@section('title', 'Edit Countrie | Proxima - Medical Management app')

@section('title-topbar', 'Edit Countrie')

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
                {{-- <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.countries.index') }}">Countries | </a> --}}
                {{-- <a class="text-gray-300">Edit Countries</a> --}}
            </span>
        </div>

        <div class="card card-input shadow mb-3 pb-3">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-pencil-alt"></i> Edit countries</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body px-3">


                <div class="row mb-1">
                    <div class="col-12 col-md-5  align-self-center mb-2">
                        <div class="avatar-update-container">
                            <div class="picture">
                                <img src="{{ URL::asset('img/products/' . $item->cover_image) }}" class="picture-src w-25"
                                    id="mib_PicturePreview" title="" />
                                <input type="file" name='cover_image' accept="image/*" id="mib_img_input">
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-md-7 mb-2">
                        <div class="mb-3">
                            <h5>name Arabic</h5>
                            <h6 class="fst-normal">
                                {{ $item->name_ar }}</h6>
                        </div>



                        <div class="mb-3">
                            <h5>name English</h5>
                            <h6 class="fst-normal">
                                {{ $item->name_en }}</h6>
                        </div>



                    </div>
                </div>
                <div class="row mb-2 p-4">

                    <div class="col-12 col-md-6 mb-2">
                        <h5>Slug Arabic</h5>
                        <h6 class="fst-normal">{{ $item->slug_ar }}</h6>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h5>Slug English</h5>
                        <h6 class="fst-normal">{{ $item->slug_en }}</h6>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h5>Description Arabic</h5>
                        <p>{!! $item->description_ar !!}</p>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h5>Description English</h5>
                        <p>{!! $item->description_en !!}</p>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h5>Short Description Arabic</h5>
                        <p>{{ $item->short_description_ar }}</p>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h5>Short Description English</h5>
                        <p>{{ $item->short_description_en  }}</p>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h5>code</h5>
                        <h6>{{ $item->code }}</h6>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h5>Main Category </h5>
                        <h6>{{ $item->main_Category->name_en }}
                        </h6>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h5>Sub Category</h5>
                        <h6>{{ $item->sub_category->name_en }}
                        </h6>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h5>Sub Sub Category</h5>
                        <h6>
                            {{ $item->sub_sub_category->name_en }}</h6>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h5> Brands</h5>
                        <h6>{{ $item->brand->name_en }}</h6>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h5> Orginal Price</h5>
                        <h6>{{ $item->orginal_price }}</h6>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h5> Tax </h5>
                        <h6>{{ $item->tax }}</h6>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h5> Country  </h5>
                        <h6>{{ $item->country->name_ar }}</h6>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        @foreach ($item->sub_prices as $sub_prices)
                        <div class="col-12 col-md-6 mb-2">
                            <h5> {{ $sub_prices->Subscription->name_ar }}</h5>
                            <h6>{{ $sub_prices->price }}</h6>
                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="row">
                    @foreach ($item->Productimg as $image)
                        <div class="col-12 col-md-3 mb-2 position-relative">
                            <img src="{{ URL::asset('img/products/' . $image->name_img) }}" class="picture-src w-50 "
                                id="mib_PicturePreview" title="" />
                        </div>
                    @endforeach

                </div>

            </div>

        </div>
    </div>

@endsection

<!-- js insert -->
@section('js')




@endsection
