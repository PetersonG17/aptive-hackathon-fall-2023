<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerPestsController extends Controller
{
    public function submit(Request $request)
    {
        dd($request->all());

        // TODO: Send data to MySQL DB
        // TODO: Send data to influxDB

        // TODO: View for confirmation for the customer include link to customer profile page
    }
}
