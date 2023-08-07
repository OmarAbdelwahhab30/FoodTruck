<?php

namespace App\Http\Controllers\admin\controlCustomers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SearchCustomerRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class ControlUsersController extends Controller
{

    public function index()
    {
        $users = User::paginate(5);
        return view("admin.control-customers.index", compact("users"));
    }

    public function search_index()
    {
        return view("admin.control-customers.result");
    }

    public function search(SearchCustomerRequest $request)
    {
        $user = User::where("phone", 'like', '%' . $request->phone . '%')->first();
        if ($user != null) {
            return redirect()->to("admin/searchIndex")->with('user',$user);
        }
        return redirect()->back()->with("error", "Invalid Inputs.");
    }

    public function changeAccountState($MemberID)
    {

        $user = User::find($MemberID);
        $user->active = !$user->active;
        $user->save();
        return redirect()->to("admin/searchIndex")->with('user',$user);
    }
}
