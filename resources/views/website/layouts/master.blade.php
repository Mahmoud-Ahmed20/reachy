<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>

    <!-- Google font Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="دكتور عمرو سعيد لعلاج الالم والم الظهر والغضاريف بدون الم">
    <meta name="Author" content="دكتور عمرو سعيد">
    <meta name="Keywords"
        content="pain,cure dr amr saeed,dr amre saeed,دكتور عمرو سعيد,علاج الام الظهر,علاج,الام الظهر,علاج الغضروف,مناظير,علاج الظهر بدون الم,عيادات الجيزة لعلاجات الظهر,علاج الظهر اسكندرية,دكتور ظهر,عيادة,عيادات القاهرة لعلاج الظهر,علاج الظهر بدون الم,عمرو سعيد,افضل دكاترة ظهر في مصر,دكتور علاج غضاريف,دكتور علاج فقري,افضل دكاترة ظهر,افضل دكتور ظهر,ماهو افضل علاج لالم الظهر,حجز دكتور ظهر,فيزيتا حجز,الغضروف,بين كلينك,back pain treatment,علاج,ظهر,بدون الم,عمرو سعيد,عيادة,عيادة ظهر,د عمرو سعيد لعلاج الالم, دكتور عمرو سعيد" />
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('img/dashboard/system/favicon_land.png') }}">
    <!-- Head and css files -->
    @include('website/layouts.includes.head')

</head>

<body style="background-color: #f5f5f5;">


    @include('website/layouts.includes.topbar_2')
    @include('website/layouts.includes.topbar')

    <!-- Begin Page Content -->

    @yield('content')

    <!-- End content Wrapper -->
  @include('website/layouts.includes.leftbar') 

    <!-- footer -->
    @include('website/layouts.includes.footer')

    <!-- js scripts -->
    @include('website/layouts.includes.footer-script')


    <!-- js scripts -->
</body>

</html>
