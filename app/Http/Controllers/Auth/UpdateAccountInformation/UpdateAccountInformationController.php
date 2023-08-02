<?php

namespace App\Http\Controllers\Auth\UpdateAccountInformation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\UpdateAccountInformation\UpdateAccountInformationRequest;
use App\Services\Auth\UpdateAccountInformation\UpdateAccountInformationService;
use Illuminate\Support\Facades\Gate;

class UpdateAccountInformationController extends Controller
{

    public function UpdateAccountInformation(UpdateAccountInformationRequest $request,UpdateAccountInformationService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('update-account-information')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $updated = $service->UpdateAccountInformation($request);
        if ($updated){
            return $this->returnData(__("UserData"),$updated,__("responses.User Data has been updated successfully"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

    public function ChangePassword(ChangePasswordRequest $request,UpdateAccountInformationService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('change-password')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $changed = $service->ChangePassword($request);
        if ($changed === false){
            return $this->returnError(__("responses.Current Password is not correct"));
        }
        return $this->returnSuccessMessage(__("responses.Password has been changed successfully"));
    }
}
