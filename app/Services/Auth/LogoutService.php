<?php

namespace App\Services\Auth;

use App\Services\Service;

class LogoutService extends Service
{
    public function logout($request){
        if ($request->user()->currentAccessToken()->delete()){
            return true;
        }
        return false;
    }
}
