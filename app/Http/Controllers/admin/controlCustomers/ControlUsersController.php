<?php

namespace App\Http\Controllers\admin\controlCustomers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SearchCustomerRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ControlUsersController extends Controller
{

    public function index()
    {
        $users = User::where("role_id", "<>", Role::ROLE_ADMINISTRATOR)->paginate(5);
        return view("admin.control-customers.index", compact("users"));
    }

    public function search_index()
    {
        return view("admin.control-customers.result");
    }

    public function search(SearchCustomerRequest $request)
    {
        $users = User::where("phone", 'like', '%' . $request->phone . '%')->get();
        if ($users != null) {
            return redirect()->to(LaravelLocalization::getCurrentLocale() . "/admin/searchIndex")->with('users', $users);
        }
        return redirect()->back()->with("error", "Invalid Inputs.");
    }

    public function changeAccountState($MemberID)
    {

        $user = User::find($MemberID);
        $user->active = !$user->active;
        $user->save();
        return redirect()->to(LaravelLocalization::getCurrentLocale() . "/admin/searchIndex")->with('user', $user)->with("success", "The action done successfully.");
    }

    public function deleteUser($user_id)
    {
        $user = User::find($user_id);
        $deleted = DB::transaction(function ($q) use ($user) {
            $this->DeleteFile($user->image);
            return $user->delete();
        });
        if ($deleted) {
            return redirect()->back()->with("success", __("admin.User has been deleted successfully"));
        }
        return redirect()->back()->with("error", __("admin.Something went wrong try again later"));
    }
}
