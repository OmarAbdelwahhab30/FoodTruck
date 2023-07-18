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
        ]);
        if ($content){
            return true;
        }
        return false;
    }
}
