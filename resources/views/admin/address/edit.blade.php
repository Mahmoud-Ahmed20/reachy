@extends('admin.layouts.master')

@section('title', 'Edit  Countrie  | Proxima - Medical Management app')

@section('title-topbar', 'Edit  Countrie')

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
                <a class="link-cust-text text-gray-200 fw-light" href="">Countries | </a>
                <a class="text-gray-300">Edit Countries</a>
            </span>
        </div>

        <div class="card card-input shadow mb-3 pb-3">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-pencil-alt"></i> Edit countries</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body px-3">

                <form id="myforminput" method="POST" action="{{ route('sett.update_address',$address->id) }}">

                    @csrf
                    @method('PUT')
                    <div class="row mb-2 ">

                        <!-- <div class="col-12 col-md-12 mb-2">
                            <label class="form-label">Ctiy <small>(required)</small></label> -->
                            <!-- <select class="js-example-basic-single select2-no-search select2-hidden-accessible"
                                name="city_id" required>

                                    <option value=""></option>

                            </select> -->

                            <!-- @error('country_id')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div> -->
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Favorite Address<small>(required)</small></label>
                            <input name="favorite_address" type="text" class="form-control @error('favorite_address') is-invalid @enderror"
                                placeholder="Write the given City name arabic here.." required value="{{$address->favorite_address}}">

                            @error('favorite_address')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Name Street <small>(required)</small></label>
                            <input name="name_street" type="text" class="form-control @error('name_street') is-invalid @enderror"
                                placeholder="Write the given City name english  here.." required value="{{$address->name_street}}">

                            @error('name_street')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Address Details<small>(required)</small></label>
                            <input name="address_details" type="text" class="form-control @error('address_details') is-invalid @enderror"
                                placeholder="Write the given City name english  here.." required value="{{$address->address_details}}">

                            @error('address_details')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Building Number <small>(required)</small></label>
                            <input name="building_number" type="text" class="form-control @error('building_number') is-invalid @enderror"
                                placeholder="Write the given City name english  here.." required value="{{$address->building_number}}">

                            @error('building_number')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Apartment Number <small>(required)</small></label>
                            <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                placeholder="Write the given City name english  here.." required value="{{$address->phone}}">

                            @error('phone')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Apartment Number <small>(required)</small></label>
                            <input name="apartment_number" type="text" class="form-control @error('apartment_number') is-invalid @enderror"
                                placeholder="Write the given City name english  here.." required value="{{$address->apartment_number}}">

                            @error('apartment_number')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                    </div>

                    <div class="d-flex pt-4 justify-content-center">
                        <button type="submit" class="btn btn-default btn-primary">Update
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

@endsection

<!-- js insert -->
@section('js')

    <!-- select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            //hide search
            $('.select2-no-search').select2({
                minimumResultsForSearch: -1
            });

            //multi select
            $('#multiselect').select2();
            $('#multiselect').on('select2:opening select2:closing', function(event) {
                var $searchfield = $(this).parent().find('.select2-search__field');
                $searchfield.prop('disabled', true);
            });
        });
    </script>

    <!-- validate jquery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js" type="text/javascript">
    </script>
    <script>
        //Rules for the Validator plugin
        var $validator = $('#myforminput').validate({
            rules: {
                favorite_address: {
                    maxlength: 50,
                },
                name_street: {
                    maxlength: 50,
                },
                address_details: {
                    maxlength: 50,
                },
                building_number: {
                    maxlength: 50,
                },
                apartment_number: {
                    maxlength: 50,
                },
                phone: {
                    maxlength: 50,
                },

            },
            //for inserting erros for some inputs that makes posation problem such as selector 2 and bt datapicker
            errorPlacement: function(error, element) {
                switch (element.attr("name")) {
                    case 'permissions':
                        error.insertAfter($("#permissions-js-error-valid"));
                        break;

                    default:
                        error.insertAfter(element);
                }

            },
        });
    </script>

@endsection
