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


<!-- content insert -->
@section('content')
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
    <div class="add-product">

        <div class="container-fluid">
            <div class="row">
                @include('website/layouts.includes.sidebar')


                <div class="col-12 col-md-12 col-xl-9 p-2 mt-4">
                    <div class="vendor-profile">
                      <div class="container-fluid">
                        <div class="d-flex justify-content-between ">
                            <p class="fs-5 fw-bold mt-1"> جميع المنتحات </p>
                        <div class="d-flex market align-items-baseline">
                              <div class="dropdown latest">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                الاحداث
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                  <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                  <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                </ul>
                              </div>

                              <div class="dropdown latest">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  الاعلى سعر
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                  <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                  <li><a class="dropdown-item" href="#">الاحداث</a></li>
                                </ul>
                              </div>
                              <button class="add-products"> <i class="fa-solid fa-plus"></i></button>
                        </div>

                    </div>
                        <div class="row">

                            @foreach ($all_product as $item)

                          <div class="col-xxl-3 col-xl-4 col-md-4 col-sm-6 mb-3">
                            <div class="product-swiper">
                              <div class="product-image">
                                <img src="{{ URL::asset('img/products/' . $item->product->cover_image	) }}"/>
                              </div>
                              <h2 class="mt-3 mb-2"><a href="{{ route('seller.ShowProducts' ,$item->id)}}">{{$item->product->name_ar}}</a></h2>
                              <div class="mt-2">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i> (4.0)
                              </div>
                              <h5 class="mt-2">{{$item->product->description_ar}}</h5>
                              <div class="mt-2 d-flex justify-content-between">
                                    <p class="price me-2">{{$item->product->orginal_price}}</p>
                                    <p class="dis-count ms-2">5.00 EGP</p>
                              </div>
                             
                          </div>
                          </div>
                          <!-- Modal -->
                        
                          @endforeach
                         
                        </div>
                       
                      </div>
                      
                    </div>
                   
            </div>
              {{ $all_product->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>



    @endsection


    @section('js')

    <!-- delete confirmation modal -->
    <!-- delete confirmation modal -->
    <script>
        $('.delete-conf').click(function(event) {
            var product_id = $(this).data("product_id");
            console.log(product_id);
            var modal = $('.delete-conf-input [name="product_id"]')
            modal.val(product_id);
        })
    </script>

    <script>
        $(document).ready(function() {
            var table = $('#p-lab-table').DataTable({
                lengthChange: true,
                buttons: [{
                    extend: 'csv',
                    split: ['pdf', 'excel'],
                }]
            });
        });
    </script>

    <!-- -- datatables plugin -- -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.bootstrap5.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>



@endsection
