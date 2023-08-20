<?php

namespace App\Services\notifications;

use App\Models\User;

class SetDeviceTokenService extends \App\Services\Service
{
    public function SetDeviceToken($request): bool
    {
        $user = User::find(auth("sanctum")->user()->id);
        $user->device_token = $request->device_token;
        if($user->save()){
            return true;
        }
        return false;
    }
}
