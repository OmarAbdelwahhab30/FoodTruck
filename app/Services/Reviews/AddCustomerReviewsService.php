<?php

namespace App\Services\Reviews;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
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
            'to'        => $request->customer_id,
            'user_id'   => $user->id,
            'role_id'   => 2,
        ]);
        $customer = $this->getCustomer($request->customer_id);
        //$this->PushNotification($customer->player_id,7,$request->customer_id,$user->name);
        if ($review){
           return true;
        }
        return false;
    }

    public function getCustomer($customer_id)
    {
        return User::find($customer_id);
    }
}
