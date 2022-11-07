@extends('admin.layouts.master')

@section('title', 'New Supply | Proxima - Medical Management app')

@section('title-topbar', 'New Ctiy')

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
                <a class="link-cust-text text-gray-200 fw-light" href="">Supply | </a>
                <a class="text-gray-300">Add Supply</a>
            </span>
        </div>

        <div class="card card-input shadow mb-3 pb-3">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-plus me-2"></i> Add new Supply</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body px-3">

                <form id="myforminput" method="POST" action="{{ route('sett.supply.store') }}"
                  enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-2 ">

                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Quantity<small>(required)</small></label>
                            <input name="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror"
                                placeholder="Write the given City name english  here.." required>

                            @error('quantity')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Product <small>(required)</small></label>
                            <select
                                class="js-example-basic-single select2-hidden-accessible @error('product_id') is-invalid @enderror"
                                name="product_id" required>
                                @foreach ($product as $item)
                                    <option value="{{ $item->id }}">{{ $item->name_en }}</option>
                                @endforeach
                            </select>
                            <div id="product-js-error-valid"></div>

                            @error('product_id')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Seller <small>(required)</small></label>
                            <select
                                class="js-example-basic-single select2-hidden-accessible @error('seller_id') is-invalid @enderror"
                                name="seller_id" required>
                                @foreach ($seller as $item)
                                    <option value="{{ $item->id }}">{{ $item->first_name . ' ' . $item->second_name }}</option>
                                @endforeach
                            </select>
                            <div id="country-js-error-valid"></div>

                            @error('seller_id')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Seller Stock<small>(required)</small></label>
                            <select
                                class="js-example-basic-single select2-hidden-accessible @error('seller_stock_id') is-invalid @enderror"
                                name="seller_stock_id" required>
                                @foreach ($seller_stock as $item)
                                    <option value="{{ $item->id }}">{{ $item->name}}</option>
                                @endforeach
                            </select>
                            <div id="country-js-error-valid"></div>

                            @error('seller_stock_id')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>



                    </div>

                    <div class="d-flex pt-4 justify-content-center">
                        <button type="submit" class="btn btn-default btn-primary">Send
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
                name: {
                    maxlength: 50,
                },
                quantity: {
                    maxlength: 50,
                },
                product_id: {
                    maxlength: 50,
                },
                seller_id: {
                    maxlength: 50,
                },
            },
            //for inserting erros for some inputs that makes posation problem such as selector 2 and bt datapicker
            errorPlacement: function(error, element) {
                switch (element.attr("name")) {
                    case 'permissions':
                        error.insertAfter($("#permissions-js-error-valid"));
                        break;
                        case 'name':
                        error.insertAfter($("#name-js-error-valid"));
                        break;
                        case 'quantity':
                        error.insertAfter($("#quantity-js-error-valid"));
                        break;
                        case 'product_id':
                        error.insertAfter($("#product-js-error-valid"));
                        break;
                        case 'seller_id':
                        error.insertAfter($("#seller-js-error-valid"));
                        break;

                    default:
                        error.insertAfter(element);
                }

            },
        });
    </script>

@endsection
