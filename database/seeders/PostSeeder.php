<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 2; $i++) {
            DB::table('posts')->insert([
                'user_id'    => rand(1,10),
                'title'      => $faker->text(8),
                'slug'      => $faker->text(8),
                'photo'      => $faker->text(10),
                'content'      => $faker->text(30) ,
                'created_at' => $created_at = now()->subDays(rand(1, 100)),
                'updated_at' => $created_at
            ]);
        }
    }
}
