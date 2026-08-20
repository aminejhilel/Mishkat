<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Surah;
use App\Models\Ayah;

class QuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Fetching Surahs from Alquran.cloud...');
        $response = Http::get('http://api.alquran.cloud/v1/surah');
        
        if ($response->successful()) {
            $surahs = $response->json()['data'];
            
            foreach ($surahs as $surahData) {
                Surah::updateOrCreate(
                    ['number' => $surahData['number']],
                    [
                        'name' => [
                            'ar' => $surahData['name'],
                            'en' => $surahData['englishName'],
                            'fr' => $surahData['englishNameTranslation'], // Using English translation as fallback for now
                        ],
                        'revelation_type' => $surahData['revelationType'],
                        'number_of_ayahs' => $surahData['numberOfAyahs'],
                    ]
                );
            }
            $this->command->info('Surahs seeded successfully!');
        } else {
            $this->command->error('Failed to fetch from API.');
        }

        $this->command->info('Fetching Ayahs for Surahs 2 to 9 (covers Juz 2 to 10)...');
        for ($i = 2; $i <= 9; $i++) {
            $this->command->info("Fetching Ayahs for Surah $i...");
            try {
                $response = Http::timeout(30)->retry(3, 1000)->get("http://api.alquran.cloud/v1/surah/$i/editions/quran-uthmani,en.asad,fr.hamidullah,ar.alafasy");
                
                if ($response->successful()) {
                    $editions = $response->json()['data'];
                    $arEd = $editions[0];
                    $enEd = $editions[1];
                    $frEd = $editions[2];
                    $audioEd = $editions[3];
                    
                    $surah = Surah::where('number', $i)->first();
                    if (!$surah) continue;
                    
                    foreach ($arEd['ayahs'] as $index => $ayahData) {
                        Ayah::updateOrCreate(
                            [
                                'surah_id' => $surah->id,
                                'number_in_surah' => $ayahData['numberInSurah']
                            ],
                            [
                                'text' => [
                                    'ar' => $ayahData['text'],
                                    'en' => $enEd['ayahs'][$index]['text'] ?? '',
                                    'fr' => $frEd['ayahs'][$index]['text'] ?? '',
                                ],
                                'audio_url' => $audioEd['ayahs'][$index]['audio'] ?? null,
                            ]
                        );
                    }
                } else {
                    $this->command->error("Failed to fetch Ayahs for Surah $i. API responded with an error.");
                }
            } catch (\Exception $e) {
                $this->command->error("Error fetching Ayahs for Surah $i: " . $e->getMessage());
            }
        }
        $this->command->info('Ayahs for Surahs 2 to 9 (Juz 2 to 10) seeded successfully!');
    }
}
