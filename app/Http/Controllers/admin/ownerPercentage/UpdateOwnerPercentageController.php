<?php

namespace App\Http\Controllers\admin\ownerPercentage;

use App\Http\Controllers\Controller;

class UpdateOwnerPercentageController extends Controller
{
    public function index()
    {
        return view("admin.owner-percentage.index");
    }
}
