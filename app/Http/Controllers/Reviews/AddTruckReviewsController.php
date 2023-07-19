<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reviews\TruckReviewsRequest;
use App\Services\Reviews\AddTruckReviewsService;
use Illuminate\Http\Request;

class AddTruckReviewsController extends Controller
{


    public function AddTruckReview(TruckReviewsRequest $request,AddTruckReviewsService $service): \Illuminate\Http\JsonResponse
    {
        $done = $service->AddTruckReview($request);
        if ($done)
        {
            return $this->returnSuccessMessage("Review Has Been Added Successfully.");
        }
        return $this->returnError("Some Thing Went Wrong.");
    }
}
