<?php

namespace App\Services\Reviews;

use App\Models\Review;
use App\Models\User;
use App\Services\Service;

class GetProfileReviewsService extends Service
{

    public function AllProfileReviews(): \Illuminate\Database\Eloquent\Collection|array
    {
        $user = auth("sanctum")->user();
        return User::with(
            [
                "reviews" => function($q)
                {
                    $q->with("toWhom",function ($qq){
                        $qq->with("truck",function ($qqq){
                            $qqq->with("images");
                        });
                    })->select("*");
                }
        ]
        )->where("id",$user->id)->get();
    }
}
