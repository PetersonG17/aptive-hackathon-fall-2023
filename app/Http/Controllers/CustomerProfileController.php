<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerProfileController extends Controller
{
    public function view(Request $request)
    {
        // TODO: Pass all the info that we will need to populate the customer profile
        // TODO: List of appointments with pests and locations
        // TODO: List of most frequent pest issues and problem areas
        return view('customer.profile');
    }
}
