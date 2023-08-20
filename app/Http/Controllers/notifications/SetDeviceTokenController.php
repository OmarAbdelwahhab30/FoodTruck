<?php

namespace App\Http\Controllers\notifications;

use App\Http\Controllers\Controller;
use App\Http\Requests\notifications\SetDeviceTokenRequest;
use App\Services\notifications\SetDeviceTokenService;

class SetDeviceTokenController extends Controller
{

    public function SetDeviceToken(SetDeviceTokenRequest $request, SetDeviceTokenService $service): \Illuminate\Http\JsonResponse
    {
        $done = $service->SetDeviceToken($request);
        if ($done){
            return $this->returnSuccessMessage("Device token has been updated successfully.");
        }
        return $this->returnError("Something went wrong!");
    }
}
