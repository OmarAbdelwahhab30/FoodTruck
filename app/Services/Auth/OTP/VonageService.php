<?php

namespace App\Services\Auth\OTP;


use App\Services\Service;
use Vonage\Client\Exception\Exception;

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
        try {
            $result = new \Vonage\Verify\Request($request->to, "FoodTruck");
            $response = $this->client->verify()->start($result);
        }catch (Exception $exception){
            return [
                'status' => $exception->getCode(),
                'message'   => $exception->getMessage(),
            ];
        }
        return [
            'status'    => 200,
            'request_id'    => $response->getRequestId(),
        ];
    }

    public function check($request)
    {
        try {
            $this->client->verify()->check($request->request_id, $request->code);
        }catch (Exception $exception){
            $arr =  [
                'status' => $exception->getCode(),
                'message'   => $exception->getMessage(),
            ];
            return $this->returnCustomResponse($arr);
        }
        return $this->returnSuccessMessage("Verified");

    }

    public function cancel($request)
    {
        try {
            $this->client->verify()->cancel($request->request_id);
        }catch (Exception $exception){
            $arr =  [
                'status' => $exception->getCode(),
                'message'   => $exception->getMessage(),
            ];
            return $this->returnCustomResponse($arr);
        }
        return $this->returnSuccessMessage("Cancelled");
    }
}
