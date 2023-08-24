<?php

namespace App\Http\Controllers\Wallets;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Services\BankAccounts\BankAccountService;
use App\Services\Wallets\WalletService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class WalletController extends Controller
{


    public function returnBalance(WalletService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("return-balance")) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $balance = $service->returnBalance();
        if ($balance) {
            return $this->returnData("balance", $balance, "the balance is here.");
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

    public function returnRecentTransactions(WalletService $service)
    {
        if (!Gate::allows(" return-recent-transactions")) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $transactions = $service->returnRecentTransactions();
        if ($transactions) {
            return $this->returnData("transactions", $transactions, "Here are transactions");
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));

    }
}
