@extends('admin.layouts.master')

@section('title', 'Edit Product')

@section('title-topbar', 'Edit Product')

<!-- css insert -->
@section('css')

    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

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
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-pencil-alt"></i> Edit Product</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body px-3">

                <form id="myforminput" method="POST" action="{{ route('sett.product.update', $product->id) }}"
                    enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    @csrf


                    <div class="row mb-1">
                        <div class="col-12 col-md-5 align-self-center mb-2">

                            <div class="avatar-update-container">
                                <div class="picture">
                                    <img src="{{ URL::asset('img/products/' . $product->cover_image) }}" class="picture-src"
                                        id="mib_PicturePreview" title="" />
                                    <input type="file" name='cover_image' accept="image/*" id="mib_img_input">
                                </div>
                                <h6 class="text-gray-300">Choose Cover Image Product</h6>

                                @error('cover_image')
                                    <span class="error-msg-form">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>


                        </div>


                        <div class="col-12 col-md-7 mb-2">
                            <div class="mb-3">
                                <label class="form-label"> Name Nrabic <small>(required)</small></label>
                                <input name="name_ar" type="text"
                                    class="form-control @error('name_ar') is-invalid @enderror"
                                    placeholder="Write the barnd name nrabic here.." value="{{ $product->name_ar }}"
                                    autofocus required>
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
                                    placeholder="Write the barnd name english here.." value="{{ $product->name_en }}"
                                    required>
                            </div>

                            @error('name_en')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-2 ">
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">slug arabic <small>(required)</small></label>
                            <input name="slug_ar" type="text" class="form-control @error('slug_ar') is-invalid @enderror"
                                placeholder="Write the slug arabic  here.." value="{{ $product->slug_ar }}" required>

                            @error('slug_ar')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">slug english<small>(required)</small></label>
                            <input name="slug_en" type="text" value="{{ $product->slug_en }}"
                                class="form-control @error('slug_en') is-invalid @enderror"
                                placeholder="Write the slug english here.." required>

                            @error('slug_en')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Short Description arabic <small>(required)</small></label>
                            <textarea name="short_description_ar" class="form-control" placeholder="Write here your description arabic .." rows="4"
                                spellcheck="false">{{ $product->short_description_ar }}</textarea>
                            @error('short_description_ar')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Short Description english <small>(required)</small></label>
                            <textarea name="short_description_en" class="form-control" placeholder="Write here your Description english .." rows="4"
                            spellcheck="false">{{ $product->short_description_en }}</textarea>
                        @error('short_description_en')
                            <span class="error-msg-form">
                                {{ $message }}
                            </span>
                        @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Description arabic <small>(required)</small></label>
                            <textarea class="description" name="description_ar">{{ $product->description_ar }}</textarea>

                            @error('description_ar')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Description english <small>(required)</small></label>
                            <textarea class="description" name="description_en">{{ $product->description_en }}</textarea>
                            @error('description_en')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Main Category <small>(required)</small></label>
                            <select class="js-example-basic-single select2-no-search select2-hidden-accessible"
                                name="main_categorys_id" >

                                @foreach ($mainCategorys as $item)
                                    <option @if ($product->main_Category->id == $item->id) selected @endif value="{{ $item->id }}">
                                        {{ $item->name_en }}
                                    </option>
                                @endforeach


                            </select>
                            @error('main_categorys_id')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Sub Category <small>(required)</small></label>
                            <select class="js-example-basic-single select2-no-search select2-hidden-accessible"
                                name="sub_categories_id" >
                                {{--  @foreach ($subCategorys as $item)
                                    <option @if ($product->sub_category->id == $item->id) selected @endif value="{{ $item->id }}">
                                        {{ $item->name_en }}
                                    </option>
                                @endforeach  --}}
                                <option value="{{ $product->sub_category['id'] }}" selected>
                                            {{ $product->sub_category['name_en'] }}
                                        </option>
                            </select>
                            @error('sub_categories_id')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Sub Sub Category <small>(required)</small></label>
                            <select class="js-example-basic-single select2-no-search select2-hidden-accessible"
                                name="sub_sub_category_id" >
                                        <option value="{{ $product->sub_sub_category['id'] }}" selected>
                                            {{ $product->sub_sub_category['name_en'] }}
                                        </option>

                            </select>
                            @error('sub_sub_category_id')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label"> Brands <small>(required)</small></label>
                            <select class="js-example-basic-single select2-no-search select2-hidden-accessible"
                                name="brand_id" >
                                {{--
                                <option selected value="{{ $product->brand->id }}">
                                    {{ $product->brand->name_en }}
                                </option> --}}
                                @foreach ($Brands as $item)
                                    <option @if ($product->brand->id == $item->id) selected @endif value="{{ $item->id }}">
                                        {{ $item->name_en }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label"> Orginal Price <small>(required)</small></label>
                            <input name="orginal_price" type="text"
                                class="form-control  @error('orginal_price') is-invalid @enderror"
                                value="{{ $product->orginal_price }}" placeholder="Write the Orginal Price here.."
                                required>
                            @error('orginal_price')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label"> Tax <small>(required)</small></label>
                            <input name="tax" type="text" class="form-control @error('tax') is-invalid @enderror"
                                value="{{ $product->tax }}" placeholder="Write the tax here.." required>
                            @error('tax')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label"> sku <small>(required)</small></label>
                            <input name="sku" type="text" class="form-control @error('sku') is-invalid @enderror"
                                value="{{ $product->sku }}" placeholder="Write the sku here.." required>
                            @error('sku')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        @foreach ($product->sub_prices as $sub_prices)
                            <div class="col-12 col-md-6 mb-2">

                                <label class="form-label">{{ $sub_prices->Subscription->name_ar }}
                                    <small>(required)</small></label>
                                <input value="{{ $sub_prices->id }}" name="sub_id[]" type="hidden"
                                    class="form-control @error('sub_id') is-invalid @enderror">
                                <input name="price[]" type="text"
                                    class="form-control @error('price') is-invalid @enderror"
                                    placeholder="Write the gift here.." value="{{ $sub_prices->price }}" required>


                                @error('price')
                                    <span class="error-msg-form">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        @endforeach

                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Activision <small>(required)</small></label>
                            <select
                                class="js-example-basic-single select2-no-search select2-hidden-accessible @error('inactive') is-invalid @enderror"
                                name="inactive" value="{{ $product->inactive }}" required>
                                <option value="0" @if ($product->inactive === 0) selected @endif>Active</option>
                                <option value="1" @if ($product->inactive === 1) selected @endif>Deactivate
                                </option>
                            </select>
                            <div id="deactivate-js-error-valid"></div>

                            @error('inactive')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">country <small>(required)</small></label>
                            <select
                                class="js-example-basic-single select2-no-search select2-hidden-accessible @error('inactive') is-invalid @enderror"
                                name="country_id" value="{{ $product->inactive }}" required>
                                @foreach ($countrys as $item )
                                <option value="{{ $item->id }}" @if ($product->country->id === $item->id) selected @endif>{{ $item->name_ar }}</option>
                                @endforeach
                            </select>
                            <div id="deactivate-js-error-valid"></div>

                            @error('inactive')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>

                        <div class="row">
                            @foreach ($product->Productimg as $image)
                                <div class="col-12 col-md-3 mb-2 position-relative">
                                    <img src="{{ URL::asset('img/products/' . $image->name_img) }}"
                                        class="picture-src w-50 " id="mib_PicturePreview" title="" />
                                    <a class="btn btn-danger position-absolute z-index-1" style="right:14px; opacity:70%;"
                                        href="{{ route('sett.deleteImage', $image->id) }}"><i
                                            class="far fa-trash-alt"></i></a>
                                </div>
                            @endforeach

                        </div>




                        <div class="col-12 align-self-center mb-2">
                            <div>
                                <input type="file" name="all_imgs[]" id="inputImage" multiple>
                                @error('all_imgs')
                                    <span class="error-msg-form">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <p class="text-gray-300">Features</p>
                            <div class="col-12 col-md-4">
                                <div class="row">
                                    <div class="col-6 fw-bold">
                                        <i class="fas fa-cash-register me-2"></i>
                                        <span id="service_final_info">Baby Offers</span>
                                    </div>
                                    <div class="col-6 text-center">
                                        <div class="switch-checkbox">
                                            <input class="done_btn" @if ($product->baby_Offers == 1) checked @endif
                                                name="baby_Offers" type="checkbox" value="1" id="discount_check">
                                            <label for="discount_check" class="ms-auto me-auto">Toggle</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6 fw-bold">
                                        <i class="fas fa-cash-register me-2"></i>
                                        <span id="service_final_info"> Health beauty offers</span>
                                    </div>
                                    <div class="col-6 text-center">
                                        <div class="switch-checkbox">
                                            <input class="done_btn" @if ($product->Health_beauty_offers == 1) checked @endif
                                                name="Health_beauty_offers" type="checkbox" value="1" id="Health_beauty_offers">
                                            <label for="Health_beauty_offers" class="ms-auto me-auto">Toggle</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="row">
                                    <div class="col-6 fw-bold">
                                        <i class="fas fa-cash-register me-2"></i>
                                        <span id="service_final_info">Today Offer</span>
                                    </div>
                                    <div class="col-6 text-center">
                                        <div class="switch-checkbox">
                                            <input class="done_btn" @if ($product->today_offer == 1) checked @endif
                                                name="today_offer" type="checkbox" value="1" id="today">
                                            <label for="today" class="ms-auto me-auto">Toggle</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="row">
                                    <div class="col-6 fw-bold">
                                        <i class="fas fa-cash-register me-2"></i>
                                        <span id="service_final_info">Supermarket Offer</span>
                                    </div>
                                    <div class="col-6 text-center">
                                        <div class="switch-checkbox">
                                            <input class="done_btn"@if ($product->supermarket_offer == 1) checked @endif
                                                name="supermarket_offer" type="checkbox" value="1"
                                                id="supermarket_check">
                                            <label for="supermarket_check" class="ms-auto me-auto">Toggle</label>
                                        </div>
                                    </div>

                                </div>
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

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('.description').summernote({
      placeholder: 'Enter Description',
      tabsize: 2,
      height: 300,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['link']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>



    <!-- select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script></script>
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
    {{-- <script>
        //Rules for the Validator plugin
        var $validator = $('#myforminput').validate({
            rules: {
                nameAr: {
                    maxlength: 50,
                },
                nameEn: {
                    maxlength: 50,
                },
                slugAr: {
                    maxlength: 50,
                },
                slugEn: {
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
    </script> --}}
    <script>
              //for country and cities ajax inputs
              $('select[name="main_categorys_id"]').on('change', function(e) {

e.preventDefault();

var countryID = $(this).val();
var url = "{{ route('sett.sub_catgory_ajax', ':id') }}";
url = url.replace(':id', countryID);

var countryID = $(this).val();
if (countryID) {
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function(data) {
            $('select[name="sub_categories_id"]').empty();
            $.each(data, function(key, value) {
                $('select[name="sub_categories_id"]').append(
                    '<option value="' +
                    value.id + '">' + value.name_en + '</option>');
            });
        }
    });
} else {
    $('select[name="sub_categories_id"]').empty();
}
});
$('select[name="sub_categories_id"]').on('change', function(e) {

e.preventDefault();

var countryID = $(this).val();
var url = "{{ route('sett.sub_sub_catgory_ajax', ':id') }}";
url = url.replace(':id', countryID);

var countryID = $(this).val();
if (countryID) {
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function(data) {
            $('select[name="sub_sub_category_id"]').empty();
            $.each(data, function(key, value) {
                $('select[name="sub_sub_category_id"]').append(
                    '<option value="' +
                    value.id + '">' + value.name_en + '</option>');
            });
        }
    });
} else {
    $('select[name="sub_sub_category_id"]').empty();
}
});
    </script>

@endsection
