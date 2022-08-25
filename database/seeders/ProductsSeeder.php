<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 5; $i++) {
            DB::table('products')->insert([
                'store_id'    => rand(1,10),
                'name'      => $faker->text(5),
                'slug'      => $faker->safeEmailDomain(),
                'price'      => $faker->randomNumber(4),
                'description'      => $faker->text(50) ,
                'photo'      => $faker->text(50) ,
                'created_at' => $created_at = now()->subDays(rand(1, 100)),
                'updated_at' => $created_at
            ]);
        }
    }
}
