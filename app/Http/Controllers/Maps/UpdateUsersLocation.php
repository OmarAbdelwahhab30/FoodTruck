<?php

namespace App\Http\Controllers\Maps;

use App\Http\Controllers\Controller;
use App\Http\Requests\Maps\EnterLocationRequest;
use App\Services\Maps\SetUsersLocationService;
use Illuminate\Support\Facades\Gate;

class UpdateUsersLocation extends Controller
{


    public function UpdateLocation(EnterLocationRequest $request,SetUsersLocationService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("enter-location")){
            return $this->notAuthorized("You don't have the authorization on this action.");
        }
        $entered = $service->UpdateLocation($request);
        if ($entered)
        {
            return $this->returnSuccessMessage("Location has been updated successfully");
        }
        return $this->returnError("Something went wrong,try again later");
    }
}
