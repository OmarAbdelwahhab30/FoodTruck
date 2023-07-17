<?php

namespace App\Services\Trucks;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use App\Services\Service;
use Illuminate\Http\Request;

class ShowReviewsOfEachTruckService extends Service
{
    public function GetTruckReviewsByID($truck_id)
    {
        return Truck::find($truck_id)->review;
    }
}
