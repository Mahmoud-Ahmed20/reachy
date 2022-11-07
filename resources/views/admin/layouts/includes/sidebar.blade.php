<!-- Sidebar -->
<ul class="sidebar navbar-nav accordion shadow" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <i class="bi bi-skip-backward-circle-fill"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Proximo <sup>v3.0</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('sett.dashboard_admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
        </a>
    </li>
    @role('Data-entry|Delivery|')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('sett.edit_profile_user') }}">
            <i class="far fa-user"></i>
            <span>{{ __('My Profile') }}</span></a>
        </a>
    </li>
@endrole
    <!-- Nav Item - Utilities Collapse Menu -->
    @role('Super-admin')
        <li class="nav-item">
            <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="bi bi-calendar-range"></i>
                <span>{{ __('Admin') }}</span>
            </a>
            <div id="collapseUtilities" class="collapse collapse-side-admin" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner">
                    <h6 class="collapse-header">Create Admin:</h6>
                    <a class="collapse-item" href="{{ route('sett.search.admin') }}">{{ __('Search') }}</a>
                    <a class="collapse-item" href="{{ url('prox/admin') }}">{{ __('Admin') }}</a>
                    <a class="collapse-item" href="{{ route('sett.edit_profile_user') }}">{{ __('My Profile') }}</a>

                </div>
            </div>
        </li>
    @endrole
    @role('Super-admin')
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#ordre"
            aria-expanded="false" aria-controls="collapseTwo">
            <i class="fas fa-truck-loading"></i>
            <span>{{ __('ordre') }}</span>
        </a>
        <div id="ordre" class="collapse collapse-side-admin" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner">
                <h6 class="collapse-header">Order:</h6>
                <a class="collapse-item" href="{{ route('sett.order.search') }}">{{ __('Search') }}</a>
                <a class="collapse-item" href="{{ route('sett.status_inprogress') }}">{{ __('In Progress') }}</a>
                <a class="collapse-item" href="{{ route('sett.out_for_delivery') }}">{{ __('Out for delivery') }}</a>
                <a class="collapse-item" href="{{ route('sett.deliverd') }}">{{ __('Deliverd') }}</a>
            </div>
        </div>
    </li>
    @endrole
    @role('Super-admin')
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#pulses"
            aria-expanded="false" aria-controls="collapseTwo">
            <i class="far fa-address-card"></i>
                        <span>{{ __('Seller') }}</span>
        </a>
        <div id="pulses" class="collapse collapse-side-admin" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner">
                <h6 class="collapse-header">Create Seller:</h6>
                <a class="collapse-item" href="{{ route('sett.search.seller') }}">{{ __('Search') }}</a>
                <a class="collapse-item" href="{{ route('sett.admin.seller.index') }}">{{ __('Seller') }}</a>

                @role('Super-admin')
                    <a class="collapse-item" href="{{ route('sett.create.seller') }}">{{ __('Create Seller') }}</a>
                @endrole
            </div>
        </div>
    </li>
    @endrole
    @role('Super-admin|Delivery')
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#delivery"
            aria-expanded="false" aria-controls="collapseTwo">
            <i class="fas fa-truck"></i>
             <span>{{ __('Delivery') }}</span>
        </a>
        <div id="delivery" class="collapse collapse-side-admin" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner">
                <h6 class="collapse-header">Ordrers:</h6>
                    <a class="collapse-item" href="{{ route('sett.delivery.index') }}">{{ __('Orders') }}</a>
                    <a class="collapse-item" href="{{ route('sett.dlevery.recive.refund') }}">{{ __('Dlevery Recive Refund') }}</a>
                    <a class="collapse-item" href="{{ route('sett.done.order') }}">{{ __('Done Order') }}</a>
            </div>
        </div>
    </li>
    @endrole
    @role('Super-admin|Moderator')
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapsePageslab"
            aria-expanded="true" aria-controls="collapsePages" data-toggle="collapse" data-target=".navbar-collapse">
            <i class="fas fa-users"></i>
            <span>{{ __('Client') }}</span>
        </a>
        <div id="collapsePageslab" class="collapse collapse-side-admin" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item"
                    href="{{ route('sett.search.buyre') }}">{{ __('Search') }}</a>
                <a class="collapse-item"
                    href="{{ route('sett.show.all.client') }}">{{ __('Smart.Search.Clinte') }}</a>
                <a class="collapse-item" href="{{ route('sett.buyre.index') }}">{{ __('Clients') }}</a>
            </div>
        </div>
    </li>
    @endrole

    @role('Super-admin|Moderator')
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#Subscription"
            aria-expanded="false" aria-controls="collapseTwo">
            <i class="fab fa-cc-visa"></i>            <span>{{ __('Subscription') }}</span>
        </a>
        <div id="Subscription" class="collapse collapse-side-admin" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner">
                <h6 class="collapse-header">Create Subscription:</h6>
                {{-- <a class="collapse-item" href="{{ route('sett.admin.seller.index') }}">{{ __('Subscription') }}</a> --}}

                @role('Super-admin')
                    <a class="collapse-item"
                        href="{{ route('sett.subscription.index') }}">{{ __('Create Subscription') }}</a>
                @endrole
            </div>
        </div>
    </li>
    @endrole



    @role('Super-admin|Station|Moderator')
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#station"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-charging-station"></i>
            <span>Stations</span>
        </a>
        <div id="station" class="collapse collapse-side-admin" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner">
                <h6 class="collapse-header">Stations:</h6>
                <a class="collapse-item" href="{{ route('sett.show_all_orders') }}">Smart Search </a>
                <a class="collapse-item" href="{{ route('sett.stations.index') }}">Stations </a>
            </div>
        </div>
    </li>
    @endrole

    @role('Super-admin|Data-entry')
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Locations"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-map-marker-alt"></i>
            <span>Location</span>
        </a>
        <div id="Locations" class="collapse collapse-side-admin" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner">
                <h6 class="collapse-header">Locations:</h6>
                <a class="collapse-item" href="{{ route('sett.countries.index') }}">Countries </a>
                <a class="collapse-item" href="{{ route('sett.city.index') }}">City</a>
                <a class="collapse-item" href="{{ route('sett.region.index') }}">Region</a>
            </div>
        </div>
    </li>
    @endrole
    @role('Super-admin|Data-entry')
    <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Categorys"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-th-large"></i>
                <span>Categorys</span>
            </a>
            <div id="Categorys" class="collapse collapse-side-admin" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner">
                    <h6 class="collapse-header">Locations:</h6>
                    <a class="collapse-item" href="{{ route('sett.mainCategory.index') }}"> Main Category </a>
                    <a class="collapse-item" href="{{ route('sett.subCategory.index') }}">Sub Category</a>
                    <a class="collapse-item" href="{{ route('sett.subsubCategory.index') }}">Sub Sub Category</a>
                </div>
            </div>
        </li>
    @endrole

    @role('Super-admin|Data-entry')
    <hr class="sidebar-divider">
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#products"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-box-open"></i>
                <span>products</span>
            </a>
            <div id="products" class="collapse collapse-side-admin" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner">
                    <h6 class="collapse-header">products:</h6>
                    <a class="collapse-item" href="{{ route('sett.search.product') }}">search</a>
                    <a class="collapse-item" href="{{ route('sett.brand.index') }}">brands</a>
                    <a class="collapse-item" href="{{ route('sett.brand.index') }}">boxes</a>
                    <a class="collapse-item" href="{{ route('sett.product.index') }}">products</a>
                </div>
            </div>
        </li>
    @endrole
    @role('Super-admin|Data-entry|Station')
    <hr class="sidebar-divider">
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#boxes"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-box-open"></i>
                <span>Boxes</span>
            </a>
            <div id="boxes" class="collapse collapse-side-admin" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner">
                    <h6 class="collapse-header">Boxes:</h6>

                </div>
            </div>
        </li>
    @endrole
    @role('Super-admin')
    <hr class="sidebar-divider">
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#settings"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-cog"></i>
                <span>settings</span>
            </a>
            <div id="settings" class="collapse collapse-side-admin" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner">
                    <h6 class="collapse-header">settings:</h6>
                    <a class="collapse-item" href="{{ route('sett.slider.index') }}">{{ __('Slider') }}</a>
                    <a class="collapse-item" href="{{ route('sett.slider.index') }}">{{ __('settings') }}</a>
                </div>
            </div>
        </li>
    @endrole

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
