<?php

namespace App\Http\Controllers\admin\add_admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddAdminController extends Controller
{

    public function index()
    {
        return view("admin.add_admins.add-admin");
    }
}
