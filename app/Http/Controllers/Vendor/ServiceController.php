<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function bookingList()
    {
        return view('vendor-views.service.booking-list');
    }

    public function category()
    {
        return view('vendor-views.service.category-list');
    }
}
