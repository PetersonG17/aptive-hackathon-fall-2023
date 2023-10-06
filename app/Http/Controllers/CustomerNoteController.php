<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerNoteController extends Controller
{
    public function submit(Request $request)
    {
        $notes = $request->input('notes');

        // TODO: All the logic for parsing the note then return the parsed data to a view that I will define

        return view('customer.pests', ['data' => 'some data here', 'notes' => $notes]);
    }
}
