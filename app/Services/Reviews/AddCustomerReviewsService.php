<?php

namespace App\Services\Reviews;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Services\Service;
use Illuminate\Http\Request;

class AddCustomerReviewsService extends Service
{

    public function AddCustomerReview($request)
    {
        $user = auth("sanctum")->user();
        $review = Review::create([
            'review'    => $request->review,
            'rate'      => $request->rate,
            'truck_id'  => $user->truck->id,
            'user_id'   => $request->customer_id,
            'role_id'   => 2,
        ]);
        if ($review){
           return true;
        }
        return false;
    }
}
