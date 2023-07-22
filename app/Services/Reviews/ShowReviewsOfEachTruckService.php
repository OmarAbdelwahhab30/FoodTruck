<?php

namespace App\Services\Reviews;

use App\Models\Review;
use App\Models\Truck;
use App\Services\Service;

class ShowReviewsOfEachTruckService extends Service
{
    public function GetTruckReviewsByID($truck_id)
    {
        $vars = [];
        return Review::where("to",$truck_id)->with("user" , function ($q){
           $q->select("name","id","image");
        })->select("review","rate","user_id","id")->get();
    }
}
