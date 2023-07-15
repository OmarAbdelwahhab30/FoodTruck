<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginService
{

    public function login($request)
    {

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)){
            $user = User::where("name",$request->name)->first();

            $user->token = $this->createToken($user);
            return $user;
        }
        return  false;
    }

    private function createToken(User $user){
        return $user->createToken("personal access token")->plainTextToken;
    }
}
