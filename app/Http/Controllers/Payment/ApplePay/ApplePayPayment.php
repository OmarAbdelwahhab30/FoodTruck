<?php

namespace App\Http\Controllers\Payment\ApplePay;

use App\Http\Controllers\Controller;

class ApplePayPayment extends Controller
{
    public function index()
    {
        return view("applepay");
    }
}
