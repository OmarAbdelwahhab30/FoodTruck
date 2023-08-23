<!DOCTYPE html>
<html>
<head>
    <title>{{"Invoice"}}</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;
    }
    .w-85{
        width:85%;
    }
    .w-15{
        width:15%;
    }
    .logo img{
        width:200px;
        height:60px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Invoice</h1>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">{{$information[0]->order->id}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Order Date - <span class="gray-color">{{$information[0]->order->created_at}}</span></p>
    </div>
    <div class="w-50 float-left logo mt-10">
    </div>
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">From</th>
            <th class="w-50">To</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                    <p>Customer Name :{{$information[0]->order->user->name}}</p>
                    <p>Contact: {{$information[0]->order->user->phone}}</p>
                </div>
            </td>
            <td>
                <div class="box-text">
                    <p>Seller name : {{$information[0]->order->truck->user->name}}</p>
                    <p>Truck name :{{$information[0]->order->truck->user->name}}</p>
                    <p>Contact: {{$information[0]->order->truck->user->phone}}</p>
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Payment Method</th>
            <th class="w-50">Shipping Method</th>
        </tr>
        <tr>
            <td>{{$information[0]->payment_method}}</td>
            <td>{{$information[0]->order->delivery_type_en}}</td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">##</th>
            <th class="w-50">Product Name</th>
            <th class="w-50">Price</th>
            <th class="w-50">Qty</th>
            <th class="w-50">Subtotal</th>
        </tr>
        @foreach($information[0]->order->products as $product)
        <tr align="center">
            <td>{{$loop->iteration}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->orderProduct->size->price}}</td>
            <td>{{$product->orderProduct->count}}</td>
            <td>{{$product->orderProduct->count
                                                        *
                                                        $product->orderProduct->size->price}}</td>

        </tr>

        @endforeach
        <tr>
            <th scope="row" colspan="4" class="border-0 text-end">Value added tax</th>
            <td class="border-0 text-end"><h4 class="m-0">{{$vat}} S.R</h4></td>
        </tr>
        <tr>
            <th scope="row" colspan="4" class="border-0 text-end">Total Price</th>
            <td class="border-0 text-end"><h4 class="m-0">{{$information[0]->order->total_price}} S.R</h4></td>
        </tr>
    </table>
</div>
</html>
