<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\OTP\CheckVonageCodeRequest;
use App\Http\Requests\OTP\SendVonageCodeRequest;
use App\Services\Auth\OTP\VonageService;

class SMSController extends Controller
{

    public function send(SendVonageCodeRequest $request,VonageService $service): \Illuminate\Http\JsonResponse
    {
        $request_id = $service->send($request);
        return $this->returnData("request_id",$request_id);
    }

    public function check(CheckVonageCodeRequest $request,VonageService $service): \Illuminate\Http\JsonResponse
    {
        return $service->check($request);
    }
}
