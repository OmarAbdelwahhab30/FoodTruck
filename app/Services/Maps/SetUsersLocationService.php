<?php

namespace App\Services\Maps;

use App\Models\User;
use App\Services\Service;
use Illuminate\Http\Request;

class SetUsersLocationService extends Service
{

    public function EnterLocation($request): bool
    {
        $user_id = auth("sanctum")->user()->id;
        $user = User::find($user_id);
        $user->location  = $request->lcoation;
        $user->latitude  = $request->latitude;
        $user->longitude = $request->longitude;
        if ($user->save()) {
            return true;
        }
        return false;
    }
}
