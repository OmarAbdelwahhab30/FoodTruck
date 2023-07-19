<?php

namespace App\Services\Reviews;

use App\Models\Review;

class GetAllTrucksReviewsService
{

    public function GetTrucksReviews()
    {
        return Review::where("role_id",1)->get();
    }

    public function GetCustomersReviews()
    {
        return Review::where("role_id",2)->get();
    }
}
