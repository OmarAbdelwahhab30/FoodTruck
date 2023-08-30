<?php

namespace App\Http\Controllers\BankAccounts;

use App\Http\Controllers\Controller;
use App\Http\Requests\BankAccounts\AddBankAccountInfoRequest;
use App\Services\BankAccounts\BankAccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BankAccountController extends Controller
{

    public function addBankAccountInfo(AddBankAccountInfoRequest $request,BankAccountService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows('add-bankAccountInfo')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $added = $service->addBankAccountInfo($request);
        if ($added){
            return $this->returnSuccessMessage(__("responses.Bank Account Information has been added successfully."));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

    public function returnBankInfo(BankAccountService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('return-bankAccountInfo')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $data = $service->returnBankInfo();
        if ($data){
            return $this->returnData("accounts",$data,"here are all accounts.");
        }
        return $this->returnError("something went wrong !");
    }

}
