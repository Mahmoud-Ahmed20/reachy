@extends('website.layouts.master_top')

@section('title', 'طلباتي السابقة')

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

                <div class="col-12 col-xl-9">
                    <div class="back-gift p-3">
                        <div class="title-order">
                            <h2>اشترك دلوقتي في الباقة الفضية</h2>
                            <p>وهتوفر لحد 1250 جنيه على مشترياتك</p>
                            <button>تسوق الان</button>
                        </div>
                    </div>
                    <div class="table-order p-3 div-boxshadow">
                        <h1 class="mb-4 fs-5 fw-bold mt-3">طلباتي الحالية</h1>
                        <div class="container">
                            <div class="row table-head text-center">
                                <div class="col-2">
                                    <h5 class="fw-bolder">رقم الطلب</h5>
                                </div>
                                <div class="col-2">
                                    <h5 class="fw-bolder">التاريخ</h5>
                                </div>
                                <div class="col-2">
                                    <h5 class="fw-bolder">حاله الطلب</h5>
                                </div>
                                <div class="col-3">
                                    <h5 class="fw-bolder">التكلفة الكليه</h5>
                                </div>
                                {{-- <div class="col-3">
                                    <h5 class="fw-bolder">التفاصيل</h5>
                                </div> --}}
                            </div>
                            <hr>
                            @foreach ($orders as $item)
                                <div class="row text-center">
                                    <div class="col-2">
                                        <h5 class="fw-bolder">{{ $item->code }}</h5>
                                    </div>
                                    <div class="col-2">
                                        <h5>{{ $item->created_at }}</h5>
                                    </div>
                                    <div class="col-2">
                                        <h5 class="state"><span> تم التسليم</span></h5>
                                    </div>
                                    <div class="col-3">
                                        <h5>{{ $item->final_price }}</h5>
                                    </div>
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <a class="detail-icon" href="{{ route('client.details_order', $item->code) }}">
                                            <i class="fa-solid fa-eye-slash" style="font-size: 12px"></i>
                                            التفاصيل
                                        </a>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                            {!! $orders->links('pagination::bootstrap-5') !!}

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
