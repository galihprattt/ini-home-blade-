<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('orders')->insert([
                'or_pd_id' => rand(1, 10),
                'or_us_id' => rand(1, 5),   
                'or_amount' => rand(1, 5),
                'created_at' => now(),      
                'updated_at' => now(),      
            ]);
        }
    }
}
