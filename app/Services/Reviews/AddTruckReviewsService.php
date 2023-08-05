<?php

namespace App\Services\Reviews;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reviews\TruckReviewsRequest;
use App\Models\Review;
use App\Models\Truck;
use App\Models\User;
use App\Services\Service;
use Illuminate\Http\Request;

class AddTruckReviewsService extends Service
{


    public function AddTruckReview($request): bool
    {
        $user = auth("sanctum")->user();
        if ($this->CheckUserTruck($user,$request->to) === true)
        {
            $review = Review::create([
                'review' => $request->review,
                'rate' => $request->rate,
                'to' => $request->to, // to whom user ?
                'user_id' => $user->id,
                'role_id' => 1,
            ]);
            $this->UpdateTruckRate($request->to,$request->rate);
            if ($review){
                return true;
            }
        }
        return false;
    }

    public function CheckUserTruck($user,$truck_id): bool
    {
        if ($user->role->id == 2 && $user->truck->id == $truck_id )
        {
            return false;
        }
        return true;
    }

    private function UpdateTruckRate($IdOfTruckOwner,$CurrentRate)
    {
        $truck = Truck::where("user_id",$IdOfTruckOwner)->first();
        $total_rate = ($truck->rate + $CurrentRate)/5;
        $truck->rate = $total_rate;
        $truck->save();
    }


}

