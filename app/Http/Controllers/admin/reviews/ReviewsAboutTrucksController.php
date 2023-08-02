<?php

namespace App\Http\Controllers\admin\reviews;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Role;

class ReviewsAboutTrucksController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $reviews = Review::where("role_id",Role::ROLE_CUSTOMER)->OrderBy("created_at","ASC")->paginate(10);
        //dd($reviews);
        return view("admin.reviews.trucks-reviews")->with(compact("reviews"));
    }
}
