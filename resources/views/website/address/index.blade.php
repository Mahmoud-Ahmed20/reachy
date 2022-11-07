@extends('website/layouts.master_top')

@section('title', 'address')

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



                <div class="col-12 col-xl-9 pt-3 ">
                    <div class="container-fluid">
                        <div class="back-gift">
                            <div class="title-order">
                                <h2>اشترك دلوقتي في الباقة الفضية</h2>
                                <p>وهتوفر لحد 1250 جنيه على مشترياتك</p>
                                <button>تسوق الان</button>
                            </div>
                        </div>
                        <div class="address-div mt-4">
                            <div class="d-flex justify-content-between">
                                <h2 class="fw-bold fs-5"> <i class="fa-solid fa-location-dot"></i> عناويني </h2>
                                <a href="{{ route('client.address.create') }}">
                                    <button class="pt-1 pb-1 add">
                                        إضافه <i class="fa-solid fa-plus"></i>
                                    </button>
                                </a>

                            </div>
                            <div class="row">
                                @foreach ($address as $iteam)
                                    @if (Auth::guard('client')->user()->id == $iteam->client_id)
                                        <div class="col-lg-6 col-md-6  col-sm-12">
                                            <div class="content-address">
                                                <div class="d-flex justify-content-between">

                                                    <h2 class="fs-5 align-items-center d-flex">
                                                        @if ($iteam->favorite_address == 0)
                                                        <a href="{{ route('client.update.favorite',$iteam->id) }}">
                                                            <i class="fa-solid fa-circle-check"></i>
                                                        </a>
                                                        @else
                                                        <i class="fa-solid fa-circle-check  active ms-2"></i>
                                                        @endif

                                                        {{ $iteam->name_street }}
                                                    </h2>
                                                    <div>
                                                        <a class="delete-conf" style="color: #D62828;cursor: pointer;" title="delete"
                                                            data-effect="effect-scale" data-addres_id="{{ $iteam->id }}"
                                                            data-bs-toggle="modal" data-bs-target="#delete1">
                                                            <i class="fa-solid fa-trash-can color-i2 ms-1"></i>حذف
                                                        </a>
                                                        <a href="{{ route('client.address.edit', $iteam->id) }}"> <i
                                                                class="fa-solid fa-pen-to-square color-i1 ms-1"></i>
                                                            تعديل
                                                        </a>
                                                        <div class="modal fade" id="delete1" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div
                                                                class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
                                                                <div class="modal-content b-r-s-cont border-0">

                                                                    <div class="modal-header">
                                                                        <div class="modal-title" id="exampleModalLabel"><i
                                                                                class="fas fa-trash me-1"></i>
                                                                            حذف العنوان </div>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>

                                                                    <form
                                                                        action="{{ route('client.address.destroy', $iteam->id) }}"
                                                                        method="post">
                                                                        {{ method_field('delete') }}
                                                                        {{ csrf_field() }}

                                                                        <!-- Modal content -->
                                                                        <div class="modal-body px-4">

                                                                            <div class="modal-body  text-center py-0">
                                                                                <p class="mb-0">هل انت متاكد من حذف هذا
                                                                                    العنوان</p><br>
                                                                                <input type="hidden" name="addres_id"
                                                                                    value="{{ $iteam->id }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <div class="left-side">
                                                                                <button type="button" class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">خروج </button>
                                                                            </div>
                                                                            <div class="divider"></div>
                                                                            <div class="right-side">
                                                                                <button type="submit"
                                                                                    class="btn btn-danger ">حذف
                                                                                </button>
                                                                            </div>

                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h6>{{ $iteam->country->name_ar . ' . ' . $iteam->city->name_ar . ' . ' . $iteam->region->name_ar }}
                                                </h6>
                                                <div class="d-flex justify-content-between">
                                                    <p>
                                                        {{ $iteam->address_details }}
                                                    </p>
                                                    <a class="phone" href="#"> {{ $iteam->phone }} <i
                                                            class="fa-solid fa-phone me-2"></i></a>
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
        </div>
    </section>



@endsection


<!-- js insert -->
@section('js')
    <script>
        $('.delete-conf').click(function(event) {
            var addres_id = $(this).data("addres_id");
            console.log(addres_id);
            var modal = $('.delete-conf-input [name="addres_id"]')
            modal.val(addres_id);

        })
    </script>
@endsection
