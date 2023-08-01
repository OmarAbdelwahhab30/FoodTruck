<?php

namespace App\Http\Controllers\admin\about;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutUsRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index()
    {
        $about = About::first();
        return view("admin.about-us.about-us",compact("about"));
    }

    public function PostAbout(AboutUsRequest $request): \Illuminate\Http\RedirectResponse
    {

        //dd($request);
        $item = About::orderBy('id', 'ASC')->first();
        $item?->delete();
        $added = About::create($request->validated());
        if ($added){
            return redirect()->back()->with("success","About Us content has been added successfully.");
        }
        return redirect()->back()->with("error","Something went wrong try again later");
    }

    public function DeleteAbout()
    {

    }
}
