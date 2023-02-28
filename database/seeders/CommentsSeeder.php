<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $inserts = [];
        for ($i = 1; $i <= 300; $i++) {
            $inserts[] = [
                'user_id' => rand(1, 10),
                'post_id' => rand(1, 15),
                'comment' => $faker->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        };

        DB::table('comments')->insert($inserts);
    }
}
