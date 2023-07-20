<?php

namespace App\Services\Reviews;

use App\Models\Review;
use App\Models\Truck;
use App\Services\Service;

class ShowReviewsOfEachTruckService extends Service
{
    public function GetTruckReviewsByID($truck_id)
    {
        return Review::where("to",$truck_id)->get();
    }
}
