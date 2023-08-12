<?php

namespace App\Services\Wallets;
use App\Models\Wallet;
use App\Services\Service;

class WalletService extends Service
{


    public function returnBalance()
    {
        $wallet = Wallet::where("user_id",auth("sanctum")->user()->id)->first();
        if (isset($wallet) && $wallet != null ){
            return $wallet;
        }
        return false;
    }
}
