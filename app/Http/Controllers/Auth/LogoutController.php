<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\LogoutService;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request,LogoutService $service): \Illuminate\Http\JsonResponse
    {
        if($service->logout($request)){
            return $this->returnSuccessMessage(__("responses.You have been successfully logged out!"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
