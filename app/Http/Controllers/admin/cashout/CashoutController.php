<?php

namespace App\Http\Controllers\admin\cashout;

use App\Http\Controllers\Controller;
use App\Models\Request;

class CashoutController extends Controller
{


    public function index()
    {
        $requests = Request::all();
        return view("admin.cashout.index",compact('requests'));
    }
}
