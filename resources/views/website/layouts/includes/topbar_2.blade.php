    <div class="man-pare">
        <p> خصومات تصل الى 40% بمناسبة عيد الأضحى المبارك يلا استقبل العروض دلوقتي </p>
    </div>


	<nav class="navbar header-navbar navbar-expand-lg navbar-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="#"><img src="{{asset('image/logo.png')}}" alt=""></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<div class="dropdown me-5 packages "> <a class="btn btn-packages dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
             الباقات
          </a>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                     
					</ul>
				</div>
        <ul class="navbar-nav me-auto icon-madya mb-2 mb-lg-0 ms-5">
					<li class="nav-item icon"> <a href="{{ route('client.creat.order') }}"><i class="fa-solid fa-cart-shopping"></i></a> <span>0</span> </li>
					<li class="nav-item "> <a href=""><i class="fa-solid fa-user"></i></a> </li>
					<li class="nav-item icon"> <a href=""><i class="fa-solid fa-heart"></i></a> <span>0</span> </li>
				</ul>
				<form class="d-flex m-auto form-search" action="{{ route('products.resultsearch') }}" method="post">
                @csrf
                <input class="form-control  search" type="search" name="search" placeholder="بحث"
                        aria-label="Search" id="search" autocomplete="off">
					<button class="btn btn-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
					<div id="search-eng-show-list" class="search-eng-results position-absolute d-flex  list-group  bg-white b-r-l-b-cont text-start" style=" z-index:9999; display: none !important; 					z-index: 9;
					width: 396px;
				
					top: 78px;">
					
					</div>
				</form> 
                @if (!empty(Auth::guard('client')->check()))
                    <div class="profile-nav d-flex justify-content-end align-items-center">
                        <div class="ms-2 text-center">
                            <div class="dropdown mt-3 fs-7" dir="ltr">
                                <button class=" dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Hi ,
                                    {{ Auth::guard('client')->user()->first_name }}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item fs-7" href="{{ route('client.edit_profile') }}">تعديل
                                            الملف
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item color-text fs-7" href="{{ route('client.logout') }}"
                                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                            تسجيل الخروج
                                            <i class="fa-solid fa-arrow-right-from-bracket"></i>

                                        </a>
                                        <form id="logout-form" action="{{ route('client.logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <p class="text-grey fs-7 me-2"> {{ Auth::guard('client')->user()->phone }}</p>
                        </div>
                        <a href="{{ route('client.edit_profile') }}">
                            <img class="img-profile rounded-circle avatar-m-2"
                                src="{{ asset('img/useravatar/' . Auth::guard('client')->user()->avatar) }}"
                                alt="">
                        </a>
                    </div>
                @elseif (Auth::guard('seller')->check())
                    <div class="profile-nav d-flex justify-content-end align-items-center">
                        <div class="ms-2 text-center">
                            <div class="dropdown mt-3 fs-7" dir="ltr">
                                <button class=" dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Hi ,
                                    {{ Auth::guard('seller')->user()->first_name }}
                                </button>
                                <ul class="dropdown-menu">
                                    @if (Auth::guard('seller')->user()->inactive == 0)
                                        <li><a class="dropdown-item fs-7"
                                                href="{{ route('seller.edit_profile_seller') }}">الملف الشخصى

                                            </a>
                                        </li>
                                    @elseif (Auth::guard('seller')->user()->inactive == 1)
                                        <li><a class="dropdown-item fs-7"
                                                href="{{ route('seller.activeSeller') }}">الملف الشخصى

                                            </a>
                                        </li>
                                    @endif

                                    <li>
                                        <a class="dropdown-item color-text fs-7"
                                            href="{{ route('seller.logoutseller') }}"
                                            onclick="event.preventDefault();
                                    document.getElementById('logout-form-seller').submit();">
                                            تسجيل الخروج
                                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                        </a>
                                        <form id="logout-form-seller" action="{{ route('seller.logoutseller') }}"
                                            method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <p class="text-grey fs-7 me-2"> {{ Auth::guard('seller')->user()->phone }}</p>
                        </div>
                        <a href="{{ route('client.profile') }}">
                            <img class="img-profile rounded-circle avatar-m-2"
                                src="{{ asset('img/useravatar/' . Auth::guard('seller')->user()->avatar) }}"
                                alt="">
                        </a>
                    </div>
                    @else
                    <a class="btn  border main-color btn-login" data-bs-toggle="modal" href="#exampleModalToggle" role="button">
تسجيل الدخول</a>
<a class="  me-3  second-color btn-register" data-bs-toggle="modal" href="#exampleModalToggle2" role="button"
    style="background-color: #D62828;
    color: white !important;
  "> إنشاء حساب</a>
                @endif

		</div>
		</div>
        
  
	</nav>
    @include('website.auth.register')
    @include('website.auth.login')

    <script>
        $(document).ready(function() {

            //--------------------- fetch appoingtments -------------------

            //rate insert
            $(document).on('keyup', '#search-eng', function() {

                var patient_username = $(this).val();


                url = url.replace(':id', patient_username);

                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        '_method': "PATCH",
                        'status': 4,
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            $("#successful_msg").html(' ').show();
                            $("#successful_msg").html(
                                '<div class="flash-msg shadow pt-3 text-center" style="background-color: #20cd7d;">' +
                                '<div class="mb-2">' +
                                '<i class="far fa-smile-beam text-xl"></i>' +
                                '</div>' +
                                '<h3>Welcome ' + data.name + '!</h3>' +
                                '<p style="color:#cfffe4">Happy to see you again</p>' +
                                '</div>').delay(5000).fadeOut()
                            $("#search-eng").val('');
                        } else {
                            $("#successful_msg").html(' ').show();
                            $("#successful_msg").html(
                                '<div class="flash-msg shadow pt-3 text-center" style="background-color:#ff4152;">' +
                                '<div class="mb-2 text-center">' +
                                '<i class="text-center far fa-frown text-xl"></i>' +
                                '</div>' +
                                '<h3>Sorry, it is invalid QR or date</h3>' +
                                '<p style="color:#ffb4bc">Please try again</p>' +
                                '</div>').delay(5000).fadeOut()
                            $("#search-eng").val('');
                        }
                    }
                });

            });

            $(document).on('click', ".patient_lead_history", function() {

                $('.modal').modal('hide');
                $('#add_notes').modal('show');

            })

        });
    </script>
