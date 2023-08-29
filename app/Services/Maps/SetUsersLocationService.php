<?php

namespace App\Services\Maps;

use App\Models\User;
use App\Services\Service;

class SetUsersLocationService extends Service
{

    public function EnterLocation($request)
    {
        $user_id = auth("sanctum")->user()->id;
        $updated = User::where("id",$user_id)->update([
            'address'   => $request->address,
            'latitude'  => round($request->latitude,6),
            'longitude' => round($request->longitude, 6),
        ]);
        if($updated) {
            return [
                'address'   => $request->address,
                'latitude'  => round($request->latitude,6),
                'longitude' => round($request->longitude, 6),
            ];
        }
        return false;
    }

}
