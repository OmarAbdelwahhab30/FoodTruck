<?php

namespace App\Http\Controllers\Auth\UpdateAccountInformation;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAccountInformation\UpdateAccountInformationRequest;
use App\Services\Auth\UpdateAccountInformation\UpdateAccountInformationService;

class UpdateAccountInformationController extends Controller
{

    public function UpdateAccountInformation(UpdateAccountInformationRequest $request,UpdateAccountInformationService $service): \Illuminate\Http\JsonResponse
    {
        $updated = $service->UpdateAccountInformation($request);
        if ($updated){
            return $this->returnData("UserData",auth("sanctum")->user(),"User Data has been updated successfully");
        }
        return $this->returnError("Some thing went wrong ,try again later");
    }
}
