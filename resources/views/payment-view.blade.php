<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paypal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://kit.fontawesome.com/f3297bf651.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>

        body{
            overflow: hidden; /* Hide scrollbars */
        }
        *{
            padding: 0;
            margin: 0;
        }
        .topnav {
            background-color: #000000;
            overflow: hidden;
            height: 100px;
        }

        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            display: block;
            color: #000000;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        /* Change the color of links on hover */
        .topnav a:hover {
            background-color: #000000;
            color: black;
        }

        /* Add an active class to highlight the current page */
        .topnav a.active {
            background-color: #000000;
            color: black;
        }

        /* Hide the link that should open and close the topnav on small screens */
        .topnav .icon {
            display: none;
        }
    </style>
</head>
<body>
<div class="topnav" id="myTopnav">
    <a href="#" class="active">Home</a>
    <a href="#">News</a>
    <a href="#">Contact</a>
    <a href="#">About</a>
    <a href="javascript:void(0);" class="icon">
        <i class="fa fa-bars"></i>
    </a>
</div>
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="panel panel-default">
    <div class="panel-body">
        <h1 class="text-3xl md:text-5xl font-extrabold text-center uppercase mb-12 bg-gradient-to-r from-indigo-400 via-purple-500 to-indigo-600 bg-clip-text text-transparent transform -rotate-2">
        <span class="paypal-logo">
      <i>Pay</i><i>Pal</i>
    </span>
        </h1>
        <center>
            <a  href="{{ route('make.payment',[$customer_id,$order_id,$currency,$amount])}}"
                style="background-image: linear-gradient(#FFF0A8, #F9B421);width: 280px" class="btn btn-default w-full bg-indigo-500 uppercase rounded-xl font-extrabold text-white px-6 h-8">
                <i class="fa-brands fa-cc-paypal fa-fade fa-xs"></i>
                Pay with PayPal
            </a>
        </center>
    </div>
</div>
</body>
</html>
