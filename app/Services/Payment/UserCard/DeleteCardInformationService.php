<?php

namespace App\Services\Payment\UserCard;

use App\Models\Card;
use App\Services\Service;

class DeleteCardInformationService extends Service
{
    public function deleteCardInformation($request): bool
    {
        $card = Card::find($request->card_id);
        if ($card->delete()){
            return true;
        }
        return false;
    }
}
