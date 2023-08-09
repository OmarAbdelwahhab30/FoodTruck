<?php

namespace App\Services\BankAccounts;

use App\Http\Requests\BankAccounts\AddBankAccountInfoRequest;
use App\Models\BankAccount;
use App\Models\Wallet;
use App\Services\Service;
use Illuminate\Http\Request;

class BankAccountService extends Service
{


    public function addBankAccountInfo($request)
    {
        return BankAccount::create([
            'account_name' => $request->account_name,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'iban' => $request->iban,
            'user_id'   => auth("sanctum")->user()->id,
        ]);
    }

    public function returnBankInfo()
    {
        return BankAccount::where("user_id",auth("sanctum")->user()->id)->get();
    }
}
