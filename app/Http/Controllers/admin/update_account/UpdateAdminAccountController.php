<?php

namespace App\Http\Controllers\admin\update_account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateAdminAccountController extends Controller
{

    public function index()
    {
        return view("admin.add_admins.add-admin");
    }
}
