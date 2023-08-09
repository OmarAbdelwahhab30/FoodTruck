<?php

namespace App\Services\Wallets;
use App\Models\Wallet;
use App\Services\Service;

class WalletService extends Service
{


    public function returnBalance()
    {
        $balance = Wallet::where("user_id",auth("sanctum")->user()->id)->first()->balance;
        if (isset($balance) && $balance != null ){
            return $balance;
        }
        return false;
    }
}
