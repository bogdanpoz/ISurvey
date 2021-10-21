<?php

use Illuminate\Database\Seeder;
use App\Models\Response;

class ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1, 10) as $attendeeId) {
            foreach(range(1, 10) as $questionId) {
                $response = [
                    'attendee_id' => $attendeeId,
                    'survey_id' => 1,
                    'question_id' => $questionId,
                ];

                if($questionId == 1) {
                    $response['response'] = $faker->randomElement(['Good', 'Bad', 'Nothing']);
                }

                if($questionId == 2) {
                    $response['response'] = $faker->phoneNumber;
                }

                if($questionId == 3) {
                    $response['response'] = $faker->companyEmail;
                }

                if($questionId == 4) {
                    $response['response'] = $faker->sentence(5);
                }

                if($questionId == 5) {
                    $response['response'] = $faker->sentence(25);
                }

                if($questionId == 6) {
                    $response['response'] = $faker->randomElement(['Yes', 'No']);
                }

                if($questionId == 7) {
                    $response['response'] = $faker->randomElement([1, 2, 3, 4, 5]);
                }

                if($questionId == 8) {
                    $response['response'] = $faker->date();
                }

                if($questionId == 9) {
                    $response['response'] = $faker->randomNumber(3);
                }

                if($questionId == 10) {
                    $response['response'] = $faker->randomElement(['Kiran', 'Mahroof', 'Jose']);
                }

                Response::create($response);
            }
        }
    }
}
