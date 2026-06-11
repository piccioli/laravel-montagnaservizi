<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

/**
 * Copia il pacchetto di asset iniziali (initial-data-pack) da
 * database/seeders/initial-data/ a storage/app/public/
 * in modo che Storage::url() li possa servire.
 *
 * Deve girare prima dei seeder di contenuto (team, governance, news).
 */
class InitialDataSeeder extends Seeder
{
    private string $sourceBase;

    public function __construct()
    {
        $this->sourceBase = database_path('seeders/initial-data');
    }

    public function run(): void
    {
        $this->publishImages('img/team',       'team');
        $this->publishImages('img/governance', 'governance');
        $this->publishImages('img/news',       'news');
        $this->publishImages('img/hero',       'hero');
    }

    private function publishImages(string $sourceRelative, string $storageDir): void
    {
        $sourcePath = $this->sourceBase . '/' . $sourceRelative;

        if (! is_dir($sourcePath)) {
            return;
        }

        foreach (glob($sourcePath . '/*') as $file) {
            $filename = basename($file);
            $storagePath = $storageDir . '/' . $filename;

            if (! Storage::disk('public')->exists($storagePath)) {
                Storage::disk('public')->put(
                    $storagePath,
                    file_get_contents($file)
                );
            }
        }
    }
}
