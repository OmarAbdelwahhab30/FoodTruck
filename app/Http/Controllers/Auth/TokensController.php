<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Socialite\Facades\Socialite;

class TokensController
{
use HasApiTokens;


    public function socialLogin(Request $request)
    {
        $provider = "facebook"; // or $request->input('provider_name') for multiple providers
        $token = $request->input('access_token');
        // get the provider's user. (In the provider server)
        $providerUser = Socialite::driver($provider)->userFromToken($token);
        // check if access token exists etc..
        // search for a user in our server with the specified provider id and provider name
        $user = User::where('provider_name', $provider)->where('provider_id', $providerUser->id)->first();
        // if there is no record with these data, create a new user
        if($user == null){
            $user = User::create([
                'provider_name' => $provider,
                'provider_id' => $providerUser->id,
            ]);
        }
        // create a token for the user, so they can login
        $token = $user->createToken(env('APP_NAME'))->accessToken;
        // return the token for usage
        return response()->json([
            'success' => true,
            'token' => $token
        ]);
    }
}
