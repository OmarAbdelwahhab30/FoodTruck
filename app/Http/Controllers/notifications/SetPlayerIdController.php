<?php

namespace App\Http\Controllers\notifications;

use App\Http\Controllers\Controller;
use App\Http\Requests\notifications\SetPlayerIdRequest;
use App\Services\notifications\SetPlayerIdService;
use Illuminate\Http\Request;

class SetPlayerIdController extends Controller
{

    public function setPlayerID(SetPlayerIdRequest $request,SetPlayerIdService $service): \Illuminate\Http\JsonResponse
    {
        $done = $service->setPlayerID($request);
        if ($done){
            return $this->returnSuccessMessage("Player ID has been updated successfully.");
        }
        return $this->returnError("Something went wrong!");
    }
}
