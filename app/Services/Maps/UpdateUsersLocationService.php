<?php

namespace App\Services\Maps;

use App\Http\Controllers\Controller;
use App\Http\Requests\Maps\EnterLocationRequest;
use App\Services\Maps\SetUsersLocationService;
use App\Services\Service;
use Illuminate\Support\Facades\Gate;

class UpdateUsersLocationService extends Service
{


    public function UpdateLocation(EnterLocationRequest $request,SetUsersLocationService $service): \Illuminate\Http\JsonResponse
    {

    }
}
