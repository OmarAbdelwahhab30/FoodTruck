<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReturnAboutController extends Controller
{


    public function returnAbout(): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('return-aboutUs')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $about = About::first();
        if ($about) {
            return $this->returnData("About",$about,"");
        }
        return $this->returnError("No information to show");
    }
}
