<?php

namespace App\Services\Sections;

use App\Http\Controllers\Controller;
use App\Models\Section;

class AddSectionService extends Controller
{

    public function addSection($request)
    {
        return Section::create([
            'type'  =>  $request->type,
            'truck_id'  => auth("sanctum")->user()->truck->id
        ]);
    }
}
