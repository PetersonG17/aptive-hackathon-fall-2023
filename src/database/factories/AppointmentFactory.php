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

    const PESTS = [
        'wasps',
        'ants',
        'termites',
        'flies',
        'roaches',
        'spiders'
    ];

    const LOCATIONS = [
        'backyard',
        'porch',
        'bedroom',
        'kitchen',
        'playset',
        'basement',
        'shed',
        'yard',
        'deck'
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::all()->random(1),
            'scheduled_for' => $this->faker->dateTimeThisYear(),
            'note' => "I am having problems with ants on my front porch and wasps nests on my playset in the back yard. My kitchen is also being eaten by termites and my mother in law brought bedbugs into the bedrooms my house.",
            'pests' => $this->generateRandomPestsArray()
        ];
    }

    private function generateRandomPestsArray(): array
    {
        $pests = [];

        for($i = 0; $i < rand(1, 7); $i++) {
            $pestKey = array_rand(self::PESTS, 1);
            $locationKey = array_rand(self::LOCATIONS, 1);

            $pests[] = [
                'pest' => self::PESTS[$pestKey],
                'location' => self::LOCATIONS[$locationKey],
                'recurring' => boolval(rand(0, 1))
            ];
        }

        return $pests;
    }
}
