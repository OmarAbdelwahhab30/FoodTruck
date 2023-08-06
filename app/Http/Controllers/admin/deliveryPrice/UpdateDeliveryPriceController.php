<?php

namespace App\Http\Controllers\admin\deliveryPrice;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\KiloPriceRequest;
use App\Models\Value;
use Illuminate\Http\Client\Request;

class UpdateDeliveryPriceController extends Controller
{
    public function index()
    {
        return view("admin.price-per-kilo.index");
    }

    public function update(KiloPriceRequest $request)
    {
        $first = Value::first();
        $first->kilo_price  = $request->value;
        if ($first->save()){
            return redirect()->back()->with("success","Price Per Kilo Value Has Been Updated Successfully.");
        }
        return redirect()->back()->with("error","Something went wrong , try again later.");
    }
}
