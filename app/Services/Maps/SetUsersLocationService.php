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

            'latitude'  => bcdiv($request->latitude, 1, 6),
            'longitude' => bcdiv($request->longitude, 1, 6),
        ]);
        if($updated) {
            return true;
        }
        return false;
    }

}
