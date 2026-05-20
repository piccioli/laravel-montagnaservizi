<?php

namespace Database\Seeders;

use App\Models\GovernanceMember;
use Illuminate\Database\Seeder;

class GovernanceMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name'         => 'Nome Cognome',
                'role'         => 'Presidente',
                'bio'          => null,
                'mandate_info' => 'Triennio 2024–2027',
                'sort_order'   => 1,
                'is_active'    => true,
            ],
            [
                'name'         => 'Nome Cognome',
                'role'         => 'Vice Presidente',
                'bio'          => null,
                'mandate_info' => 'Triennio 2024–2027',
                'sort_order'   => 2,
                'is_active'    => true,
            ],
            [
                'name'         => 'Nome Cognome',
                'role'         => 'Consigliere',
                'bio'          => null,
                'mandate_info' => 'Triennio 2024–2027',
                'sort_order'   => 3,
                'is_active'    => true,
            ],
        ];

        foreach ($members as $member) {
            GovernanceMember::firstOrCreate(
                ['role' => $member['role'], 'sort_order' => $member['sort_order']],
                $member
            );
        }
    }
}
