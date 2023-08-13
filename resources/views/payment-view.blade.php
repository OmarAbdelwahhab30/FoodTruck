<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Paypal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
        .box {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
        }

        .paypal {

        &
        -logo {
            font-family: Verdana, Tahoma, serif;
            font-weight: bold;
            font-size: 26px;
        }

        body {
            height: 100%
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: inherit;
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
<div class="box">
  <span class="paypal-logo">
    <i>Pay</i><i>Pal</i>
  </span>
    <br/>
    <div class="paypal-button">
    <span class="paypal-button-title">
      Buy now with
    </span>
        <span class="paypal-logo">
      <i>Pay</i><i>Pal</i>
    </span>
    </div>
    <div id="paypal-button-container" style="margin-top: 15px">
        <form method="POST" id="payment-form" action="{{route('pay-paypal')}}">
            @csrf
            <button class="btn btn-block" type="submit">
            </button>
        </form>
    </div>
</div>

<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD&disable-funding=card&intent=authorize"></script>
<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({
        style: {
            layout: 'vertical',
            color: 'gold',
            shape: 'pill',
            label: 'pay',
        }
    }).render('#paypal-button-container');
</script>
</body>
</html>
