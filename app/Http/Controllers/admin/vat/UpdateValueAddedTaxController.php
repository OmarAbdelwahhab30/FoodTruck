<?php

namespace App\Http\Controllers\admin\vat;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\OwnerPercentageRequest;
use App\Http\Requests\Admin\VATRequest;
use App\Models\Value;

class UpdateValueAddedTaxController extends Controller
{
    public function index()
    {
        return view("admin.vat.index");
    }

    public function update(VATRequest $request)
    {
        $first = Value::first();
        $first->vat  = $request->value;
        if ($first->save()){
            return redirect()->back()->with("success",__("admin.Value Added Tax Has Been Updated Successfully"));
        }
        return redirect()->back()->with("error",__("admin.Something went wrong try again later"));
    }
}
