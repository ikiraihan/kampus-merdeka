<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->insert([
            [
                'user_id'    => rand(1,6),
                'title'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit',
                'body'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum aut magnam, quod dolore voluptas corporis incidunt eum neque eaque voluptatem officiis et labore nemo quos deleniti rem optio! Minus, excepturi!',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id'    => rand(1,6),
                'title'      => 'Lorem ipsum',
                'body'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum aut magnam, quod dolore voluptas corporis incidunt eum neque eaque voluptatem officiis et labore nemo quos deleniti rem optio! Minus, excepturi!',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
