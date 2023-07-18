<?php

namespace App\Http\Controllers\ContactUs;

use App\Http\Controllers\Controller;
use App\Services\ContactUs\ContactUsService;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{


    public function AddContactUsContent(Request $request,ContactUsService $service): \Illuminate\Http\JsonResponse
    {
        $done = $service->AddContactUsContent($request);
        if ($done){
            return $this->returnSuccessMessage("Your Message has been added successfully");
        }
        return $this->returnError("Some thing went wrong ,try again later");
    }
}
