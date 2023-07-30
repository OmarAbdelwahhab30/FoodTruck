<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CustomerRegisterRequest;
use App\Services\Auth\CustomerRegisterService;

class CustomerRegisterController extends Controller
{
    public function register(CustomerRegisterRequest $request, CustomerRegisterService $service)
    {
        $user = $service->register($request);
        if($user) {
            return $this->returnData(__("UserData"),$user,__("responses.Here is User Data"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
