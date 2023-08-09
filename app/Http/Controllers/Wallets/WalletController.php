<?php

namespace App\Http\Controllers\Wallets;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Services\Wallets\BankAccountService;
use Illuminate\Http\Request;

class WalletController extends Controller
{


    public function returnBalance(BankAccountService $service)
    {
        $balance = $service->returnBalance();
        if ($balance){
            return $this->returnData("balance",$balance,"the balance is here.");
        }
        return $this->returnError("something went wrong!");
    }
}
