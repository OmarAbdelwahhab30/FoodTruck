<?php

namespace App\Http\Controllers\admin\controlCustomers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SearchCustomerRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class ControlCustomersController extends Controller
{

    public function index()
    {
        $customers = User::where("role_id", Role::ROLE_CUSTOMER)->paginate(5);
        return view("admin.control-customers.index", compact("customers"));
    }

    public function search_index()
    {
        return view("admin.control-customers.result");
    }

    public function search($phone)
    {
        $customer = User::where("phone", 'like', '%' . $phone . '%')->where("role_id", Role::ROLE_CUSTOMER)->first();
     dd($phone);
        if ($customer) {
            return view("admin.control-customers.result",compact('customer'));
        }
        return view("admin.control-customers.result")->with("error", "Something went wrong ,try again later .");
    }
}
