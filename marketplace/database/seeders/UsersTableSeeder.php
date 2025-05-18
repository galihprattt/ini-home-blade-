<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 5; $i++){
            DB::table('users')->insert([
                'us_name' => $faker->name,
                'us_email'=> $faker->unique()-> safeEmail,
                'us_password'=> Hash::make('password'), 
                'us_phone_number'=> $faker->phonenumber,
                'us_address'=>$faker->address,
                'created_at'=> now(),
                'updated_at'=> now(),

            ]);
        }
    }
}
