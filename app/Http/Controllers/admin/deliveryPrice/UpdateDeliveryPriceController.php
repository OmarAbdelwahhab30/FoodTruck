<?php

namespace App\Http\Controllers\admin\deliveryPrice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KiloPriceRequest;
use App\Models\Value;

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
            return redirect()->back()->with("success",__("admin.Price Per Kilo Value Has Been Updated Successfully"));
        }
        return redirect()->back()->with("error",__("admin.Something went wrong try again later"));
    }
}
