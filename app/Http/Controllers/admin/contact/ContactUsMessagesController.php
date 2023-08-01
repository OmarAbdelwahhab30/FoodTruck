<?php

namespace App\Http\Controllers\admin\contact;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Carbon\Carbon;

class ContactUsMessagesController extends Controller
{
    public function index()
    {
        $date = Carbon::today()->subDays(5);
        $messages = ContactUs::with("user")->where('created_at','>=',$date)->paginate(5);
        return view("admin.contact-us.customers-messages")->with(compact('messages'));
    }
}
