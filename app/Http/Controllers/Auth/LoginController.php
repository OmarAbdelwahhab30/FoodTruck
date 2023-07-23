<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginRequest $request, LoginService $service){
        $user = $service->login($request);
        if($user)
        {
            return $this->returnData("user", $user, "User logged successfully");
        }
        return  $this->returnError("These credentials do not match our records.");
    }
}
