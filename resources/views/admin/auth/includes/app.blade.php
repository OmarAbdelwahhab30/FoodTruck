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
    <meta charset="utf-8" />
    <title>Food Truck</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset("assets/images/favicon.ico")}}">
    <!-- Bootstrap Css -->
{{--    <link href="{{asset("assets/css/bootstrap.min.css")}}" id="bootstrap-style" rel="stylesheet" type="text/css" />--}}
{{--    <!-- Icons Css -->--}}
{{--    <link href="{{asset("assets/css/icons.min.css")}}" rel="stylesheet" type="text/css" />--}}
{{--    <!-- App Css-->--}}
{{--    <link href="{{asset("assets/css/app.min.css")}}" id="app-style" rel="stylesheet" type="text/css" />--}}
    <!-- Bootstrap Css -->
    {{--    <link href="{{asset("assets/css/bootstrap.min.css")}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>--}}
    <link href="{{asset("assets/css/bootstrap$x.min.css")}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>

    <!-- Icons Css -->
    {{--    <link href="{{asset("assets/css/icons.min.css")}}" rel="stylesheet" type="text/css"/>--}}
    <link href="{{asset("assets/css/icons$x.min.css")}}" rel="stylesheet" type="text/css"/>

    <!-- App Css-->
    {{--    <link href="{{asset("assets/css/app.min.css")}}" id="app-style" rel="stylesheet" type="text/css"/>--}}
    <link href="{{asset("assets/css/app$x.min.css")}}" id="app-style" rel="stylesheet" type="text/css"/>
</head>
<body class="authentication-bg">
<div class="account-pages my-5 pt-sm-5">

    @yield("content")
</div>
<!-- JAVASCRIPT -->
<script src="{{asset("assets/libs/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/libs/metismenu/metisMenu.min.js")}}"></script>
<script src="{{asset("assets/libs/simplebar/simplebar.min.js")}}"></script>
<script src="{{asset("assets/libs/node-waves/waves.min.js")}}"></script>
<script src="{{asset("assets/libs/waypoints/lib/jquery.waypoints.min.js")}}"></script>
<script src="{{asset("assets/libs/jquery.counterup/jquery.counterup.min.js")}}"></script>

<!-- App js -->
<script src="{{asset("assets/js/app.js")}}"></script>

</body>
</html>
