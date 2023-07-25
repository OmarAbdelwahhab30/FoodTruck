<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\food_types\updateSectionRequest;
use App\Services\Sections\UpdateSectionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UpdateSectionController extends Controller
{

    public function updateSection(updateSectionRequest $request,UpdateSectionService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("update-section")){
            return $this->notAuthorized("You don't have the authorization on this action.");
        }
        $food_Type = $service->updateSection($request);
        if($food_Type){
            return $this->returnSuccessMessage("Food Type has been updated successfully");
        }
        return $this->returnError("some thing went wrong");
    }
}
