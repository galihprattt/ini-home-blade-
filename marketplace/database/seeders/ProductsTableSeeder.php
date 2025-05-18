<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('products')->insert([
                'pd_code' => 'PRD' . str_pad($i, 4, '0', STR_PAD_LEFT), // PRD0001, PRD0002, dst
                'pd_name' => $faker->unique()->word,
                'pd_price' => $faker->numberBetween(1000, 100000),
                'pd_ct_id' => $faker->numberBetween(1, 5), // pastikan kategori id 1-5 ada
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
