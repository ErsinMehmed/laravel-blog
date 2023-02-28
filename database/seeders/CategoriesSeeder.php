<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Novels'],
            ['name' => 'Drama'],
            ['name' => 'Adventurous'],
            ['name' => 'Travel'],
            ['name' => 'Sports'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([$category]);
        }
    }
}
