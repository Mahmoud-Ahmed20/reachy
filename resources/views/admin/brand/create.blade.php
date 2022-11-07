@extends('admin.layouts.master')

@section('title', 'New  brand | Proxima - Medical Management app')

@section('title-topbar', 'New brand')

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
                <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.countries.index') }}">brands | </a>
                <a class="text-gray-300">Add brands</a>
            </span>
        </div>

        <div class="card card-input shadow mb-3 pb-3">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-plus me-2"></i> Add new brand</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body px-3">

                <form id="myforminput" method="POST" action="{{ route('sett.brand.store') }}" enctype="multipart/form-data">

                    @csrf

                     <div class="cont_tap " id="clinics">

                            <div class="row mb-1">
                                <div class="col-12 col-md-5 align-self-center mb-2">

                                    <div class="avatar-update-container">
                                        <div class="picture">
                                            <img src="{{ URL::asset('img/cavatars/default-pp.png') }}"
                                                class="picture-src" id="mib_PicturePreview" title="" />
                                            <input type="file" name='logo' accept="image/*" id="mib_img_input">
                                        </div>
                                        <h6 class="text-gray-300">Choose Picture</h6>

                                        @error('logo')
                                            <span class="error-msg-form">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>


                                </div>


                                <div class="col-12 col-md-7 mb-2">
                                    <div class="mb-3">
                                        <label class="form-label"> Name Arabic <small>(required)</small></label>
                                        <input name="name_ar" type="text"
                                            class="form-control @error('name_ar') is-invalid @enderror"
                                            placeholder="Write the barnd name nrabic here.." value="{{ old('name_ar') }}" autofocus required>
                                    </div>

                                    @error('name_ar')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                    <div class="mb-3">
                                        <label class="form-label">Name English <small>(required)</small></label>
                                        <input name="name_en" type="text"
                                            class="form-control @error('name_en') is-invalid @enderror"
                                            placeholder="Write the barnd name english here.." value="{{ old('name_en') }}" required>
                                    </div>

                                    @error('name_en')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>



                            <div class="row mb-2">
                                <div class="col-12 col-md-6 mb-2">
                                    <label class="form-label">Slug Arabic <small>(required)</small></label>
                                    <input id="password" name="slug_ar" type="text"
                                        class="form-control @error('slug_ar') is-invalid @enderror"
                                        placeholder="Write the barnd slug nrabic here.." value="{{ old('slug_ar') }}" required>

                                   @error('slug_ar')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-12 col-md-6 mb-2">
                                    <label class="form-label">Slug English <small>(required)</small></label>
                                    <input name="slug_en" type="text" class="form-control"
                                        placeholder="Write the  barnd slug english here.." id="password-confirm"
                                        value="{{ old('slug_en') }}" required>

                                    @error('slug_en')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

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
                nameAr: {
                    maxlength: 50,
                },
                nameEn:{
                    maxlength: 50,
                },
                slugAr: {
                    maxlength: 50,
                },
                slugEn:{
                    maxlength: 50,
                }
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
