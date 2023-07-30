<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginRequest $request, LoginService $service): \Illuminate\Http\JsonResponse
    {
        $user = $service->login($request);
        if($user)
        {
            return $this->returnData(__("user"), $user, __("responses.User logged successfully"));
        }
        return  $this->returnError(__("responses.These inputs are invalid , try again."));
    }

    /**
     * Social Login
     */
    public function socialLogin(Request $request)
    {

    }
}
