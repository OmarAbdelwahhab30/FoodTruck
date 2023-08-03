<?php

namespace App\Http\Controllers\Maps;

use App\Http\Controllers\Controller;
use App\Http\Requests\Maps\EnterLocationRequest;
use App\Services\Maps\SetUsersLocationService;
use Illuminate\Support\Facades\Gate;

class SetUsersLocationController extends Controller
{

    public function EnterLocation(EnterLocationRequest $request,SetUsersLocationService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("enter-location")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $entered = $service->EnterLocation($request);
        if ($entered)
        {
            return $this->returnData("UserData",auth("sanctum")->user(),__("responses.Location has been added successfully"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
