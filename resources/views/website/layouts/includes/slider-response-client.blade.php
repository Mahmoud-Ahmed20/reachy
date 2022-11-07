<!-- <div class="nav-loyalty">
    <nav class="navbar bg-light">
        <div class="container-fluid">
           
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="pro-info p-5  m-auto">
                    <div class="profile-title d-flex ">
                        <div>
                            <img class="rounded-circle"
                                src="{{ asset('img/useravatar/' . Auth::guard('client')->user()->avatar) }}"
                                alt="">
                        </div>
                        <div class="mt-3 me-3">
                            <h1 class="fw-bold">
                                {{ Auth::guard('client')->user()->first_name . ' ' . Auth::guard('client')->user()->second_name }}
                            </h1>
                            <div class="d-flex d-sm-grid justify-content-center ">
                                <h6 class="">عميل</h6>
                                <p class="name-package me-3 " style="margin-right: 2px !important;"> <img
                                        src="img/Group 2273.svg" class="ms-2" alt=""> الباقة الفضية</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p style="font-size:15px; font-weight: bold;" class="text-center">رصيدك الحالي</p>
                        <h2 style="color:#D62829; font-weight: bold;" class="text-center">550 EGP</h2>
                    </div>
                    <div class="me-3">
                        <ul>
                            <li style="color:#3E4763 ;"><a style="color:#3E4763;"
                                    href="{{ route('client.edit_profile') }}"><i style="color:#3E4763 ;"
                                        class="fa-solid fa-user"></i>الملف الشخصي <span style="color:#D62829;"> <i
                                            style="color:#D62829;"class="fa-solid fa-pen-to-square"></i> تعديل
                                    </span></a></li>
                            <li><a href="{{ route('client.current_requests') }}"><i
                                        class="fa-solid fa-cart-plus"></i>طلباتي الحالية </a></li>
                            <li><a href="{{ route('client.my_previous_orders') }}"><i
                                        class="fa-solid fa-cart-plus"></i>طلباتي السابقة </a></li>
                            <li><a href="{{ route('client.address.index') }}"><i
                                        class="fa-solid fa-location-dot"></i>عناويني </a></li>
                            <li><a href="{{ route('client.subscriptionWebsite.index') }}"><i
                                        class="fa-solid fa-credit-card"></i>اشتراكاتى </a></li>
                            <li><a href=""><i class="fa-solid fa-wallet"></i>المحفظة</a></li>
                            <li><a href=""><i class="fa-solid fa-gift"></i>برنامج الولاء <span
                                        style="color:#D62829;">150 نقطة</span></a></li>
                            <li style="color:#D62829;"><a style="color:#D62829;" href="{{ route('client.logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i
                                        style="color:#D62829;"
                                        class="fa-solid fa-arrow-right-from-bracket mt-10"></i>تسجيل الخروج</a>

                                <form id="logout-form" action="{{ route('client.logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div> -->



<div class="nav-loyalty">
		<nav class="navbar bg-light">
			<div class="container-fluid">
				<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
				  <div class="pro-info p-5  m-auto">
					<div class="profile-title d-flex ">
						<div>
						<img class="rounded-circle " style="height:80px;"
                                src="{{ asset('img/useravatar/' . Auth::guard('client')->user()->avatar) }}"
                                alt="">
						</div>
						<div class="mt-3 me-3">
						  <h1 class="fw-bold">   {{ Auth::guard('client')->user()->first_name . ' ' . Auth::guard('client')->user()->second_name }}</h1>
						  <div class="d-flex justify-content-center ">
							<h6 class="">عميل</h6> 
                            <p class="name-package me-3 " style="margin-right: 2px !important;"> <img
                                        src="img/Group 2273.svg" class="ms-2" alt=""> الباقة الفضية</p>
						  </div>
						</div>
					</div>
					<div class="mt-3">
					  <p style="font-size:15px; font-weight: bold;" class="text-center">رصيدك الحالي</p>
					  <h2 style="color:#D62828; font-weight: bold;" class="text-center">550 EGP</h2>
					</div>
					<div class="me-3">
                    <ul>
                            <li style="color:#3E4763 ;"><a style="color:#3E4763;"
                                    href="{{ route('client.edit_profile') }}"><i style="color:#3E4763 ;"
                                        class="fa-solid fa-user"></i>الملف الشخصي <span style="color:#D62829;"> <i
                                            style="color:#D62829;"class="fa-solid fa-pen-to-square"></i> تعديل
                                    </span></a></li>
                            <li><a href="{{ route('client.current_requests') }}"><i
                                        class="fa-solid fa-cart-plus"></i>طلباتي الحالية </a></li>
                            <li><a href="{{ route('client.my_previous_orders') }}"><i
                                        class="fa-solid fa-cart-plus"></i>طلباتي السابقة </a></li>
                            <li><a href="{{ route('client.address.index') }}"><i
                                        class="fa-solid fa-location-dot"></i>عناويني </a></li>
                            <li><a href="{{ route('client.subscriptionWebsite.index') }}"><i
                                        class="fa-solid fa-credit-card"></i>اشتراكاتى </a></li>
                            <li><a href=""><i class="fa-solid fa-wallet"></i>المحفظة</a></li>
                            <li><a href=""><i class="fa-solid fa-gift"></i>برنامج الولاء <span
                                        style="color:#D62829;">150 نقطة</span></a></li>
                            <li style="color:#D62829;"><a style="color:#D62829;" href="{{ route('client.logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i
                                        style="color:#D62829;"
                                        class="fa-solid fa-arrow-right-from-bracket mt-10"></i>تسجيل الخروج</a>

                                <form id="logout-form" action="{{ route('client.logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>

                            </li>

                        </ul>
					</div>
				</div>
				</div>
			</div>
		</nav>
	</div>