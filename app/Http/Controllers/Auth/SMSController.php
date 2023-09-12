<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\OTP\CancelVonageCodeRequest;
use App\Http\Requests\OTP\CheckVonageCodeRequest;
use App\Http\Requests\OTP\SendVonageCodeRequest;
use App\Services\Auth\OTP\VonageService;

class SMSController extends Controller
{

    public function send(SendVonageCodeRequest $request,VonageService $service): \Illuminate\Http\JsonResponse
    {
        $response = $service->send($request);
        return $this->returnCustomResponse($response);
    }

    public function check(CheckVonageCodeRequest $request,VonageService $service): \Illuminate\Http\JsonResponse
    {
        return $service->check($request);
    }

    public function cancel(CancelVonageCodeRequest $request,VonageService $service): \Illuminate\Http\JsonResponse
    {
        return $service->cancel($request);
    }
}
