<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reviews\CustomerReviewsRequest;
use App\Services\Reviews\AddCustomerReviewsService;
use Illuminate\Http\Request;

class AddCustomerReviewsController extends Controller
{
    public function AddCustomerReview(CustomerReviewsRequest $request,AddCustomerReviewsService $service): \Illuminate\Http\JsonResponse
    {
        $done = $service->AddCustomerReview($request);
        if ($done)
        {
            return $this->returnSuccessMessage("Review Has Been Added Successfully.");
        }
        return $this->returnError("Some Thing Went Wrong.");
    }
}
