<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::all()->random(1),
            'scheduled_for' => $this->faker->date(),
            'note' => "I am having problems with ants on my front porch and wasps nests on my playset in the back yard. My kitchen is also being eaten by termites and my mother in law brought bedbugs into the bedrooms my house.",
            'pests' => [
                ["pest" => "wasp", "location" => "playset"],
                ["pest" => "ants", "location" => "front porch"],
                ["pest" => "termites", "location" => "kitchen"],
                ["pest" => "bedbugs", "location" => "bedrooms"],
            ],
        ];
    }
}
