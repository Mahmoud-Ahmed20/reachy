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

    <div class="add-product">

        <div class="container-fluid">
            <div class="row">
                @include('website/layouts.includes.sidebar')


                <div class="col-lg-9 p-2 mt-4">
                    <div class="vendor-profile">
                      <div class="container-fluid">
                        <div class="d-flex justify-content-between ">
                            <p class="fs-5 fw-bold mt-1"> المنتجات التى فى انتظار الموافه عليها </p>
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
                                <img src="{{ URL::asset('img/products/' . $item->cover_image	) }}"/>
                              </div>
                              <h2 class="mt-3 mb-2">{{$item->name_ar}}</h2>

                              <h5 class="mt-2">{{$item->description_ar}}</h5>
                              <div class="mt-2 d-flex justify-content-between">
                                    <p class="price me-2">{{$item->orginal_price}}</p>
                                    <p class="dis-count ms-2">5.00 EGP</p>
                              </div>
                              <div class="d-flex justify-content-between">

                                  <button class="btn-update" type="button"><a class="btn-update_2" href="{{route('seller.product.edit' ,$item->id)}}"
                                    title="Edit" style="color:#fff">تعديل </a></button>

                                    <button class="p-2 add-cart" type="button"><a class="p-2 add-cart modal-effect b-r-xs mb-1 delete-conf"
                                title="delete" data-effect="effect-scale" data-product_id="{{ $item->id }}"
                                data-bs-toggle="modal" data-bs-target="#delete1"><i class="fas fa-trash"></i>
                                حذف
                                </a></button>
                              </div>
                                <div class="m-auto text-center">
                                    {{-- <button class="p-2 add-cart" type="button">حذف المنتج</button> --}}



                                </div>
                          </div>
                          </div>


                         <!-- Modal -->
                         <div class="modal fade" id="delete1" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
                             <div class="modal-content b-r-s-cont border-0">

                                 <div class="modal-header">
                                     <div class="modal-title" id="exampleModalLabel"><i
                                             class="fas fa-trash me-1"></i>
                                         Seller Delete</div>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal"
                                         aria-label="Close"></button>
                                 </div>

                                 <form action="{{ route('seller.destroy.request') }}" method="post">
                                       {{ method_field('delete') }}
                                       {{ csrf_field() }}

                                       <!-- Modal content -->
                                       <div class="modal-body px-4">

                                           <div class="modal-body delete-conf-input text-center py-0">
                                               <p class="mb-0">ِAre you sure you want to delete
                                                   this
                                                   city?</p><br>
                                               <input type="hidden" name="product_id" value="">
                                           </div>
                                       </div>

                                       <div class="modal-footer">
                                           <div class="left-side">
                                               <button type="button" class="btn btn-default btn-link"
                                                   data-bs-dismiss="modal"
                                                    style="background-color: #8888;
                                                        color: #fff;
                                                        text-decoration: none;">Never Mind
                                                </button>
                                           </div>
                                           <div class="divider"></div>
                                           <div class="right-side">
                                               <button type="submit"
                                                   class="btn btn-default btn-link text-red"
                                                    style="background-color: red;
                                                            color: #fff;
                                                            text-decoration: none;">Delete
                                               </button>
                                           </div>

                                       </div>
                                   </form>


                             </div>
                         </div>
                     </div>

                          @endforeach
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
