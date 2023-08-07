<?php

namespace App\Services\Payment\UserCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\UserCard\AddCardInfoRequest;
use App\Models\Card;
use App\Services\Service;

class AddCardInformationService extends Service
{
    public function addCardInformation($request): bool
    {

        $created = Card::create([
            'name_on_card'    => $request->name_on_card,
            'card_number'     => $request->card_number,
            'expiry_date'     => $request->expiry_date,
            'cvv'             => $request->cvv,
            'card_type'       => $request->card_type,
            'user_id'         => auth("sanctum")->user()->id,
        ]);
        if ($created){
            return true;
        }
        return false;
    }
}
