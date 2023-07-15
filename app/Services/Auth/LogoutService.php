<?php

namespace App\Services\Auth;

class LogoutService
{
    public function logout($request){
        if ($request->user()->currentAccessToken()->delete()){
            return true;
        }
        return false;
    }
}
