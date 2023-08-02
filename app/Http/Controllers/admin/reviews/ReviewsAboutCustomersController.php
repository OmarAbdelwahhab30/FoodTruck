<?php

namespace App\Http\Controllers\admin\reviews;

use App\Http\Controllers\Controller;

class ReviewsAboutCustomersController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        return view("admin.reviews.customers-reviews");
    }
}
