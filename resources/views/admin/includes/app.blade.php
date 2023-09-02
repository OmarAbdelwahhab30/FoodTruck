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
                    <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset("assets/images/logo-light.png")}}" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset("assets/images/logo-light.png")}}" alt="" height="20">
                                </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset("assets/images/logo-light.png")}}" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset("assets/images/logo-light.png")}}" alt="" height="20">
                                </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

            </div>

            <div class="d-flex text-center m-5">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="uil-search"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                         aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                           aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-inline-block language-switch mt-4">


                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                        <a class="mb-1 text-muted" rel="alternate" hreflang="{{ $localeCode }}"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            | {{ $properties['native'] }}
                        </a>

                    @endforeach

                </div>
                <div class="d-inline-block language-switch mt-4">
                        <a class="m-5" href="{{route("admin.logout")}}">Logout</a>
                </div>
                <div>
                    <span type="button" class="btn header-item waves-effect" aria-haspopup="true"
                          aria-expanded="false"></span>
                    <img class="rounded-circle header-profile-user" src="{{auth()->user()->image}}"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">{{auth()->user()->name}}</span>

                </div>
            </div>
        </div>
    </header>
    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <!-- LOGO -->
        <div class="navbar-brand-box">
            <?php
            $x= \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() == "ar"? "-right":"-left";
            ?>
            <img style="margin-top: 19px;margin{{$x}}: 52px;"
                 src="{{asset("assets/images/logo-dark.png")}}" alt="" height="70">
        </div>
        <div style="margin-top:100px " data-simplebar class="sidebar-menu-scroll">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled">
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

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    @yield("content")
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->


<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center p-3">

            <h5 class="m-0 me-2">Settings</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="m-0"/>

        <div class="p-4">
            <h6 class="mb-3">Layout</h6>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout"
                       id="layout-vertical" value="vertical">
                <label class="form-check-label" for="layout-vertical">Vertical</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout"
                       id="layout-horizontal" value="horizontal">
                <label class="form-check-label" for="layout-horizontal">Horizontal</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-mode"
                       id="layout-mode-light" value="light">
                <label class="form-check-label" for="layout-mode-light">Light</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-mode"
                       id="layout-mode-dark" value="dark">
                <label class="form-check-label" for="layout-mode-dark">Dark</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-width"
                       id="layout-width-fuild" value="fuild"
                       onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                <label class="form-check-label" for="layout-width-fuild">Fluid</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-width"
                       id="layout-width-boxed" value="boxed"
                       onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                <label class="form-check-label" for="layout-width-boxed">Boxed</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

            <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="topbar-color"
                       id="topbar-color-light" value="light"
                       onchange="document.body.setAttribute('data-topbar', 'light')">
                <label class="form-check-label" for="topbar-color-light">Light</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="topbar-color"
                       id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                <label class="form-check-label" for="topbar-color-dark">Dark</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size"
                       id="sidebar-size-default" value="default"
                       onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                <label class="form-check-label" for="sidebar-size-default">Default</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size"
                       id="sidebar-size-compact" value="compact"
                       onchange="document.body.setAttribute('data-sidebar-size', 'small')">
                <label class="form-check-label" for="sidebar-size-compact">Compact</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size"
                       id="sidebar-size-small" value="small"
                       onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color"
                       id="sidebar-color-light" value="light"
                       onchange="document.body.setAttribute('data-sidebar', 'light')">
                <label class="form-check-label" for="sidebar-color-light">Light</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color"
                       id="sidebar-color-dark" value="dark"
                       onchange="document.body.setAttribute('data-sidebar', 'dark')">
                <label class="form-check-label" for="sidebar-color-dark">Dark</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color"
                       id="sidebar-color-colored" value="colored"
                       onchange="document.body.setAttribute('data-sidebar', 'colored')">
                <label class="form-check-label" for="sidebar-color-colored">Colored</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">Direction</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-direction"
                       id="layout-direction-ltr" value="ltr">
                <label class="form-check-label" for="layout-direction-ltr">LTR</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-direction"
                       id="layout-direction-rtl" value="rtl">
                <label class="form-check-label" for="layout-direction-rtl">RTL</label>
            </div>

        </div>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->
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

<!-- JAVASCRIPT -->
<script src="{{asset("assets/libs/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/libs/metismenu/metisMenu.min.js")}}"></script>
<script src="{{asset("assets/libs/simplebar/simplebar.min.js")}}"></script>
<script src="{{asset("assets/libs/node-waves/waves.min.js")}}"></script>
<script src="{{asset("assets/libs/waypoints/lib/jquery.waypoints.min.js")}}"></script>
<script src="{{asset("assets/libs/jquery.counterup/jquery.counterup.min.js")}}"></script>
<script src="{{asset("assets/libs/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/libs/metismenu/metisMenu.min.js")}}"></script>
<script src="{{asset("assets/libs/simplebar/simplebar.min.js")}}"></script>
<script src="{{asset("assets/libs/node-waves/waves.min.js")}}"></script>
<script src="{{asset("assets/libs/waypoints/lib/jquery.waypoints.min.js")}}"></script>
<script src="{{asset("assets/libs/jquery.counterup/jquery.counterup.min.js")}}"></script>

<!-- Required datatable js -->
<script src="{{asset("assets/libs/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js")}}"></script>

<!-- Responsive examples -->
<script src="{{asset("assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js")}}"></script>

<!-- init js -->
<script src="{{asset("assets/js/pages/ecommerce-datatables.init.js")}}"></script>

<!-- App js -->
<script src="{{asset("assets/js/app.js")}}"></script>
<!-- apexcharts -->
<script src="{{asset("assets/libs/apexcharts/apexcharts.min.js")}}"></script>

<script src="{{asset("assets/js/pages/dashboard.init.js")}}"></script>

<!-- App js -->
<script src="{{asset("assets/js/app.js")}}"></script>

</body>

</html>
