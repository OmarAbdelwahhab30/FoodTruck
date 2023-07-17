<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\OTP\CheckVonageCodeRequest;
use App\Http\Requests\OTP\SendVonageCodeRequest;
use App\Services\Auth\OTP\VonageService;
use Illuminate\Http\Request;

class SMSController extends Controller
{

    public function send(SendVonageCodeRequest $request,VonageService $service)
    {
        $request_id = $service->send($request);
        return $this->returnSuccessMessage("Started verification, `request_id` is " . $request_id);
    }

    public function check(CheckVonageCodeRequest $request,VonageService $service)
    {
        return $service->check($request);
    }
}
