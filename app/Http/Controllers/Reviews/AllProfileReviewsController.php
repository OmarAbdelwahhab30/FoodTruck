<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Services\Reviews\GetProfileReviewsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AllProfileReviewsController extends Controller
{

    public function AllProfileReviews(GetProfileReviewsService $service): \Illuminate\Http\JsonResponse
    {
        if(!Gate::allows("get-profile-reviews")) {
            return $this->notAuthorized("You don't have the authorization on this action.");
        }
        $reviews = $service->AllProfileReviews();
        if ($reviews){
            return $this->returnData("reviews",$reviews,"Here are all reviews.");
        }
        return $this->returnError("Something Went Wrong");
    }

}
