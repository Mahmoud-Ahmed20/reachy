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
                @include('website/layouts.includes.sidebar')

                <div class="col-12 col-xl-9 pt-3 div-boxshadow">
                    <div class="p-4">
                        <h1 class="fw-bold fs-5"><i style="color:#3E4763;" class="fa-solid fa-gift"></i> اضافة منتج جديد</h1>
                        <p class="fs-6 color-text">إذا كان المنتج غير مسجل سيتم قبول المنتج من الادارة</p>
                        <div class="market fw-bold">
                            <p class="fs-5">نتائج البحث لـ " {{ $search_query }} "</p>
                        </div>
                        <div class="row">

                        @if ($product->isEmpty())
                            <div class="no-found text-center ">
                                <div class="m-auto">
                                    <h2 class="mb-4">"المنتج غير متوفر"</h2>
                                    <a href="">منتجات ذات صلة / بديلة</a>
                                    <br>
                                    <button class="border-15 mt-2">اخبرنى عندما يتوفر</button>
                                </div>
                            </div>
                        @else

                            @foreach ($product as $item)

                            <div class="col-12 col-md-9 col-xl-9 mb-3">
                                <div class="row">
                                    <div class="col-md-6 col-xl-4">
                                        <div class="product-swiper">
                                            <div class="product-image">
                                                <img src="{{ URL::asset('img/products/' . $item->cover_image) }}"/>
                                            </div>
                                            <h2 class="mt-3 mb-2"><a href="{{ route('seller.show_product_stock' ,$item->id)}}">{{$item->name_ar}}</a></h2>
                                            <div class="mt-2">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star-half-stroke"></i> (4.0)
                                            </div>
                                            <h5 class="mt-2">{{$item->description_ar}}</h5>
                                            <div class="mt-2 d-flex justify-content-between">
                                                    <p class="price me-2">{{$item->orginal_price}}</p>
                                                    <p class="dis-count ms-2">5.00 EGP</p>
                                                
                                            </div>
                                            <button type="button" class="btn second-color main-background  search-product ms-2" data-bs-toggle="modal" 
                                                    data-bs-target="#staticBackdrop" style="background-color: #D62828;color: #fff;    height: 38px !important;width: 100%;">
                                                    اضافة مخزون   +
                                                    </button> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel"> اضافة مخزون</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                هل انت متأكد من اضافة مخزون للمنتج
                                </div>
                        
                                    <div class="modal-footer">
                                        <div class="left-side">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">خروج </button>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="right-side">
                                            <a class="delete-conf mt-5 mb-5" style="cursor: pointer;" title="delete"
                                                data-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#addStock">
                                                متأكد
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                          
                          

                        <form action="{{ route('seller.stock.store') }}" method="post">
                        <!-- {{ method_field('PUT') }} -->
                            @csrf
                            <div class="modal fade" id="addStock" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content  b-r-s-cont border-0">

                                        <div class="modal-header">
                                            <div class="modal-title" id="exampleModalLabel">
                                                اضافة مخزون </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <!-- Modal content -->
                                        <div class="modal-body px-4">
                                            <div class="modal-body  text-center py-0">
                                                <div class="row">

                                                    <div class="row">
                                                        <div class="col">
                                                            <input name="quantity" type="text" class="form-control" 
                                                            placeholder="اضافة الكميه" >
                                                            @error('quantity')
                                                                <span class="error-msg-form">
                                                                {{ $message }}
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                          
                                                                <input   type="hidden" class="form-control" name="product_id"
                                                                placeholder="اسم المنتج" value="{{$item->id}}" >
                                                            <span class="error-msg-form">
                                                            </span>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <div class="left-side">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">خروج </button>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="right-side">
                                                        <button type="submit" class="btn-form" style="color: #ffff;border-radius: 7px;">حفظ</button>

                                                    </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        @endforeach
                            @endif 
                        </div>
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
