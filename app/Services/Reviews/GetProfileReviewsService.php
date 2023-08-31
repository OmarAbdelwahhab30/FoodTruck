<?php

namespace App\Services\Reviews;

use App\Models\Review;
use App\Models\User;
use App\Services\Service;

class GetProfileReviewsService extends Service
{

    public function CustomerProfileReviews(): \Illuminate\Database\Eloquent\Collection|array
    {
        $user = auth("sanctum")->user();
        return User::with(
            [
                "reviews" => function ($q) {
                    $q->with("toWhom", function ($qq) {
                        $qq->with("truck", function ($qqq) {
                            $qqq->with("images");
                        });
                    })->select("*");
                }
            ]
        )->where("id", $user->id)->get();
    }

    public function SellerProfileReviews(): \Illuminate\Database\Eloquent\Collection|array
    {
        $user = auth("sanctum")->user();
        return User::with(["ReviewsAboutMe" => function ($q) {
            $q->select("id","review", "rate", "to");
            $q->with("user", function ($qq) {
                $qq->select("name", "image", "id");
            });
        }])->select("id")->where("id", $user->id)->get();
    }

}
