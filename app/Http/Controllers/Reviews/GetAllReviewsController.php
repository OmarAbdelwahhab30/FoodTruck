<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Services\Reviews\GetAllTrucksReviewsService;
use Illuminate\Http\Request;

class GetAllReviewsController extends Controller
{

    public function GetTrucksReviews(GetAllTrucksReviewsService $service)
    {
        $reviews = $service->GetTrucksReviews();
        if ($reviews){
            return $this->returnData("Trucks_reviews",$reviews,"Here are all reviews.");
        }
        return $this->returnError("Something Went Wrong");
    }

    public function GetCustomersReviews(GetAllTrucksReviewsService $service)
    {
        $reviews = $service->GetCustomersReviews();
        if (!empty($reviews)){
            return $this->returnData("Customer_reviews",$reviews,"Here are all reviews.");
        }
        return $this->returnError("Something Went Wrong");
    }
}
