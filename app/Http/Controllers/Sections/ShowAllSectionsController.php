<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\food_types\ShowTruckSectionsRequest;
use App\Services\Sections\ShowAllSectionsService;
use Illuminate\Support\Facades\Gate;

class ShowAllSectionsController extends Controller
{
   public function GetAllSectionInsideEachTruckByID(ShowTruckSectionsRequest $request,ShowAllSectionsService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("get-truck-sections")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $Sections = $service->GetAllSectionInsideEachTruckByID($request);
        if (!empty($Sections)){
            return $this->returnData("Sections",$Sections,__("responses.Here are All Section inside this truck."));
        }
        return $this->returnError(__("responses.There is no sections to show"));
    }
}
