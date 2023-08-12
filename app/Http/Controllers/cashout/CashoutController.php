<?php

namespace App\Http\Controllers\cashout;

use App\Http\Controllers\Controller;
use App\Models\Request;
use App\Services\cashout\CashoutService;

class CashoutController extends Controller
{


    public function ExecuteCashout(\Illuminate\Http\Request $request,CashoutService $service)
    {
        $created = $service->ExecuteCashout($request);
        if ($created){
            return $this->returnSuccessMessage("Request Has been sent to admin successfully ,wait for bank response .");
        }
        return $this->returnError("Something went wrong, Check your inputs well !");
    }
}
