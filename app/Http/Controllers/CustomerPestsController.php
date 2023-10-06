<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerPestsController extends Controller
{
    public function submit(Request $request)
    {
        // $pests = $request->input('pests');
        // $locations = $request->input('locations');
        // $notes = $request->input("notes");

        // $pestsAndLocations = [];

        // // TODO: Send data to MySQL DB

        // foreach($pests as $index => $pest) {
        //     $pestsAndLocations[] = ['name' => $pest, 'location' => $locations[$index]];
        // }

        // $appointment = new Appointment([
        //     'customer_id' => 1,
        //     'scheduled_for' => Carbon::now()->addHours(5),
        //     'pests' => json_encode($pestsAndLocations),
        //     'note' => $notes
        // ]);

        // $appointment->save();

        // TODO: Send data to influxDB

        // TODO: Send dynamic array of pests to the confirmation page for the appointment
        return view('customer.confirm', [
            'pests' => [
                ["pest" => "wasp", "location" => "playset"],
                ["pest" => "ants", "location" => "front porch"],
                ["pest" => "termites", "location" => "kitchen"],
                ["pest" => "bedbugs", "location" => "bedrooms"],
            ],
        ]);
    }
}
