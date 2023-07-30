<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reviews\CustomerReviewsRequest;
use App\Services\Reviews\AddCustomerReviewsService;
use Illuminate\Support\Facades\Gate;

class AddCustomerReviewsController extends Controller
{
    public function AddCustomerReview(CustomerReviewsRequest $request,AddCustomerReviewsService $service): \Illuminate\Http\JsonResponse
    {
        if(!Gate::allows("add-customer-review")) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $done = $service->AddCustomerReview($request);
        if ($done)
        {
            return $this->returnSuccessMessage(__("responses.Review has been added successfully."));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));    }
}
