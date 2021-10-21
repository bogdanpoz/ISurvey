<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            $user = User::create([
                'name' => $faker->firstName,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'plan_id' => 1,
            ]);

            $user->assignRole('company');
        }
    }
}
