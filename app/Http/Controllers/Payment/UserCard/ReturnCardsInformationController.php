<?php

namespace App\Http\Controllers\Payment\UserCard;

use App\Http\Controllers\Controller;
use App\Services\Payment\UserCard\ReturnCardsInformationService;
use Illuminate\Support\Facades\Gate;

class ReturnCardsInformationController extends Controller
{


    public function returnCardsInformation(ReturnCardsInformationService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('get-payment-card-info')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $cards = $service->returnCardsInformation();
        if ($cards){
            return $this->returnData("Cards",$cards,"All cards");
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
