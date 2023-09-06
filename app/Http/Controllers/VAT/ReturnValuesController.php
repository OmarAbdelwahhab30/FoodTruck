<?php

namespace App\Http\Controllers\VAT;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\Value;
use Illuminate\Support\Facades\Gate;

class ReturnValuesController extends Controller
{


    public function returnVAT()
    {
        if (!Gate::allows("return-vat")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        return Value::select("vat","kilo_price")->first();
    }

    public function returnOwnerPercentage()
    {
        if (!Gate::allows("return-OwnerPer")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        return Value::select("owner_percentage")->first();
    }

    public function returnKiloPrice()
    {
        if (!Gate::allows("return-kiloPrice")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        return Value::select("kilo_price")->first();
    }

    public function returnLogoPath()
    {
        return $this->returnData("logo",Logo::find(1));
    }


}
