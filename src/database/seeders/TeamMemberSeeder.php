<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name'       => 'Mario Rossi',
                'role'       => 'Responsabile Segreteria Operativa',
                'bio'        => 'Oltre 10 anni di esperienza nella gestione amministrativa di enti del terzo settore. Specializzato nella verbalizzazione e nella gestione documentale per le Sezioni CAI.',
                'sort_order' => 1,
                'is_active'  => true,
            ],
            [
                'name'       => 'Laura Bianchi',
                'role'       => 'Responsabile Comunicazione',
                'bio'        => 'Esperta di comunicazione istituzionale e digital marketing. Coordina i piani editoriali e le campagne social per le Sezioni CAI clienti.',
                'sort_order' => 2,
                'is_active'  => true,
            ],
            [
                'name'       => 'Giovanni Verdi',
                'role'       => 'Responsabile Contabilità Veryfico',
                'bio'        => 'Commercialista con specializzazione nel non profit. Gestisce la contabilità di oltre 20 Sezioni CAI con il software Veryfico.',
                'sort_order' => 3,
                'is_active'  => true,
            ],
            [
                'name'       => 'Sara Ferrari',
                'role'       => 'Responsabile Fundraising',
                'bio'        => 'Esperta di progettazione europea e raccolta fondi per enti culturali e sportivi. Coordina le attività di fundraising e la gestione dei bandi pubblici.',
                'sort_order' => 4,
                'is_active'  => true,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::firstOrCreate(['name' => $member['name']], $member);
        }
    }
}
