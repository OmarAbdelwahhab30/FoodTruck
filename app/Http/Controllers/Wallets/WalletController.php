<?php

namespace App\Http\Controllers\Wallets;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Services\BankAccounts\BankAccountService;
use App\Services\Wallets\WalletService;
use Illuminate\Http\Request;

class WalletController extends Controller
{


    public function returnBalance(WalletService $service): \Illuminate\Http\JsonResponse
    {
        $balance = $service->returnBalance();
        if ($balance) {
            return $this->returnData("balance", $balance, "the balance is here.");
        }
        return $this->returnError("something went wrong!");
    }

    public function returnRecentTransactions(WalletService $service)
    {
        $transactions = $service->returnRecentTransactions();
        if ($transactions) {
            return $this->returnData("transactions", $transactions, "Here are transactions");
        }
        return $this->returnError("Something went wrong try again later");
    }
}
