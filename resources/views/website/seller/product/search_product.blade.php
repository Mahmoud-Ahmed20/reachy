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

                <div class="col-12 col-xl-9 box-shadow cover-add-product">
                    <div class="">
                     <div class="container">
                         <div class="row">

                             <div class="mb-5 box">
                                 <h2 class="fs-3 fw-bold"><span><i class="fa-solid fa-box-open"></i></span>اضافة منتج</h2>
                             </div>

                             <form action="{{ route('seller.result_search') }}" method="GET">
                             <div class="mb-4 row">
                                 <div class="col-xl-8 mb-2">
                                       
                                        <input class="form-control form-control-sm input-select-add-product" type="search" name="search" placeholder="البحث عن منتجاتك"
                                            aria-label="Search" id="search_seller">
                                            <div id="search_seller_product" class="search-eng-results position-absolute d-flex  list-group p-4 bg-white b-r-l-b-cont text-start"
                                             style=" z-index:9999; display: none !important; 
                                            z-index: 9;
                                            width: 396px;
                                            left: 58.3%;
                                            top: 185px">
					
					            </div>
                                        <!-- <ul id="search_seller_product" class="position-absolute p-0 pt-2 search-eng-show-list" style="margin-top: 74px;"></ul> -->
                                </div>
                                 <div class="col-xl-4 mb-2">
                                     <select class="form-control form-control-sm input-select-add-product" aria-label=".form-select-sm example">
                                         <option selected>التصنيف الاساسي</option>
                                         @foreach ($mainCategory as $item)
                                         <option value="{{$item->name_ar}}">{{$item->name_ar}}</option>
                                         @endforeach
                                       </select>
                                 </div>
                                </div>
                             <div class="row mb-4 mt-4 ">
                                 <div class="col-xl-4 mb-2">
                                     <select class="form-control form-control-sm input-select-add-product" aria-label=".form-select-sm example">
                                         <option selected>التصنيف الاساسي</option>
                                         @foreach ($subCategory as $item)
                                         <option value="{{$item->name_ar}}">{{$item->name_ar}}</option>
                                         @endforeach
                                       </select>
                                 </div>
                                 <div class="col-xl-4 mb-2">
                                     <select class="form-control form-control-sm input-select-add-product" aria-label=".form-select-sm example">
                                         <option selected>التصنيف الاساسي</option>
                                         @foreach ($subSubCategory as $item)
                                         <option value="{{$item->name_ar}}">{{$item->name_ar}}</option>
                                         @endforeach
                                       </select>
                                 </div>
                                 <div class="col-xl-4  mb-2">

                                    <!-- Button trigger modal -->

                                    <!-- Modal -->
                                    <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الرجوع</button>
                                            <button  type="submit" class="btn second-color main-background   search-product border-20">متأكد</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>


                            <button type="button" class="btn second-color main-background   search-product border-20" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                             
                            </button> -->
                                     <button class="btn second-color main-background   search-product border-20"><i class="fa-solid fa-magnifying-glass"> بحث</i></button>
                                     
                                 </div>
                             </div>
                             </form>
                             <div class="and">
                                 <h2 class="second-color mb-4">أو</h2>
                                 <a href="{{ route('seller.add_product') }}" class="btn btn-add-product">اضافة منتج جديد</a>
                             </div>

                           


                         </div>

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
<script>
function myFunction() {
  alert("هل انت متأكد من تخذين المنتج");
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

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
<script>
    //--------------------- search engine ajax -------------------

    $(document).ready(function() {
        // Send Search Text to the server
        $("#search_seller").keyup(function() {

            let search = $(this).val();
            console.log(search);
            if (search != "") {

                var url = "{{ route('seller.products.search', 'search_query') }}";
                url = url.replace('search_query', search);

                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#search_seller_product").show();

                        if (data !== "") {

                            var html = ''
                            $.each(data, function(key, value) {

                                var url_show =
                                    "{{ route('seller.result_search', 'slug') }}";
                                url_show = url_show.replace('slug', value.slug_en);
                                var url_image =
                                    "{{ URL::asset('img/products/') }}" +
                                    "/" +
                                    value.cover_image;
                                html +=
                                '<div class="d-flex align-items-center mb-3"><img style="width:50px; height: 50px; object-fit: cover;"  src="' +
                                    url_image + '">';
                                html +=
                                '<a href="' + url_show +
                                    '" class="fs-6 text-black me-3 fw-light" style="cursor: pointer; color:#000;">' +
                                    value.name_ar + '</a></div>'; 

                            });
                            $('#search_seller_product').html(html);
                        }

                        if (data == "") {
                            $('#search_seller_product').html(
                                '<li class="justify-content-center"style="color:#000;"><i class="fas fa-search text-gray-200 me-2"></i>لا يوجد نتيجة </li><hr>'
                            );
                        }
                    },
                });
            } else {
                $("#search_seller_product").empty();
                $("#search_seller_product").hide();;
            }
        });
    });
</script>

@endsection
