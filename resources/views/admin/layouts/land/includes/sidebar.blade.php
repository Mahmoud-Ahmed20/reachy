<!-- Sidebar -->
<ul class="sidebar navbar-nav accordion shadow" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <i class="bi bi-skip-backward-circle-fill"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Proximo <sup>v1</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href={{ route('sett.home') }}>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('sett.patient.index') }}" data-bs-toggle="collapse"
            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Patients</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner">
                <a class="collapse-item" href="{{ route('sett.patient.index') }}">Search</a>
                <a class="collapse-item" href="{{ route('sett.patient.create') }}">Create</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('sett.appointment.index') }}" data-bs-toggle="collapse"
            data-bs-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Appointments</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="{{ route('sett.appointment.index') }}">Search</a>
                <a class="collapse-item" href="{{ route('sett.appointment.create') }}">Create</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('sett.lab.index') }}" data-bs-toggle="collapse"
            data-bs-target="#collapsePageslab" aria-expanded="true" aria-controls="collapsePages" data-toggle="collapse"
            data-target=".navbar-collapse">
            <i class="fas fa-fw fa-folder"></i>
            <span>Lab</span>
        </a>
        <div id="collapsePageslab" class="collapse" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="{{ route('sett.lab.index') }}">Search</a>
                <a class="collapse-item" href="{{ route('sett.lab.create') }}">Create</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('sett.admin.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Workers</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('sett.lab.index') }}" data-bs-toggle="collapse"
            data-bs-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages" data-toggle="collapse"
            data-target=".navbar-collapse">
            <i class="fas fa-fw fa-table"></i>
            <span>Accounting</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="{{ route('sett.invoice.index') }}">Search</a>
                <a class="collapse-item" href="{{ route('sett.invoice.create') }}">Create</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#settings" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Branch</span>
        </a>
        <div id="settings" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="{{ route('sett.app_arrived_patient_qr') 
                <div class="collapse-divider"></div>
            </div>
        </div>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
