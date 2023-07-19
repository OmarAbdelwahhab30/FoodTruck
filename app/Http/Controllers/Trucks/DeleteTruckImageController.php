<?php

namespace App\Http\Controllers\Trucks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trucks\deleteTruckImageRequest;
use App\Services\Trucks\UpdateTruckImageService;
use Illuminate\Http\Request;

class DeleteTruckImageController extends Controller
{

    public function DeleteTruckImage(deleteTruckImageRequest $request,UpdateTruckImageService $service): \Illuminate\Http\JsonResponse
    {
        $deleted  = $service->deleteImageByID($request->image_id);
        if($deleted){
            return $this->returnSuccessMessage("Truck Image has been deleted successfully");
        }
        return $this->returnError("some thing went wrong");
    }
}
