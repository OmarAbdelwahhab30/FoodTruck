<?php

namespace App\Http\Controllers\admin\paymnets_order_details;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Value;

class PaymentOrdersDetailsController extends Controller
{
    public function index()
    {
        $payments = Payment::paginate(5);
        return view("admin.payments_details.index",compact("payments"));
    }

    public function display($payment_id)
    {
        $information = Payment::where("id",$payment_id)->with("order",function ($q){
            $q->with("products");
            $q->with("truck");
            $q->with("user");
        })->get();
        $vat = Value::first()->vat;
        return view("admin.payments_details.details",compact('information','vat'));
    }
}
