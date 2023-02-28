<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $inserts = [];
        for ($i = 1; $i <= 15; $i++) {
            $inserts[] = [
                'title' => $faker->sentence(5),
                'content' => $faker->paragraph(5),
                'date' => $faker->date(),
                'category_id' => rand(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('posts')->insert($inserts);
    }
}
