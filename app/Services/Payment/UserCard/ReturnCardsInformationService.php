<?php

namespace App\Services\Payment\UserCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\UserCard\AddCardInfoRequest;
use App\Models\Card;
use App\Services\Service;

class ReturnCardsInformationService extends Service
{
    public function returnCardsInformation()
    {
        $created = Card::where("user_id",auth("sanctum")->user()->id)->get();
        if ($created){
            return $created;
        }
        return [];
    }
}
