<?php

namespace App\Http\Controllers\Payment\UserCard;

use App\Http\Controllers\Controller;
use App\Services\Payment\UserCard\ReturnCardsInformationService;

class ReturnCardsInformationController extends Controller
{


    public function returnCardsInformation(ReturnCardsInformationService $service): \Illuminate\Http\JsonResponse
    {
        $cards = $service->returnCardsInformation();
        if ($cards->first() != null){
            return $this->returnData("Cards",$cards,"All cards");
        }
        return $this->returnError("Something went wrong ,try again later .");
    }
}
