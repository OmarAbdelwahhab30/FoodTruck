<?php

namespace App\Services\Wallets;

use App\Models\Payment;
use App\Models\Wallet;
use App\Services\Service;

class WalletService extends Service
{
    public function returnBalance()
    {
        $wallet = Wallet::where("user_id", auth("sanctum")->user()->id)->first();
        if (isset($wallet) && $wallet != null) {
            return $wallet;
        }
        return false;
    }

    public function returnRecentTransactions()
    {
        return Payment::where("seller_id", auth("sanctum")->user()->id)->with(["user" => function ($q) {
                $q->select("name", "id", "image");
            }, "order" => function ($order) {
                $order->select("id", "total_price","payment_id");
            }])->get();
    }
}
