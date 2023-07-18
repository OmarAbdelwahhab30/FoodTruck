<?php

namespace App\Services\Auth\OTP;


use App\Services\Service;

class VonageService extends Service
{

    private \Vonage\Client\Credentials\Basic $basic;
    private \Vonage\Client $client;

    public function __construct()
    {
        $this->basic  = new \Vonage\Client\Credentials\Basic(env("VONAGE_KEY"), env("VONAGE_SECRET"));
        $this->client = new \Vonage\Client($this->basic);
    }

    public function send($request)
    {
        $result = new \Vonage\Verify\Request($request->to, "FoodTruck");
        $response = $this->client->verify()->start($result);
        return $response->getRequestId();
    }

    public function check($request)
    {
        $result = $this->client->verify()->check($request->request_id, $request->code);
        if ($result){
            return $this->returnSuccessMessage("Verified");
        }
        return $this->returnError("not verified");
    }
}
