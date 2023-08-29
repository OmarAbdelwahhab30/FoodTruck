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
            'latitude'  => number_format($request->latitude,6),
            'longitude' => number_format($request->longitude, 6),
        ]);
        if($updated) {
            auth("sanctum")->user()->latitude  = $request->latitude;
            auth("sanctum")->user()->longitude = $request->longitude;
            return [
                auth("sanctum")->user()->latitude  = $request->latitude,
                auth("sanctum")->user()->longitude = $request->longitude,
            ];
        }
        return false;
    }

}
