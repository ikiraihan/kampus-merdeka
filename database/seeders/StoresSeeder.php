<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $faker = \Faker\Factory::create();
    for ($i = 0; $i < 10; $i++) {
        DB::table('stores')->insert([
            'user_id'    => rand(1,10),
            'name'      => $faker->company(),
            'created_at' => $created_at = now()->subDays(rand(1, 100)),
            'updated_at' => $created_at
        ]);
    }
}
}
