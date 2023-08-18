<?php

namespace App\Traits;

use App\Models\Wallet;

trait WalletTrait
{
    public function IncreaseWalletBalance($amount, $seller_id)
    {
        $wallet = Wallet::where("user_id", $seller_id)->first();
        $wallet->balance += (double)$amount;
        if ($wallet->save()) {
            return true;
        }
        return false;
    }
}
