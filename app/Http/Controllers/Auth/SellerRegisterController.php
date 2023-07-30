<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SellerRegisterRequest;
use App\Services\Auth\SellerRegisterService;

class SellerRegisterController extends Controller
{
    public function register(SellerRegisterRequest $request, SellerRegisterService $service): \Illuminate\Http\JsonResponse
    {
        $user = $service->register($request);
        if($user) {
            return $this->returnData(__("UserData"),$user,__("responses.Here is User Data"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
