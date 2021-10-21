<?php

use Illuminate\Database\Seeder;
use App\Models\Attendee;

class AttendeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(0, 10) as $index) {
            Attendee::create([
                'uuid' => $faker->uuid,
                'survey_id' => $faker->randomElement([1, 2, 3, 4, 5]),
                'fingerprint' => $faker->randomNumber(5),
            ]);
        }
    }
}
