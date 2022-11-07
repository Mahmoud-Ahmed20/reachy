@extends('website.layouts.master_top_2')

@section('title', 'Profile')

<!-- css insert -->
@section('css')

@endsection

<!-- content insert -->
@section('content')


    <!-- contente -->
    <section>
        <div class="container-fluid">
            <div class="row">
                @include('website.layouts.includes.sidebar_2')

                <div class="col-12 col-xl-9 box-shadow pt-4 p-3">
                    <div class="back-gift-filter">
                        <div class="title-order-2 pt-5 pe-5">
                            <h2>اشترك دلوقتي في الباقة الفضية</h2>
                            <p>وهتوفر لحد 1250 جنيه على مشترياتك</p>
                            <button class="btns">تسوق الان</button>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-2 mt-4 ">
                        <h3 class="fw-bold fs-5">المنتجات المفضلة</h3>
                    </div>
                    <div class="over1">
                        <div class="row">

                            @foreach ($WashList as $item)
                                @if ($item->client_id == Auth::guard('client')->user()->id)
                                    <div class="col-xxl-3 col-xl-4 col-md-4 col-sm-6">
                                        <div class="product-swiper">
                                            <span class="p-2">وفر 15 ج</span>
                                            <div class="product-image">
                                                <img src="{{ asset('img/products/' . $item->Product->cover_image) }}"
                                                    alt="">
                                            </div>
                                            <p>لبن</p>
                                            <h2>{{ $item->Product->name_ar }}</h2>
                                            <div class="mt-2">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star-half-stroke"></i> (4.0)
                                            </div>
                                            <h5 class="mt-2">By NestFood</h5>
                                            <div class="mt-2 d-flex justify-content-between">
                                                <div class="pt-2">
                                                    <p class="price">{{ $item->orginal_price }}EGP</p>
                                                    {{-- <p class="dis-count">5.00 EGP</p> --}}
                                                </div>
                                                <div>
                                                    @if ($item->product_id == $item->Product->id)
                                                        <button class="ms-2 btn-save wishlist-delete"
                                                            data-wishlist_id="{{ $item->id }}"><i
                                                                class="fa-solid fa-bookmark"></i></button>
                                                    @endif
                                                    {{-- <button class="ms-2 btn-save"><i
                                                            class="fa-regular fa-bookmark"></i></button> --}}
                                                    <button class="p-2 add-cart" type="button">أضف <i
                                                            class="fa-solid fa-cart-shopping"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach






                        </div>
                    </div>
                </div>



            </div>

        </div>
        </div>
    </section>



@endsection


<!-- js insert -->
@section('js')
    <script>
        $('document').ready(function() {
            $(".wishlist-delete").click(function() {

                var id = $(this).data("wishlist_id");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var url = "{{ route('client.wash-lists.destroy', 'id') }}";
                url = url.replace('id', id);

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "_method": 'DELETE',
                    },
                    success: function(data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endsection
