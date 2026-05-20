<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Comunicazioni',   'slug' => 'comunicazioni'],
            ['name' => 'Eventi',          'slug' => 'eventi'],
            ['name' => 'Approfondimenti', 'slug' => 'approfondimenti'],
        ];

        foreach ($categories as $cat) {
            NewsCategory::firstOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
