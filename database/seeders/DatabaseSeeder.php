<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $customer = Customer::updateOrCreate(
            [
                'first_name' => 'Bob',
                'last_name' => 'Johnson'
            ],
            ['id' => 1]
        );

        Appointment::factory()->count(5)->create(
            [
                'customer_id' => $customer->id
            ]
        );
    }
}
