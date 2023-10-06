<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerProfileController extends Controller
{
    public function view(Request $request)
    {
        // TODO: Pass all the info that we will need to populate the customer profile
        // TODO: List of appointments with pests and locations
        // TODO: List of most frequent pest issues and problem areas

        $customer  = Customer::find(1); // Hard coded customer ID of 1

        $appointments = Appointment::where('customer_id', 1)->get();

        return view('customer.profile', [
            'customer' => $customer,
            'appointments' => $appointments
        ]);
    }
}
