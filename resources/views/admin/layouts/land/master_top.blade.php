<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-224227650-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-224227650-1');
    </script>


    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="دكتور عمرو سعيد لعلاج الم الظهر والغضاريف بدون الم">
    <meta name="Author" content="دكتور عمرو سعيد">
    <meta name="Keywords"
        content="pain,cure dr amr saeed,dr amre saeed,دكتور عمرو سعيد,علاج الام الظهر,علاج,الام الظهر,علاج الغضروف,مناظير,علاج الظهر بدون الم,عيادات الجيزة لعلاجات الظهر,علاج الظهر اسكندرية,دكتور ظهر,عيادة,عيادات القاهرة لعلاج الظهر,علاج الظهر بدون الم,عمرو سعيد,افضل دكاترة ظهر في مصر,دكتور علاج غضاريف,دكتور علاج فقري,افضل دكاترة ظهر,افضل دكتور ظهر,ماهو افضل علاج لالم الظهر,حجز دكتور ظهر,فيزيتا حجز,الغضروف,بين كلينك,back pain treatment,علاج,ظهر,بدون الم,عمرو سعيد,عيادة,عيادة ظهر" />
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('img/dashboard/system/favicon_land.png') }}">
    <!-- Head and css files -->
    @include('layouts.land.includes.head')
</head>

<body class="bg-white">

    <!-- Page Loader -->
    <div class="loader-page justify-content-center align-items-center">
        <div class="loader-page-cont">
            <img src="{{ URL::asset('img/dashboard/system/pc-loader.png') }}" alt="">
            <div class="lds-ellipsis lds-ellipsis-load">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <div class="text-green-ligh-bg-grad shadow" id="add_buttn_fixed2">
        <a href="https://wa.me/+0201234500271?text=Hello,%20I%20need%20to%20make%20an%20appointment?%20Thanks"
            class="text-white ">
            <i class="fab fa-whatsapp text-lg"></i>
        </a>
    </div>

    @include('layouts.land.includes.topbar')

    <!-- Begin Page Content -->
    @yield('content')
    <!-- End content Wrapper -->

    <!-- footer -->
    @include('layouts.land.includes.footer')

    <!-- js scripts -->
    @include('layouts.land.includes.footer-script')

</body>

</html>
