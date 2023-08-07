<?php

namespace App\Http\Controllers\admin\SellerRequests;

class SellerRequestsController
{


    public function index()
    {
        return view("admin.seller-requests.index");
    }

    public function preview()
    {
        return view("admin.seller-requests.preview");
    }
}
