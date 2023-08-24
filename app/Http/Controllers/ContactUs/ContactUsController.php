<?php

namespace App\Http\Controllers\ContactUs;

use App\Http\Controllers\Controller;
use App\Services\ContactUs\ContactUsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContactUsController extends Controller
{


    public function AddContactUsContent(Request $request,ContactUsService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("add-contactus")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $done = $service->AddContactUsContent($request);
        if ($done){
            return $this->returnSuccessMessage(__("responses.Your Message has been added successfully"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
