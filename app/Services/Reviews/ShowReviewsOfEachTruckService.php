<?php

namespace App\Services\Reviews;

use App\Models\Review;
use App\Models\Truck;
use App\Services\Service;

class ShowReviewsOfEachTruckService extends Service
{
    public function GetTruckReviewsByID($truck_id)
    {
        $user_id = Truck::find($truck_id)->user_id;
        return Review::where("role_id","1")->where("to",$user_id)->with("user" , function ($q){
           $q->select("name","id","image");
        })->select("review","rate","user_id","id")->get();
    }
}
