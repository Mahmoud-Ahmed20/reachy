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
                <a id="flash-msg-btn" class="text-blue-300 clickable-item-pointer"><i class="fas fa-times"></i></a>
            </div>
            <h3>Sent Successfully</h3>
            <p class="text-blue-300">{{ Session::get('success') }}</p>
        </div>
    @endif

    <!-- session successful message -->


@endsection
<!-- content insert -->
@section('content')

    <div class="add-product">

        <div class="container-fluid">
            <div class="row">
                @include('website/layouts.includes.sidebar')

                <div class="col-12 col-xl-9 pt-3 div-boxshadow">
                    <div class="p-4">
                        <h1 class="fw-bold fs-5"><i style="color:#3E4763;" class="fa-solid fa-gift"></i> اضافة منتج جديد</h1>
                        <p class="fs-6 color-text">إذا كان المنتج غير مسجل سيتم قبول المنتج من الادارة</p>
                        <form id="myforminput" method="POST" action="{{ route('seller.store_add_product') }}"
                    enctype="multipart/form-data">

                    @csrf
                            <div class="row">
                                <div class="col-lg-3 text-center pt-5">

                                    <div class="avatar-update-container">
                                        <div class="picture">
                                                <img src="{{ URL::asset('img/dashboard/avatars/default-pp.png') }}"
                                                        class="picture-src" id="mib_PicturePreview" title="" />
                                                <input type="file"  name='cover_image' accept="image/*" id="mib_img_input">
                                        </div>
                                        <h6 class="text-gray-300">Choose Picture</h6>

                                        @error('cover_image')
                                            <span class="error-msg-form">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-9 pt-3">
                                  <div class="row">
                                    <div class="col-lg-6">
                                        <label class="form-label">Name Arabic <small>(required)</small></label>

                                        <input name="name_ar" type="text"
                                    class="form-control @error('name_ar') is-invalid @enderror"
                                    placeholder=" اسم المنتج بالعربى" value="{{ old('name_ar') }}" autofocus
                                    required>

                                    @error('name_ar')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Name English <small>(required)</small></label>

                                        <input name="name_en" type="text"
                                        class="form-control mb-3"
                                        placeholder=" اسم المنتج بالانجليزيه">
                                        @error('name_en')
                                            <span class="error-msg-form">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6 mt-2">
                                        <label class="form-label">Description Arabic <small>(required)</small></label>

                                        <textarea name="description_ar" class="form-control" placeholder="وصف المنتج بالعربى" rows="4"
                                        spellcheck="false">{{ old('description_ar') }}</textarea>
                                    @error('description_ar')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="col-lg-6 mt-2">
                                        <label class="form-label">Description English <small>(required)</small></label>

                                        <textarea name="description_en" class="form-control" placeholder="وصف المنتج بالانجليزى" rows="4"
                                            spellcheck="false">{{ old('description_en') }}</textarea>
                                        @error('description_en')
                                            <span class="error-msg-form">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4 mt-2">
                                        <label class="form-label">Main Category <small>(required)</small></label>

                                      <select class="js-example-basic-single select2-no-search select2-hidden-accessible"
                                      name="main_categorys_id" required>القسم الرئيسى
                                        @foreach ($mainCategorys as $mainCategory)
                                            <option value="{{ $mainCategory->id }}">{{ $mainCategory->name_en }}</option>
                                        @endforeach
                                        </select>

                                        @error('main_categorys_id')
                                            <span class="error-msg-form">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label class="form-label">Sub Category <small>(required)</small></label>

                                        <select class="js-example-basic-single select2-no-search select2-hidden-accessible"
                                            name="sub_categories_id" required>
                                            @foreach ($subCategorys as $subCategory)
                                                <option value="{{ $subCategory->id }}">{{ $subCategory->name_en }}</option>
                                            @endforeach
                                        </select>
                                        @error('sub_categories_id')
                                            <span class="error-msg-form">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label class="form-label">Sub Sub Category <small>(required)</small></label>

                                        <select class="js-example-basic-single select2-no-search select2-hidden-accessible"
                                            name="sub_sub_category_id" required>
                                            @foreach ($subSubCategorys as $subSubCategory)
                                                <option value="{{ $subSubCategory->id }}">{{ $subSubCategory->name_en }}</option>
                                            @endforeach
                                        </select>

                                        @error('sub_sub_category_id')
                                            <span class="error-msg-form">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                      </div>
                                  </div>
                                </div>

                            </div>
                              <div class="row">
                                <div class="col-lg-6 mt-2">
                                    <label class="form-label"> Slug Arabic <small>(required)</small></label>

                                      <input name="slug_ar" type="text" class="form-control @error('slug_ar') is-invalid @enderror"
                                      placeholder="Url Arabic" value="{{ old('slug_ar') }}" required>

                                  @error('slug_ar')
                                      <span class="error-msg-form">
                                          {{ $message }}
                                      </span>
                                  @enderror
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <label class="form-label"> Slug English <small>(required)</small></label>

                                      <input name="slug_en" type="text" class="form-control @error('slug_en') is-invalid @enderror"
                                      placeholder="Url English" value="{{ old('slug_en') }}" required>

                                    @error('slug_en')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-6 mt-2">
                                    <label class="form-label"> Brands <small>(required)</small></label>

                                    <select class="js-example-basic-single select2-no-search select2-hidden-accessible"
                                        name="brand_id" required>
                                        @foreach ($Brands as $Brand)
                                            <option value="{{ $Brand->id }}">{{ $Brand->name_en }}</option>
                                        @endforeach
                                    </select>

                                    @error('brand_id')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <label class="form-label"> Orginal Price <small>(required)</small></label>

                                    <input name="orginal_price" type="text"
                                  class="form-control  @error('orginal_price') is-invalid @enderror" placeholder="السعر الاساسى"placeholder="Write the Orginal Price here.." required>
                                    @error('orginal_price')
                                        <span class="error-msg-form">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                              </div>

                              <div class="row">
                                @foreach ($subscription as $item)
                                  {{-- <label class="form-label">  <small>(required)</small></label> --}}
                                  <input value="{{ $item->id }}" name="sub_id[]" type="hidden" class="form-control @error('sub_id') is-invalid @enderror">
                                      @error('sub_id')
                                      <span class="error-msg-form">
                                          {{ $message }}
                                      </span>
                                    @enderror
                                    <div class="col-12 col-md-6 mt-2">
                                        <label class="form-label"> {{ $item->name_en }}  ( Price ) <small>(required)</small></label>
                                        <input name="price[]" type="text"
                                            class="form-control @error('price') is-invalid @enderror"
                                            placeholder="Write the Price here.." required>
                                        @error('price')
                                            <span class="error-msg-form">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                @endforeach

                              </div>


                              <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="w-25 p-2 m-4 btn-form">اضافه</button>
                                </div>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection

<!-- js insert -->
@section('js')

    <!-- select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
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
    </script>

@endsection
