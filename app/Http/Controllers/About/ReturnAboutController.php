<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class ReturnAboutController extends Controller
{


    public function returnAbout(): \Illuminate\Http\JsonResponse
    {
        $about = About::first();
        if ($about) {
            return $this->returnData("About",$about,"");
        }
        return $this->returnError("No information to show");
    }
}
