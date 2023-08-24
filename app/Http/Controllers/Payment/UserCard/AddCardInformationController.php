<?php

namespace App\Http\Controllers\Payment\UserCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\UserCard\AddCardInfoRequest;
use App\Services\Payment\UserCard\AddCardInformationService;
use Illuminate\Support\Facades\Gate;

class AddCardInformationController extends Controller
{


    public function addCardInformation(AddCardInfoRequest $request,AddCardInformationService $service)
    {
        if (! Gate::allows('add-payment-card-info')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $added = $service->addCardInformation($request);
        if ($added){
            return $this->returnSuccessMessage("Card information has been added successfully.");
        }
        return $this->returnError("Something went wrong ,try again later .");
    }
}
