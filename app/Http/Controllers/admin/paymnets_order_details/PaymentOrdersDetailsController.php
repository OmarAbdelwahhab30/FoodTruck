<?php

namespace App\Http\Controllers\admin\paymnets_order_details;

use App\Http\Controllers\Controller;

class PaymentOrdersDetailsController extends Controller
{
    public function index()
    {
        return view("admin.payments_details.index");
    }
}
