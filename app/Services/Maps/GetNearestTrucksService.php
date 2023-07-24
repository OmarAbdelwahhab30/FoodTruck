<?php

namespace App\Services\Maps;

use App\Services\Service;
use Illuminate\Support\Facades\DB;

class GetNearestTrucksService extends Service
{
    public function GetNearestTrucks($request)
    {
        $latitude = auth("sanctum")->user()->latitude;
        $longitude = auth("sanctum")->user()->longitude;

        return DB::table("users")
            ->select("users.id"
                ,DB::raw("55555 * acos(cos(radians(" . $latitude . "))
                * cos(radians(users.latitude))
                * cos(radians(users.longitude) - radians(" . $longitude . "))
                + sin(radians(" .$latitude. "))
                * sin(radians(users.latitude))) AS distance"))
            ->groupBy("users.id")
            ->get();

    }
}
