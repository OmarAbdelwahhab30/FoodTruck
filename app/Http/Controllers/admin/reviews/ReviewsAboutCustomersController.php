<?php

namespace App\Http\Controllers\admin\reviews;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Role;

class ReviewsAboutCustomersController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $reviews = Review::where("role_id",Role::ROLE_SELLER)->OrderBy("created_at","ASC")->paginate(10);
        return view("admin.reviews.customers-reviews")->with(compact('reviews'));
    }
}
