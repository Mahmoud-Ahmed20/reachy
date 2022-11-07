<div class="modal fade p-5" id="exampleModalLg" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content back-pop1 p-4">
            <div class="modal-header">
                <button type="button" class="btn-close float-start" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="float-start content-form text-center w-50">
                    <form action="">
                        <div class="row">
                            <h1 class="fs-5">اشترك دلوقتي</h1>
                            <p>عشان يجيلك كل العروض الجديدة</p>
                            <div class="col-12">
                                <input type="text" class="" placeholder="البريد الالكتروني">
                            </div>
                            <div class="col-12">
                                <input type="text" class="" placeholder="رقم الموبايل">
                            </div>

                            <button class="w-75 m-auto mt-2 p-1 pop-btn">اشترك</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<button class="btn Position-fixed top-50 offer" type="button" data-bs-toggle="offcanvas"
    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    <i class="fa-solid fa-chevron-right p-1 text-white"></i>
</button>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="display: block;">

    <div class="offcanvas-body d-flex align-items-center flex-column">
        <button class=" btn Position-fixed top-50 offer-inside" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="fa-solid fa-chevron-right pt-1 pb-1"></i>
        </button>
        @foreach ($subscurpition as $item)
            <div class="package d-flex align-items-center p-4 flex-column" >
                <div class="package-card d-flex align-items-center">
                    <img src="image/Mask Group 10.png" alt="" class="package-photo" />
                    <div class="package-title">
                        <h4 class="mt-4 fs-6 "> {{ $item->name_ar }}</h4>
                        <span class="fs-7 fw-light text-secondary"><span class="fs-6">{{ $item->amount_money }}
                                EGP</span> / اسبوع</span>
                    </div>
                </div>
                <div class="btn-cards d-flex just-content-between mt-3">
                    <a type="button" href="#" class="btn bt-news ms-3 fw-bold">اشترك</a>
                    <a type="button" class="btn bt-detail fw-bold"
                        href="{{ route('client.subscriptionWebsite.show', $item->slug_en) }}">تفاصيل
                        الباقه</a>
                </div>
            </div>
        @endforeach


    </div>
</div>
