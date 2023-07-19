<?php

namespace App\Services\Reviews;

use App\Models\Review;
use App\Models\User;
use App\Services\Service;

class GetProfileReviewsService extends Service
{

    public function AllProfileReviews()
    {
        $user = auth("sanctum")->user();
        return $user->reviews;
    }
}
