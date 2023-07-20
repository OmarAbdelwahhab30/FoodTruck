<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Services\Reviews\GetProfileReviewsService;
use Illuminate\Http\Request;

class AllProfileReviewsController extends Controller
{

    public function AllProfileReviews(GetProfileReviewsService $service): \Illuminate\Http\JsonResponse
    {
        $reviews = $service->AllProfileReviews();
        if ($reviews){
            return $this->returnData("reviews",$reviews,"Here are all reviews.");
        }
        return $this->returnError("Something Went Wrong");
    }

}
