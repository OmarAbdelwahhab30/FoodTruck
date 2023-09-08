<?php

namespace App\Http\Controllers\cashout;

use App\Http\Controllers\Controller;
use App\Http\Requests\cashout\CashoutRequest;
use App\Models\Request;
use App\Services\cashout\CashoutService;
use Illuminate\Support\Facades\Gate;

class CashoutController extends Controller
{


    public function ExecuteCashout(CashoutRequest $request,CashoutService $service)
    {
        if (!Gate::allows('Execute-Cashout')){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $created = $service->ExecuteCashout($request);
        if ($created){
            return $this->returnSuccessMessage(__("responses.Request Has been sent to admin successfully ,wait for bank response ."));
        }
        return $this->returnError(__("responses.Something went wrong, Check your inputs well !"));
    }
}
