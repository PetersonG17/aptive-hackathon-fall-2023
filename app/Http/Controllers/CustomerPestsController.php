<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerPestsController extends Controller
{
    public function submit(Request $request)
    {
        $notes = $request->input("notes");

        $pestsAndLocations = $this->parseJohnsNonesenseIntoUsableArray($request);

        $appointment = new Appointment([
            'customer_id' => 1,
            'scheduled_for' => Carbon::now()->addHours(5),
            'pests' => json_encode($pestsAndLocations),
            'note' => $notes
        ]);

        $appointment->save();

        return view('customer.confirm', [
            'pests' => $pestsAndLocations,
        ]);
    }

    private function parseJohnsNonesenseIntoUsableArray(Request $request): array
    {
        $usableArray = [];
        $rowNumber = 0;
        $row = $this->parseSingleNonsenseRow($request, $rowNumber);

        while($row !== null) {
            $usableArray[] = $row;
            $rowNumber++;
            $row = $this->parseSingleNonsenseRow($request, $rowNumber);
        }

        return $usableArray;
    }
    

    private function parseSingleNonsenseRow(Request $request, int $index)
    {
        $location = $request->input('location-'.$index);
        $pest = $request->input('pest-'.$index);
        $reoccurring = $request->input('recurring-'.$index, false);

        if($location === null && $pest === null){
            return null;
        }

        return ['pest' => $pest, 'location' => $location, 'reoccuring' => $reoccurring];
    }
}
