<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\LogoutService;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request,LogoutService $service){
        if($service->logout($request)){
            return $this->returnSuccessMessage("You have been successfully logged out!");
        }
        return $this->returnError("some thing went wrong");
    }
}
