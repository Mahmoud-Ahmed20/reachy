@extends('website/layouts.master_top')

@section('title', 'Product')

<!-- css insert -->
@section('css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

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
    <div class="product">

        <div class="container-fluid">
        
            <div class="row">
            
                @include('website/layouts.includes.sidebar')
                 
               <div class="col-12 col-md-12 col-xl-9 ">
                    <div class="row">
                        <div class="col-12 col-md-4 col-xl-5 pt-3 mt-5">
                            <img src="{{ asset('img/products/' . $seller_stock->product->cover_image) }}" style="object-fit: cover;height: 321px;"/>
                        </div>
                    
                        <div class="col-12 col-md-4 col-xl-5  mt-5">
                            <div class="info-product p-4">
                                <div class="d-flex justify-content-between">
                                    <h1> {{ $seller_stock->product->name_ar }}</h1>
                                </div>
                                <p style="  color:#817A7A;">كيس ارز الضحى وزن 5 كيلو جرام معبأ اليا ومن انقى انوع الارز</p>
                                <p><span style="color:#1D2C77;">حجم العلبة</span>: 2.2 L</p>
                                <div>
                                    3.6 <i class="fas fa-star" style="color: #dddcdc;"></i><i class="fas fa-star"
                                        style="color:#dddcdc;"></i><i class="fas fa-star" style="color:#F67F00 ;"></i><i
                                        class="fas fa-star" style="color:#F67F00 ;"></i><i class="fas fa-star"
                                        style="color:#F67F00 ;"></i>
                                </div>
                                <div class="mt-3">
                                    <span
                                        style="  color:#1D2C77; font-weight: bold; font-size: 20px;">{{ $seller_stock->product->orginal_price + $seller_stock->tax }}
                                        EGP</span>
                                    <span style="  color:#817A7A;">(شامل قيمة الضربية)</span>
                                </div>
                                <p class="selling2 p-3"><i style="color:#F67F00; margin-left: 5px;"
                                class="fa-solid fa-truck-fast"></i>إحصل عليها خلال السبت ١٢ م - ٣ م التوصيل المجاني </p> 
                                <p class="selling text-center w-50 p-2 mt-2">{{$seller_stock->quantity}} Stocks</p>
                            </div>
                        </div>

                        <div class="col-12 col-md-2 col-xl-2 mt-5 mb-3">
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel"> اضافة مخزون</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            هل انت متأكد من اضافة مخزون للمنيج
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
                                <button type="button" class="btn second-color main-background  search-product border-20" data-bs-toggle="modal" 
                                data-bs-target="#staticBackdrop" style="background-color: #D62828;color: #fff;    height: 38px !important;width: 100%;">
                                اضافة مخزون   +
                                </button> 

                                <form action="{{ route('seller.stock.update',$seller_stock->id) }}" method="post">
                                {{ method_field('PUT') }}
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
                                                                    placeholder="اضافة الكميه">
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
                                                                        placeholder="اسم المنتج" value="{{$seller_stock->product_id}}" >
                                                                    <span class="error-msg-form">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                        <input   type="hidden" class="form-control" name="seller_stock_id"
                                                                        placeholder="اسم المنتج" value="{{$seller_stock->id}}" >
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
                            </div>
                        </div> 
                        <div class="row mt-5">
                        <div class="col-6">
                            <div class="table-order p-3 div-boxshadow">
                                <h1 class="mb-4 fs-5 fw-bold mt-3">Order </h1>
                               
                                <div class="container">
                                    <div class="row table-head text-center">
                                        
                                        <div class="col-4">
                                        <h5 class="fw-bolder">وقت الطلب</h5>
                                        </div>
                                        <div class="col-4">
                                        <h5 class="fw-bolder">اسم المنتج</h5>
                                        </div>
                                        <div class="col-4">
                                        <h5 class="fw-bolder">التكلفة الكليه</h5>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row text-center">
                                    @foreach($orders as $item)
                                        <div class="col-4">
                                        <h5 class="fw-bolder">{{$item->order->created_at}}</h5>
                                        </div>
                                        <div class="col-4">
                                        <h5>{{$item->product->name_ar}}</h5>
                                        </div>
                                        <div class="col-4">
                                        <h5 class="state"><span>{{$item->order->final_price}}</span></h5>
                                        </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                  
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                                <div class="table-order p-3 div-boxshadow">
                                    <h1 class="mb-4 fs-5 fw-bold mt-3">Supply</h1>
                                
                                        <div class="container">
                                            <div class="row table-head text-center">
                                            <div class="col-6">
                                            <h5 class="fw-bolder">الوقت</h5>
                                            </div>
                                            <div class="col-6">
                                            <h5 class="fw-bolder">الكميه</h5>
                                            </div>
                                        </div>
                                    
                                        <div class="row text-center">
                                            @foreach($supply as $item)
                                                <div class="col-6">
                                                <h5>{{$item->quantity}}</h5>
                                                </div>
                                                <div class="col-6">
                                                <h5>{{$item->created_at}}</h5>
                                                </div>
                                            @endforeach
                                        </div>
                                        <hr>
                                    
                                        
                                    </div>
                                
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>  

    




@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


    

@endsection
