<?php

namespace App\Http\Controllers\VAT;

use App\Models\Value;

class ReturnValuesController
{


    public function returnVAT()
    {
        return Value::select("vat")->first();
    }

    public function returnOwnerPercentage()
    {
        return Value::select("owner_percentage")->first();
    }

    public function returnKiloPrice()
    {
        return Value::select("kilo_price")->first();
    }
}
