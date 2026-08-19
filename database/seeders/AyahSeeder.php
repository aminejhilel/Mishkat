<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Surah;
use App\Models\Ayah;

class AyahSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Fetching Ayahs for Surah Al-Baqarah (Surah 2)...');
        
        $surahId = 2; // Al-Baqarah
        
        // Fetch Arabic Text
        $arabicResponse = Http::get("http://api.alquran.cloud/v1/surah/{$surahId}/quran-uthmani");
        // Fetch English Translation
        $englishResponse = Http::get("http://api.alquran.cloud/v1/surah/{$surahId}/en.asad");

        if ($arabicResponse->successful() && $englishResponse->successful()) {
            $arabicAyahs = $arabicResponse->json()['data']['ayahs'];
            $englishAyahs = $englishResponse->json()['data']['ayahs'];
            
            $surah = Surah::where('number', $surahId)->first();
            
            if (!$surah) {
                $this->command->error('Surah Al-Baqarah not found in DB. Run QuranSeeder first.');
                return;
            }

            foreach ($arabicAyahs as $index => $ayahData) {
                Ayah::updateOrCreate(
                    [
                        'surah_id' => $surah->id,
                        'number_in_surah' => $ayahData['numberInSurah']
                    ],
                    [
                        'text' => [
                            'ar' => $ayahData['text'],
                            'en' => $englishAyahs[$index]['text'] ?? null,
                        ],
                    ]
                );
            }
            $this->command->info('Ayahs for Surah Al-Baqarah seeded successfully!');
        } else {
            $this->command->error('Failed to fetch Ayahs from API.');
        }
    }
}
