<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\RegisterService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request,RegisterService $service)
    {
        $user = $service->register($request);
        if($user) {
            return $this->returnData("UserData",$user,"Here is User Data");
        }
        return $this->returnError("something went wrong");
    }
}
