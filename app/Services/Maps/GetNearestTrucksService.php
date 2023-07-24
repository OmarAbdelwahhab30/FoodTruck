<?php

namespace App\Services\Maps;

use App\Models\User;
use App\Services\Service;
use Illuminate\Support\Facades\DB;

class GetNearestTrucksService extends Service
{
    public function GetNearestTrucks()
    {
        if (!$this->IsUserLocationAvailable()){
            return false;
        }
        $latitude = auth("sanctum")->user()->latitude;
        $longitude = auth("sanctum")->user()->longitude;

        $radius = 2000;

        return User::where("role_id", 2)
            ->with("truck","truck.images")
            ->withinRadius($latitude, $longitude, $radius)
            ->get();

    }

    private function IsUserLocationAvailable(): bool
    {
        $latitude = auth("sanctum")->user()->latitude;
        $longitude = auth("sanctum")->user()->longitude;

        if ($longitude == null || $latitude == null){
            return false;
        }
        return true;
    }
}
