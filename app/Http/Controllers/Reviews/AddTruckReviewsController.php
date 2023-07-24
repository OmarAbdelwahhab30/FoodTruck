<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reviews\TruckReviewsRequest;
use App\Services\Reviews\AddTruckReviewsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AddTruckReviewsController extends Controller
{

    public function AddTruckReview(TruckReviewsRequest $request,AddTruckReviewsService $service): \Illuminate\Http\JsonResponse
    {
        if(!Gate::allows("add-truck-review")) {
            return $this->notAuthorized("You don't have the authorization on this action.");
        }
        $done = $service->AddTruckReview($request);
        if ($done)
        {
            return $this->returnSuccessMessage("Review Has Been Added Successfully.");
        }
        return $this->returnError("Some Thing Went Wrong.");
    }
}
