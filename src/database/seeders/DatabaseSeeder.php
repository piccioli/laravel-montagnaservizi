<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            NewsCategorySeeder::class,
            NewsSeeder::class,
            ServiceSeeder::class,
            TeamMemberSeeder::class,
            GovernanceMemberSeeder::class,
        ]);
    }
}
