<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Surah;

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
    }
}
