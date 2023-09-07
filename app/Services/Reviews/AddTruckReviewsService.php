<?php

namespace App\Services\Reviews;

use App\Abstracts\Notification;
use App\Http\Controllers\Controller;
use App\Http\Requests\Reviews\TruckReviewsRequest;
use App\Models\Review;
use App\Models\Truck;
use App\Models\User;
use App\Services\Service;
use App\Traits\PushNotificationTrait;
use Illuminate\Http\Request;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Exception\MessagingException;

class AddTruckReviewsService extends Service
{
    use PushNotificationTrait;


    /**
     * @throws MessagingException
     * @throws FirebaseException
     */
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
            $seller = $this->GetSeller($request->to);
            $this->PushNotification(
                $seller->device_token,
                Notification::REVIEW,
                $request->to,
                $user->id,
                $user->name);
            if ($review){
                return true;
            }
        }
        return false;
    }
    private function GetSeller($sellerID)
    {
        return User::find($sellerID);
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
        $total_rate = $truck->rate + $CurrentRate / Review::where("to", $IdOfTruckOwner)->count() + 1;
        $truck->rate = $total_rate;
        $truck->save();
    }

}

