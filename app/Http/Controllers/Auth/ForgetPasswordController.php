<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgetPasswordRequest;
use App\Http\Requests\Auth\IsPhoneNumberExistsRequest;
use App\Services\Auth\ForgetPasswordService;

class ForgetPasswordController extends Controller
{

    public function createNewPassword(ForgetPasswordRequest $request,ForgetPasswordService $service): \Illuminate\Http\JsonResponse
    {
        $user = $service->createNewPassword($request);
        if ($user){
            return $this->returnData(__("userData"),$user,__("responses.Here is User Data"));
        }
        return  $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

    public function IsPhoneNumberExists(IsPhoneNumberExistsRequest $request,ForgetPasswordService $service): \Illuminate\Http\JsonResponse
    {
        $exist =  $service->IsPhoneNumberExists($request);
        if ($exist){
            return $this->returnSuccessMessage(True);
        }
        return $this->returnError(False);
    }
}
