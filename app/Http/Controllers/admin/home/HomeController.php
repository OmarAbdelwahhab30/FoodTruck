<?php

namespace App\Http\Controllers\admin\home;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Review;
use App\Models\Role;
use App\Models\Truck;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {
        $customers = User::where("role_id",Role::ROLE_CUSTOMER)->orderBy('id', 'ASC')->latest()->take(5)->get();
        $trucks    = Truck::orderBy('id', 'ASC')->latest()->take(5)->get();
        $transactions = Payment::orderBy('id', 'ASC')->latest()->take(5)->get();
        $trucks_count = Truck::count();
        $reviews_count = Review::count();
        $orders_count = Order::count();
        $customers_count = User::where("role_id",Role::ROLE_CUSTOMER)->count();
        return view("admin.home")->with(compact(['customers','trucks','transactions','trucks_count','reviews_count','orders_count','customers_count']));
    }

}
