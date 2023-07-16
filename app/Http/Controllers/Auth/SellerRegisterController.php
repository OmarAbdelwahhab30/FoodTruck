<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SellerRegisterRequest;
use App\Services\Auth\SellerRegisterService;
use Illuminate\Http\Request;

class SellerRegisterController extends Controller
{
    public function register(SellerRegisterRequest $request, SellerRegisterService $service)
    {
        $user = $service->register($request);
        if($user) {
            return $this->returnData("UserData",$user,"Here is User Data");
        }
        return $this->returnError("something went wrong");
    }
}
