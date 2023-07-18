<?php

namespace App\Services\Auth\OTP;

use App\Services\Service;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class VonageService extends Service
{

    private \Vonage\Client\Credentials\Basic $basic;


    /**
     * @throws ConfigurationException
     */
    public function __construct()
    {
        $this->token = getenv("TWILIO_AUTH_TOKEN");
        $this->twilio_sid = getenv("TWILIO_SID");
        $this->twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $this->twilio = new Client($this->twilio_sid, $this->token);

    }

    /**
     * @throws TwilioException
     */
    public function send($request)
    {
        try {
            $account_id = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
            $otp = rand(1000, 9999);
            $client = new Client($account_id, $auth_token);
            $client->messages->create("+20 1063620757", [
                'from' => $twilio_number,
                'body' => "Your verification code is " . $otp,
            ]);
        }catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * @throws TwilioException
     * @throws ConfigurationException
     */
    public function check($request)
    {
//        $code = rand(1111,9999);
//        $twilio = new Client($this->twilio_sid, $this->token);
//        $verification = $twilio->verify->v2->services($this->twilio_verify_sid)
//            ->verificationChecks
//            ->create($code, array('to' => $this->phone));
//
//        if ($verification->valid) {
//            return true;
//        }
//        return false;
//        $result = $this->client->verify()->check($request->request_id, $request->code);
//        if ($result){
//            return true;
//        }
//        return false;
    }
}
