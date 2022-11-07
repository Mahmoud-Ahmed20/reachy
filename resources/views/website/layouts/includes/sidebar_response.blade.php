<div class="nav-loyalty">
          <nav class="navbar bg-light">
              <div class="container-fluid">
             
                  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="pro-info p-5  m-auto">
                
                    <div class="profile-title d-flex ">
            <div>
                <img src="{{ URL::asset('img/useravatar/' . Auth::guard('seller')->user()->avatar) }}"
                    class="rounded-circle"  title="" />
            </div>
            <div class="mt-3 me-3">
                <h1 class="fw-bold">
                    {{ Auth::guard('seller')->user()->first_name . ' ' . Auth::guard('seller')->user()->second_name }}
                </h1>
                <div class="d-flex justify-content-center ">
                    <h6 class="">تاجر</h6>
                </div>
            </div>
        </div>
        <div class="mt-3">
          <p style="font-size:15px; font-weight: bold;" class="text-center">رصيدك الحالي</p>
          <h2 style="color:#D62828; font-weight: bold;" class="text-center">550 EGP</h2>
        </div>
        <div class="">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <li style="color:#3E4763 ;">
                    <a class="fw-bold" style="color:#3E4763;" href="{{  route('seller.edit_profile_seller')  }}">
                        <i style="color:#3E4763 ;" class="fa-solid fa-user"></i>
                        <a class=" fw-bold" style="color:#3E4763 ;" href="{{ route('seller.seller_dashboard') }}">الملف الشخصى</a>

                        <span style="color:#D62828;">
                         <a href="{{route('seller.edit_profile_seller')}}">
                        <i style="color:#D62828;" class="fa-solid fa-pen-to-square">   تعديل </i>
                        </a>
                        </span>
                    </a>
                </li>

              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  <i class="fa-solid fa-box-open"></i> المنتجات
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <ul class="options">
                   
                    <li class="form-check">
                        <a href="{{ route('seller.show_all_product') }}" class="form-check-label fs-7  float-end" for="flexCheckDefault">
                          الكل المنتجات
                        </a>
                      </li>
                    <li class="form-check">
                      <a href="{{ route('seller.show_all_request_product') }}" class="form-check-label fs-7  float-end" for="flexCheckDefault">
                        المنتجات المطالب اضافتها
                      </a>
                    </li>

                  </ul>
                </div>

              </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseT" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fa-solid fa-cart-plus"></i>  تخزين منتج
                  </button>
                </h2>
                <div id="collapseT" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <ul class="options">
                    <li class="form-check">
                        <a href="{{ route('seller.search_product') }}" class="fs-7 float-end">اضافة منتج</a>
                    </li>
                      <!-- <li class="form-check">

                            <a href="{{ route('seller.stock.create') }}" class="fs-7 float-end">تخزين منتج</a>

                      </li> -->

                    </ul>
                  </div>
                </div>
              </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <i class="fa-solid fa-cart-plus"></i>    الطلبات
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <ul class="options">
                    <li class="form-check">
                        <a href="{{ route('seller.orders') }}" class="fs-7 float-end" for="flexCheckDefault">
                              الطلبات الحالية
                        </a>
                    </li>
                    <li class="form-check">
                      <a href="{{ route('seller.orders.done') }}" class="fs-7 float-end" for="flexCheckDefault">
                          الطلبات السابقة
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>



            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  <i class="fa-solid fa-wallet"></i>  المحفظة
                </button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <ul class="options">
                      <li class="form-check">
                        <a href="" class="fs-7 float-end" for="flexCheckDefault">
                            المحفظة
                        </a>
                      </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <a style="color:#D62828; margin-top: 50px !important;" class="fw-bold"  href="{{ route('seller.logoutseller') }}"
                onclick="event.preventDefault();
            document.getElementById('logout-form-seller').submit();">
                تسجيل الخروج<i style="color:#D62828;" class="fa-solid fa-right-to-bracket float-start"></i>

            </a>
            <form id="logout-form-seller" action="{{ route('seller.logoutseller') }}" method="POST"
                class="d-none">
                @csrf
            </form>
        </div>
                     
                  </div>
                  </div>
              </div>
          </nav>
</div>

