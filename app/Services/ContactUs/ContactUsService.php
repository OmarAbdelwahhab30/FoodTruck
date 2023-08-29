<?php

namespace App\Services\ContactUs;

use App\Models\ContactUs;
use App\Services\Service;

class ContactUsService extends Service
{

    public function AddContactUsContent($request): bool
    {
        $user_id = auth("sanctum")->user()->id;
        $content = ContactUs::create([
            'content'     => $request->content,
            'user_id'     => $user_id,
            'phone'       => $request->phone,
            'name'        => $request->name
        ]);
        if ($content){
            return true;
        }
        return false;
    }
}
