<?php

namespace App\Http\Controllers\admin\terms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TermsRequest;
use App\Models\Terms;

class TermsController extends Controller
{

    public function index()
    {
        $terms = Terms::first();
        return view("admin.terms.terms",compact("terms"));
    }

    public function PostTerms(TermsRequest $request): \Illuminate\Http\RedirectResponse
    {

        //dd($request);
        $item = Terms::orderBy('id', 'ASC')->first();
        $item?->delete();
        $added = Terms::create($request->validated());
        if ($added){
            return redirect()->back()->with("success",__("admin.Terms and Conditions content has been added successfully"));
        }
        return redirect()->back()->with("error",__("admin.Something went wrong try again later"));
    }
}
