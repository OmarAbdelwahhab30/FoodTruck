<?php

namespace App\Services\Maps;

use App\Models\User;
use App\Services\Service;

class SetUsersLocationService extends Service
{

    public function EnterLocation($request): bool
    {
        $user_id = auth("sanctum")->user()->id;
        $updated = User::where("id",$user_id)->update([
            'address'   => $request->address,
            'latitude'  => round($request->latitude,2),
            'longitude' => round($request->longitude,2),
        ]);
        if($updated) {
            return true;
        }
        return false;
    }

}
