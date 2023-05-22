<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from techydevs.com/demos/themes/html/trizen-demo/trizen/user-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Mar 2021 13:44:23 GMT -->
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('images/favicon.png')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- Template CSS Files -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous"/>    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/line-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animated-headline.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

</head>
<style>
    body {
        overflow-x: hidden;
    }
    .yajra-datatable{
        width:unset !important;
    }
</style>
<body class="section-bg">

@include('dashboard.partials.header')


@include('dashboard.partials.sidebar')

<!-- ================================
    START DASHBOARD AREA
================================= -->
<section class="dashboard-area">
    @include('dashboard.partials.admin-nav')
    @yield('content')
    <div class="border-top mt-5"></div>
    <div class="row align-items-center" style="padding: 20px">
        <div class="col-lg-7">
            <div class="copy-right padding-top-30px">
                <p class="copy__desc">
                  &copy; Copyright © GondalTravel 2022. All Rights Reserved.
                    <strong><a href="https://gondaltravel.com/" target="_blank">GONDAL TRAVEL!</a></strong>
                </p>
            </div><!-- end copy-right -->
        </div><!-- end col-lg-7 -->
        <div class="col-lg-5">
            <div class="copy-right-content text-right padding-top-30px">
                <ul class="social-profile">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div><!-- end copy-right-content -->
        </div><!-- end col-lg-5 -->
    </div><!-- end row -->
</section><!-- end dashboard-area -->
<!-- ================================
    END DASHBOARD AREA
================================= -->

<!-- start scroll top -->
<div id="back-to-top">
    <i class="la la-angle-up" title="Go top"></i>
</div>
<!-- end scroll top -->

<!-- Template JS Files -->
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/daterangepicker.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('js/jquery.countTo.min.js')}}"></script>
<script src="{{asset('js/animated-headline.js')}}"></script>
<script src="{{asset('js/jquery.ripples-min.js')}}"></script>
<script src="{{asset('js/quantity-input.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script>
    $(function () {
        $('#user_table').DataTable();
        $('#user_detail').DataTable();
        $('#all_users').DataTable();
        $('#collector_detail').DataTable();
        $('#collector_table').DataTable();
        $('#travel_id').DataTable();
        $('#flights').DataTable();
    });
</script>
</body>

@yield('datatable')
</html>
