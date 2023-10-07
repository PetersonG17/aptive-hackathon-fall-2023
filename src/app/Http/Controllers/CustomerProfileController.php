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

        $appointments = Appointment::where('customer_id', 1)->orderBy('scheduled_for', 'DESC')->get();

        // summarize all the pest information for the profile
        $pestCounts = [];
        $locationCounts = [];
        foreach ($appointments as $appointment) {
            foreach ($appointment->pests as $pest) {

                if(isset($pestCounts[$pest['pest']])) {
                    $pestCounts[$pest['pest']] += 1;
                } else {
                    $pestCounts[$pest['pest']] = 1;
                }

                if(isset($locationCounts[$pest['location']])) {
                    $locationCounts[$pest['location']] += 1;
                } else {
                    $locationCounts[$pest['location']] = 1;
                }
            }
        }

        return view('customer.profile', [
            'customer' => $customer,
            'appointments' => $appointments,
            'chartData' => [
                'pestCounts' => $pestCounts,
                'locationCounts' => $locationCounts
            ]
        ]);
    }
}
