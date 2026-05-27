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
                'name'         => 'Alessio Piccioli',
                'role'         => 'Presidente',
                'bio'          => 'Alessio Piccioli coordina progetti legati a cartografia digitale, GIS, catasti sentieristici e piattaforme web per la gestione e valorizzazione del territorio montano. All\'interno del Club Alpino Italiano è stato Presidente della SOSEC e Presidente della Sezione CAI di Pisa per due mandati. Istruttore Nazionale di Scialpinismo e membro della Scuola Centrale di Scialpinismo del CAI. Laureato in Fisica con Dottorato di Ricerca in Astrofisica Particellare.',
                'photo'        => 'governance/gov-alessio-piccioli.webp',
                'mandate_info' => 'Triennio 2024–2027',
                'sort_order'   => 1,
                'is_active'    => true,
            ],
            [
                'name'         => 'Enrico Sala',
                'role'         => 'Consigliere',
                'bio'          => 'Laureato in Scienze Naturali, è Funzionario scientifico-tecnologico al Dipartimento di Bioscienze dell\'Università degli Studi di Milano, con competenze in GIS, cartografia tematica e botanica. Nel CAI ha ricoperto incarichi di rilievo: Presidente del Comitato Scientifico Lombardo, Presidente della Sezione di Como e Vicepresidente del CDR Lombardia. Consigliere di Montagna Servizi SCPA dal 2025.',
                'photo'        => 'governance/gov-enrico-sala.webp',
                'mandate_info' => 'Triennio 2024–2027',
                'sort_order'   => 2,
                'is_active'    => true,
            ],
            [
                'name'         => 'Massimo Bonati',
                'role'         => 'Consigliere',
                'bio'          => 'Massimo Bonati si occupa da oltre vent\'anni di progettazione europea, fundraising e gestione amministrativa di programmi pubblici, con consolidata esperienza nella Pubblica Amministrazione e nel Terzo Settore. Funzionario Amministrativo presso il Comune di Massa, ha ricoperto incarichi presso la Provincia della Spezia e svolto attività di consulenza e formazione in euro-progettazione per enti pubblici e associazioni. Membro del Consiglio di Amministrazione di Montagna Servizi SCPA dal 2025.',
                'photo'        => 'governance/gov-massimo-bonati.webp',
                'mandate_info' => 'Triennio 2024–2027',
                'sort_order'   => 3,
                'is_active'    => true,
            ],
        ];

        $keepNames = array_column($members, 'name');
        GovernanceMember::whereNotIn('name', $keepNames)->delete();

        foreach ($members as $member) {
            GovernanceMember::updateOrCreate(['name' => $member['name']], $member);
        }
    }
}
