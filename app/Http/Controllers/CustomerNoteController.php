<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerNoteController extends Controller
{
    public function submit(Request $request)
    {
        $notes = $request->input('notes');

        // TODO: All the logic for parsing the note then return the parsed data to a view that I will define

        // Placeholder of what I am expecting
        $parsedData = [
            "pests" => [
                ["pest" => "wasp", "location" => "eves"],
                ["pest" => "ants", "location" => "backyard"]
            ],
            "note" => "I have a wasp nest in my eves and a terrible ant problem in my backyard"
        ];

        return view('customer.pests', ['data' => $parsedData]);
    }
}
