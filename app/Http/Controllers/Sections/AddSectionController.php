<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\food_types\addSectionRequest;
use App\Services\Sections\AddSectionService;
use Illuminate\Support\Facades\Gate;

class AddSectionController extends Controller
{

    public function addSection(addSectionRequest $request,AddSectionService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("add-section")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $section = $service->addSection($request);
        if($section){
            return $this->returnData("Section",$section,__("responses.Food Type has been added successfully"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
