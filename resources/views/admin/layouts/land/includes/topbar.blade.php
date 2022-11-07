<div class="px-2 px-md-5 position-relative">
    <div class="container pb-2">
        <nav class="navbar navbar-expand-lg navbar-light pt-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('landing') }}"> <img
                        src="{{ URL::asset('img/dashboard/system/pc-loader.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ms-5 justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 me-2">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('landing') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('patient_auth.about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/paincure/index.php/blog">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('patient_auth.blogs') }}">Videos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('patient_auth.appointment') }}">Appointment</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('patient_auth.contact') }}">
                                Contact
                            </a>
                        </li>
                    </ul>

                    @auth('patient')
                        <!-- Nav Item - User Information -->
                        <div class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle d-flex" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle avatar-small2"
                                    src="{{ URL::asset('img/useravatar/' . Auth::guard('patient')->user()->avatar) }}">
                                <div class="ms-2 my-auto">
                                    <span class="text-gray-300 mb-0">Welcome</span>
                                    <h6 class="text-gray-600 mb-0">{{ Auth::guard('patient')->user()->first_name }}</h6>
                                </div>
                            </a>
                            <!-- Dropdown - User Information -->

                            <div class="dropdown-list-profile border-0 dropdown-menu dropdown-menu-right shadow animated--grow-in py-0"
                                aria-labelledby="userDropdown" style="width: min-content;">
                                <div class="dropdown-header bg-primary p-3 px-4"
                                    style="background-color: #26a299 !important; ">
                                    <div class="d-flex wd-100p">
                                        <div class="main-img-user">
                                            <img class="img-profile rounded-circle avatar-m" alt=""
                                                src="{{ URL::asset('img/useravatar/' . Auth::guard('patient')->user()->avatar) }}"
                                                class="">
                                        </div>
                                        <div class="ms-3 my-auto">
                                            <h6 class="text-white fw-normal">
                                                {{ Auth::guard('patient')->user()->first_name }}
                                            </h6>
                                            <span class="" style="color: #b0dfdb !important;">Patient
                                                Member</span>
                                        </div>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="{{ route('patient_auth.profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
                                    Medical Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('patient_auth.appointment') }}">
                                    <i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>
                                    Edit Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('patient_auth.appointment') }}">
                                    <i class="bi bi-calendar-week-fill fa-sm fa-fw me-2 text-gray-400"></i>
                                    Appointment
                                </a>
                                <a class="dropdown-item mb-2 border-bottom-0 " href="{{ route('patient_auth.logout') }}"
                                    onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('patient_auth.logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endauth

                    @guest('patient')
                        <a class="text-s mb-0" href="{{ route('patient_auth.login') }}"><button type="button"
                                class="btn text-green-ligh-bg-grad b-r-xs text-white"><i class="fas fa-user me-1"></i> Login
                                | Register</button></a>
                    @endguest

                </div>
            </div>
        </nav>
    </div>
</div>
