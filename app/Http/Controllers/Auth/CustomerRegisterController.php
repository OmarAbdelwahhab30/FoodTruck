<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CustomerRegisterRequest;
use App\Http\Requests\Auth\SellerRegisterRequest;
use App\Services\Auth\CustomerRegisterService;
use Illuminate\Http\Request;

class CustomerRegisterController extends Controller
{
    public function register(CustomerRegisterRequest $request, CustomerRegisterService $service)
    {
        $user = $service->register($request);
        if($user) {
            return $this->returnData("UserData",$user,"Here is User Data");
        }
        return $this->returnError("something went wrong");
    }
}
