<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Proxima for medical management">
    <meta name="Author" content="Proxima | medical management">
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('img/dashboard/system/favicon.png') }}">
    <!-- Head and css files -->
    @include('admin/layouts.includes.head')
</head>

<body>


    <!-- Page Loader -->
    <div class="loader-page justify-content-center align-items-center">
        <div class="loader-page-cont">
            <img src="{{ URL::asset('img/dashboard/system/loader.svg') }}" alt="">
            <div class="lds-ellipsis">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <!-- fixed content -->
    @yield('fixedcontent')


    <!-- Page Wrapper -->
    <div id="wrapper" class="d-flex">

        <!-- side bar -->
        @include('admin/layouts.includes.sidebar')

        <!-- Content right Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column flex-grow-1">

            <!-- top bar -->
            @include('admin/layouts.includes.topbar')

            <!-- Begin Page Content -->
            @yield('content')
            <!-- End content Wrapper -->

            <!-- fotter -->
            @include('admin/layouts.includes.footer')

        </div> <!-- End content left Wrapper -->

    </div> <!-- End content Wrapper -->

    <!-- js scripts -->
    @include('admin/layouts.includes.footer-script')

</body>

</html>
