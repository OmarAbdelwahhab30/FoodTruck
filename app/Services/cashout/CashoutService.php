<?php

namespace App\Services\cashout;

use App\Models\Request;
use App\Services\Service;

class CashoutService extends Service
{


    public function ExecuteCashout($request)
    {
        if ($this->HisWallet($request->wallet_id)
            && $this->HisBankAccount($request->bank_account_id)
            && $this->IsAmountInRange($request->amount)) {
            return Request::create([
                'amount' => $request->amount,
                'wallet_id' => $request->wallet_id,
                'user_id' => auth("sanctum")->user()->id,
                'bank_account_id' => $request->bank_account_id,
            ]);
        }
        return false;
    }

    private function HisWallet($wallet_id): bool
    {
        return $wallet_id == auth("sanctum")->user()->wallet->id;
    }

    private function HisBankAccount($bank_account_id): bool
    {
        if (in_array($bank_account_id,(auth("sanctum")->user()->bank_accounts->pluck("id"))->toArray())){
            return true;
        }
        return false;
    }

    private function IsAmountInRange($amount): bool
    {
        if ((integer)auth("sanctum")->user()->wallet->balance >= (integer)$amount){
            return true;
        }
        return false;
    }
}
