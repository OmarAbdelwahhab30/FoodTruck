<!doctype html>
<?php
$x = "";
if (LaravelLocalization::getCurrentLocale() == "ar") {
    $x = "-rtl";
    $dir = "rtl";

}else{
    $dir = "ltr";
}
?>

<html dir="{{$dir}}">
<head>
    <meta charset="utf-8"/>
    <?php
        $z = isset($z)&& $z !=null ? $z:"";
        ?>
    <title>{{__("admin.Dashboard") . $z ?? ""}}</title>
    <link rel="icon" type="image/gif" href="{{asset("assets/images/favicon.ico")}}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
<style>
    input:-moz-placeholder { text-align:right; }
</style>
    <link rel="shortcut icon" href="{{asset("assets/images/favicon.ico")}}">
    @yield("addition")

    <link rel="shortcut icon" href="{{asset("assets/images/favicon.ico")}}">

    <!-- DataTables -->
    <link href="{{asset("assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css")}}" rel="stylesheet"
          type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="{{asset("assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css")}}"
          rel="stylesheet" type="text/css"/>

    <!-- Bootstrap Css -->
    <link href="{{asset("assets/css/bootstrap$x.min.css")}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>

    <!-- Icons Css -->
    <link href="{{asset("assets/css/icons$x.min.css")}}" rel="stylesheet" type="text/css"/>

    <!-- App Css-->
    <link href="{{asset("assets/css/app$x.min.css")}}" id="app-style" rel="stylesheet" type="text/css"/>


</head>

<body>
<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="20">
                                </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="20">
                                </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <!-- App Search-->

            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block language-switch">

                    <button type="button" class="btn header-item waves-effect"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span>اللغة | Language</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">

                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                            <a class="mb-1 text-muted dropdown-item notify-item" rel="alternate" hreflang="{{ $localeCode }}"
                               href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>

                        @endforeach
                    </div>
                </div>
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{auth()->user()->image}}" alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">{{auth()->user()->name}}</span>
                    </button>
                </div>
            </div>
        </div>
    </header>    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="" height="20">
                        </span>
            </a>

            <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                <span class="logo-lg">
                            <img src="assets/images/logo-light.png" alt="" height="20">
                        </span>
            </a>
        </div>

        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
            <i class="fa fa-fw fa-bars"></i>
        </button>

        <div data-simplebar class="sidebar-menu-scroll">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">{{__("admin.Menu")}}</li>

                    <li>
                        <a href="{{route("admin.home")}}">
                            <i class="uil-home-alt"></i>
                            <span>{{__("admin.Dashboard")}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.add.admins")}}">
                            <i class="uil-dashboard"></i>
                            <span>{{__("admin.Add Administrator")}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.update.account")}}">
                            <i class="uil-comment-alt-edit"></i>
                            <span>{{__("admin.Update Account")}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.control.trucks")}}">
                            <i class="bx bxs-truck"></i>
                            <span>{{__("admin.Control Trucks")}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.reviews.trucks")}}">
                            <i class="uil-star-half-alt"></i>
                            <span>{{__("admin.Reviews About Trucks")}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.reviews.customers")}}">
                            <i class="uil-star"></i>
                            <span>{{__("admin.Reviews About Users")}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.customers.messages")}}">
                            <i class="uil-comment-alt-message"></i>
                            <span>{{__("admin.Customers Messages")}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.ownerPer.index")}}">
                            <i class="uil-percentage"></i>
                            <span>{{__("admin.Owner Percentage")}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.delivery.price.index")}}">
                            <i class="uil-bitcoin-alt"></i>
                            <span>{{__("admin.Delivery Price")}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.control.customers")}}">
                            <i class="uil-user"></i>
                            <span>{{__("admin.Control Users")}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.payments.details.show",)}}">
                            <i class="mdi mdi-contactless-payment-circle"></i>
                            <span>
                                {{__("admin.Payments Details")}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.notify.index")}}">
                            <i class="uil-comment-alt-exclamation"></i>
                            <span>{{__("admin.Control Notifications")}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.cash.index")}}">
                            <i class="uil-money-withdrawal"></i>
                            <span>{{__("admin.Cash out requests")}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.show.requests")}}">
                            <i class="uil-plus-circle"></i>
                            <span>{{__("admin.Sellers Requests")}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.vat.index")}}">
                            <i class="uil-focus-add"></i>
                            <span>{{__("admin.Value Added Tax")}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.about-us")}}">
                            <i class="uil-file-minus"></i>
                            <span>{{__("admin.About-Us")}}</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route("admin.terms")}}">
                            <i class="uil-file-info-alt"></i>
                            <span>{{__("admin.Terms&Conditions")}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.env.index")}}">
                            <i class="uil-exclamation-triangle"></i>
                            <span>{{__("admin.Change Configurations")}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.logout")}}">
                            <i class="uil-sign-out-alt"></i>
                            <span>{{__("admin.logout")}}</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Left Sidebar End -->
    @yield("content")

</div>

<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script>
                © FoodTruck.
            </div>
        </div>
    </div>
</footer>
</div>
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<script src="{{asset("assets/libs/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/libs/metismenu/metisMenu.min.js")}}"></script>
<script src="{{asset("assets/libs/simplebar/simplebar.min.js")}}"></script>
<script src="{{asset("assets/libs/node-waves/waves.min.js")}}"></script>
<script src="{{asset("assets/libs/waypoints/lib/jquery.waypoints.min.js")}}"></script>
<script src="{{asset("assets/libs/jquery.counterup/jquery.counterup.min.js")}}"></script>

<!-- apexcharts -->
<script src="{{asset("assets/libs/apexcharts/apexcharts.min.js")}}"></script>

<script src="{{asset("assets/js/pages/dashboard.init.js")}}"></script>

<!-- App js -->
<script src="{{asset("assets/js/app.js")}}"></script>

<!-- Required datatable js -->
<script src="{{asset("assets/libs/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<!-- Responsive examples -->
<script src="{{asset("assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js")}}"></script>
<!-- init js -->
<script src="{{asset("assets/js/pages/ecommerce-datatables.init.js")}}"></script>

<!-- JAVASCRIPT -->
{{--<script src="{{asset("assets/libs/jquery/jquery.min.js")}}"></script>--}}
{{--<script src="{{asset("assets/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>--}}
{{--<script src="{{asset("assets/libs/metismenu/metisMenu.min.js")}}"></script>--}}
{{--<script src="{{asset("assets/libs/simplebar/simplebar.min.js")}}"></script>--}}
{{--<script src="{{asset("assets/libs/node-waves/waves.min.js")}}"></script>--}}
{{--<script src="{{asset("assets/libs/waypoints/lib/jquery.waypoints.min.js")}}"></script>--}}
{{--<script src="{{asset("assets/libs/jquery.counterup/jquery.counterup.min.js")}}"></script>--}}

{{--<!-- apexcharts -->--}}
{{--<script src="{{asset("assets/libs/apexcharts/apexcharts.min.js")}}"></script>--}}

{{--<script src="{{asset("assets/js/pages/dashboard.init.js")}}"></script>--}}

{{--<!-- App js -->--}}
{{--<script src="{{asset("assets/js/app.js")}}"></script>--}}

{{--<!-- JAVASCRIPT -->--}}
{{--<script src="{{asset("assets/libs/jquery/jquery.min.js")}}"></script>--}}
{{--<script src="{{asset("assets/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>--}}
{{--<script src="{{asset("assets/libs/metismenu/metisMenu.min.js")}}"></script>--}}
{{--<script src="{{asset("assets/libs/simplebar/simplebar.min.js")}}"></script>--}}
{{--<script src="{{asset("assets/libs/node-waves/waves.min.js")}}"></script>--}}
{{--<script src="{{asset("assets/libs/waypoints/lib/jquery.waypoints.min.js")}}"></script>--}}
{{--<script src="{{asset("assets/libs/jquery.counterup/jquery.counterup.min.js")}}"></script>--}}
{{--<!-- Required datatable js -->--}}
{{--<script src="{{asset("assets/libs/datatables.net/js/jquery.dataTables.min.js")}}"></script>--}}
{{--<script src="{{asset("assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js")}}"></script>--}}
{{--<!-- Responsive examples -->--}}
{{--<script src="{{asset("assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>--}}
{{--<script src="{{asset("assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js")}}"></script>--}}
{{--<!-- apexcharts -->--}}
{{--<script src="{{asset("assets/libs/apexcharts/apexcharts.min.js")}}"></script>--}}
{{--<script src="{{asset("assets/js/pages/dashboard.init.js")}}"></script>--}}
{{--<!-- App js -->--}}
{{--<script src="{{asset("assets/js/app.js")}}"></script>--}}
{{--<!-- init js -->--}}
{{--<script src="{{asset("assets/js/pages/ecommerce-datatables.init.js")}}"></script>--}}

</body>

</html>
