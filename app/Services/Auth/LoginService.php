<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\Service;
use Illuminate\Support\Facades\Auth;

class LoginService extends Service
{

    public function login($request)
    {

        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials))
        {
            $user = User::where("phone",$request->phone)->first();
            $user->token = $this->createToken($user);
            if (isset($user->truck));
            if (isset($user->truck->images));
            return $user;
        }
        return  false;
    }

    private function createToken(User $user)
    {
        return $user->createToken("personal access token")->plainTextToken;
    }
}
