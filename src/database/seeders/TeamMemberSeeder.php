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
                'bio'        => 'Riccardo Bernasconi si occupa di processi amministrativi, segreteria a supporto delle commissioni centrali CAI e organizzazione di eventi. Membro del Consiglio Direttivo di GEA Piemonte, opera come guida ambientale escursionistica in collaborazione con Ossola Outdoor School. Laureato in Storia all\'Università degli Studi di Milano, ha conseguito un Master di II livello in Management dei Beni e delle Attività Culturali presso Ca\' Foscari di Venezia e ESCP di Parigi (doppio titolo italiano-francese).',
                'photo'      => 'team/team-riccardo-bernasconi.webp',
                'sort_order' => 1,
                'is_active'  => true,
            ],
            [
                'name'       => 'Mattia Bianchi',
                'role'       => 'Consulenze specialistiche e Veryfico',
                'bio'        => 'Mattia Bianchi si occupa della gestione amministrativa interna di Montagna Servizi e segue le consulenze specialistiche alle Sezioni CAI nell\'ambito del Terzo Settore. Coordina il lancio del software gestionale e contabile Veryfico alle Sezioni, mantenendo i rapporti con gli sviluppatori e fornendo consulenza di primo livello.',
                'photo'      => 'team/team-mattia-bianchi.webp',
                'sort_order' => 2,
                'is_active'  => true,
            ],
            [
                'name'       => 'Lorena Sava',
                'role'       => 'Segreteria Generale e Sentiero Italia CAI',
                'bio'        => 'Lorena Sava si occupa della Segreteria Generale di Montagna Servizi, con particolare riferimento alla gestione delle segreterie delle OTC e delle SO del Club Alpino Italiano, della segreteria del Sentiero Italia CAI e della Cineteca CAI. Gestisce documentazione, verbali, newsletter, raccolta dati e organizzazione di riunioni ed eventi, con competenze su Suite Google, Microsoft Office, Typeform, Brevo, Canva e WordPress.',
                'photo'      => 'team/team-lorena-sava.webp',
                'sort_order' => 3,
                'is_active'  => true,
            ],
            [
                'name'       => 'Sara Mariani',
                'role'       => 'Progettazione e fundraising',
                'bio'        => 'Sara Mariani si occupa di progettazione e coordinamento tecnico-amministrativo di progetti finanziati in ambito culturale, educativo, ambientale e sportivo, con particolare riferimento a bandi regionali, nazionali ed europei. Supporta la costruzione del partenariato, la redazione di proposte progettuali, la pianificazione delle attività, la gestione documentale e la rendicontazione. Coordina le relazioni istituzionali tra enti, associazioni e stakeholder territoriali.',
                'photo'      => 'team/team-sara-mariani.webp',
                'sort_order' => 4,
                'is_active'  => true,
            ],
            [
                'name'       => 'Eleonora Berti',
                'role'       => 'Sentiero Italia CAI e sviluppo europeo',
                'bio'        => 'Eleonora Berti supporta Montagna Servizi nelle attività di progettazione e sviluppo strategico legate al Sentiero Italia CAI, contribuendo al consolidamento delle iniziative territoriali promosse dai Gruppi Regionali e dalle Sezioni. Grazie alla sua esperienza internazionale nel campo degli itinerari culturali europei e della cooperazione territoriale, contribuisce all\'individuazione di opportunità di finanziamento e allo sviluppo di reti collaborative a livello nazionale ed europeo.',
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
