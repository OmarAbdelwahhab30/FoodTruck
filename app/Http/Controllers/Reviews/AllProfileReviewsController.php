<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Services\Reviews\GetProfileReviewsService;
use Illuminate\Support\Facades\Gate;

class AllProfileReviewsController extends Controller
{

    public function CustomerProfileReviews(GetProfileReviewsService $service): \Illuminate\Http\JsonResponse
    {
        if(!Gate::allows("get-profile-reviews")) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $reviews = $service->CustomerProfileReviews();
        if ($reviews){
            return $this->returnData("reviews",$reviews,__("responses.Here are all reviews."));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

    public function SellerProfileReviews(GetProfileReviewsService $service): \Illuminate\Http\JsonResponse
    {
        if(!Gate::allows("get-profile-reviews")) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $reviews = $service->SellerProfileReviews();
        if ($reviews){
            return $this->returnData("reviews",$reviews,__("responses.Here are all reviews."));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));    }


}
