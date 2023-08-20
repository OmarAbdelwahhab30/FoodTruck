<?php

namespace App\Http\Controllers\admin\ownerPercentage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OwnerPercentageRequest;
use App\Models\Value;

class UpdateOwnerPercentageController extends Controller
{
    public function index()
    {
        return view("admin.owner-percentage.index");
    }

    public function update(OwnerPercentageRequest $request)
    {
        $first = Value::first();
        $first->owner_percentage  = $request->value;
        if ($first->save()){
            return redirect()->back()->with("success",__("admin.Owner Percentage Value Has Been Updated Successfully"));
        }
        return redirect()->back()->with("error",__("admin.Something went wrong try again later"));
    }
}
