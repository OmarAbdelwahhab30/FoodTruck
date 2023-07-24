<?php

namespace App\Http\Controllers\Trucks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trucks\deleteTruckImageRequest;
use App\Services\Trucks\UpdateTruckImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeleteTruckImageController extends Controller
{

    public function DeleteTruckImage(deleteTruckImageRequest $request,UpdateTruckImageService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("delete-truck-image")){
            return $this->notAuthorized("You don't have the authorization on this action.");
        }
        $deleted  = $service->deleteImageByID($request->image_id);
        if($deleted){
            return $this->returnSuccessMessage("Truck Image has been deleted successfully");
        }
        return $this->returnError("some thing went wrong");
    }
}
