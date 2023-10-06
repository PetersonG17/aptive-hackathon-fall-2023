<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerPestsController extends Controller
{
    public function submit(Request $request)
    {
        $pests = $request->input('pests');
        $locations = $request->input('locations');

        // TODO: Send data to MySQL DB
        // TODO: Send data to influxDB

        return view('customer.confirm');
    }
}
