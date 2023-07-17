<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgetPasswordRequest;
use App\Services\Auth\ForgetPasswordService;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{

    public function createNewPassword(ForgetPasswordRequest $request,ForgetPasswordService $service)
    {
        $user = $service->createNewPassword($request);
        if ($user){
            return $this->returnData("userData",$user,"Here is User Data");
        }
        return  $this->returnError("Something went wrong , try again later");
    }
}
