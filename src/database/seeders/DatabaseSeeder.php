<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            InitialDataSeeder::class,
            AdminUserSeeder::class,
            NewsCategorySeeder::class,
            NewsSeeder::class,
            NewsDemoSeeder::class,
            ServiceSeeder::class,
            TeamMemberSeeder::class,
            GovernanceMemberSeeder::class,
        ]);
    }
}
