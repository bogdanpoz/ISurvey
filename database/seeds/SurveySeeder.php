<?php

use Illuminate\Database\Seeder;
use App\Models\Survey;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1, 10) as $index) {
            Survey::create([
                'user_id' => 1,
                'title' => $faker->firstName,
                'goodbye_text' => $faker->text(200),
                'visibility' => $faker->randomElement([1, 0]),
            ]);
        }
    }
}
