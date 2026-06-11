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
                'name'       => 'Riccardo Bernasconi',
                'role'       => 'Segreteria e gestione eventi',
                'bio'        => 'Si occupa di processi amministrativi, segreteria a supporto delle commissioni centrali CAI e organizzazione di eventi. Laureato in Storia (UniMI), Master in Management dei Beni Culturali a Ca\' Foscari — ESCP Parigi.',
                'photo'      => 'team/team-riccardo-bernasconi.webp',
                'sort_order' => 1,
                'is_active'  => true,
            ],
            [
                'name'       => 'Mattia Bianchi',
                'role'       => 'Consulenze specialistiche e Veryfico',
                'bio'        => 'Segue le consulenze specialistiche alle Sezioni CAI nell\'ambito del Terzo Settore e coordina l\'adozione della piattaforma gestionale Veryfico, fornendo supporto diretto alle Sezioni.',
                'photo'      => 'team/team-mattia-bianchi.webp',
                'sort_order' => 2,
                'is_active'  => true,
            ],
            [
                'name'       => 'Lorena Sava',
                'role'       => 'Segreteria Generale e Sentiero Italia CAI',
                'bio'        => 'Si occupa della Segreteria Generale di Montagna Servizi: segreterie CAI, Sentiero Italia e Cineteca CAI. Coordina documentazione, verbali, newsletter e organizzazione di riunioni ed eventi.',
                'photo'      => 'team/team-lorena-sava.webp',
                'sort_order' => 3,
                'is_active'  => true,
            ],
            [
                'name'       => 'Sara Mariani',
                'role'       => 'Progettazione e fundraising',
                'bio'        => 'Si occupa di progettazione e coordinamento di progetti finanziati in ambito culturale, educativo e ambientale. Supporta scrittura di proposte progettuali, pianificazione e rendicontazione per bandi regionali, nazionali ed europei.',
                'photo'      => 'team/team-sara-mariani.webp',
                'sort_order' => 4,
                'is_active'  => true,
            ],
            [
                'name'       => 'Eleonora Berti',
                'role'       => 'Sentiero Italia CAI e sviluppo europeo',
                'bio'        => 'Supporta le attività del Sentiero Italia CAI e lo sviluppo strategico dei Gruppi Regionali. Grazie all\'esperienza negli itinerari culturali europei, contribuisce all\'individuazione di opportunità di finanziamento e reti collaborative.',
                'photo'      => 'team/team-eleonora-berti.webp',
                'sort_order' => 5,
                'is_active'  => true,
            ],
        ];

        $keepNames = array_column($members, 'name');
        TeamMember::whereNotIn('name', $keepNames)->delete();

        foreach ($members as $member) {
            TeamMember::updateOrCreate(['name' => $member['name']], $member);
        }
    }
}
