<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HadithCategory;
use App\Models\Hadith;

class HadithSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Seeding Hadith...');

        $categories = [
            [
                'name' => ['ar' => 'الأربعون النووية', 'en' => 'An-Nawawi 40 Hadith'],
                'description' => 'A collection of forty hadiths by Imam al-Nawawi.',
                'hadiths' => [
                    [
                        'text' => ['ar' => 'إِنَّمَا الأَعْمَالُ بِالنِّيَّاتِ، وَإِنَّمَا لِكُلِّ امْرِئٍ مَا نَوَى...', 'en' => 'Actions are (judged) by motives (niyyah), so each man will have what he intended...'],
                        'narrator' => ['ar' => 'عمر بن الخطاب (رضي الله عنه)', 'en' => 'Umar bin Al-Khattab (RA)'],
                        'source' => 'Sahih Al-Bukhari & Muslim',
                        'grade' => 'Sahih',
                    ],
                    [
                        'text' => ['ar' => 'بُنِيَ الإِسْلامُ عَلَى خَمْسٍ: شَهَادَةِ أَنْ لا إِلَهَ إِلا اللَّهُ وَأَنَّ مُحَمَّدًا رَسُولُ اللَّهِ، وَإِقَامِ الصَّلاةِ، وَإِيتَاءِ الزَّكَاةِ، وَحَجِّ الْبَيْتِ، وَصَوْمِ رَمَضَانَ.', 'en' => 'Islam has been built on five [pillars]: testifying that there is no deity worthy of worship except Allah and that Muhammad is the Messenger of Allah, establishing the salah (prayer), paying the zakat (obligatory charity), making the hajj (pilgrimage) to the House, and fasting in Ramadhan.'],
                        'narrator' => ['ar' => 'عبد الله بن عمر (رضي الله عنهما)', 'en' => 'Abdullah bin Umar (RA)'],
                        'source' => 'Sahih Al-Bukhari & Muslim',
                        'grade' => 'Sahih',
                    ],
                    [
                        'text' => ['ar' => 'مِنْ حُسْنِ إِسْلَامِ الْمَرْءِ تَرْكُهُ مَا لَا يَعْنِيهِ.', 'en' => 'Part of the perfection of one\'s Islam is his leaving that which does not concern him.'],
                        'narrator' => ['ar' => 'أبو هريرة (رضي الله عنه)', 'en' => 'Abu Hurairah (RA)'],
                        'source' => 'Sunan at-Tirmidhi',
                        'grade' => 'Hasan',
                    ]
                ],
            ],
            [
                'name' => ['ar' => 'أحاديث الأخلاق', 'en' => 'Hadiths on Character'],
                'description' => 'Hadiths emphasizing good manners and character.',
                'hadiths' => [
                    [
                        'text' => ['ar' => 'إِنَّ مِنْ أَحَبِّكُمْ إِلَيَّ وَأَقْرَبِكُمْ مِنِّي مَجْلِسًا يَوْمَ الْقِيَامَةِ أَحَاسِنَكُمْ أَخْلَاقًا.', 'en' => 'Indeed the most beloved among you to me, and the nearest to sit with me on the Day of Judgment is the best of you in character.'],
                        'narrator' => ['ar' => 'جابر بن عبد الله (رضي الله عنه)', 'en' => 'Jabir bin Abdullah (RA)'],
                        'source' => 'Sunan at-Tirmidhi',
                        'grade' => 'Hasan',
                    ],
                    [
                        'text' => ['ar' => 'لَيْسَ الشَّدِيدُ بِالصُّرَعَةِ، إِنَّمَا الشَّدِيدُ الَّذِي يَمْلِكُ نَفْسَهُ عِنْدَ الْغَضَبِ.', 'en' => 'The strong man is not the good wrestler; the strong man is only the one who controls himself when he is angry.'],
                        'narrator' => ['ar' => 'أبو هريرة (رضي الله عنه)', 'en' => 'Abu Hurairah (RA)'],
                        'source' => 'Sahih Al-Bukhari & Muslim',
                        'grade' => 'Sahih',
                    ]
                ],
            ]
        ];

        foreach ($categories as $catData) {
            $category = HadithCategory::updateOrCreate(
                ['name->ar' => $catData['name']['ar']],
                [
                    'name' => $catData['name'],
                    'slug' => \Illuminate\Support\Str::slug($catData['name']['en']),
                ]
            );

            foreach ($catData['hadiths'] as $hadithData) {
                Hadith::updateOrCreate(
                    [
                        'hadith_category_id' => $category->id,
                        'text->ar' => $hadithData['text']['ar'],
                    ],
                    [
                        'text' => $hadithData['text'],
                        'narrator' => $hadithData['narrator'],
                        'source' => $hadithData['source'],
                        'grade' => $hadithData['grade'],
                    ]
                );
            }
        }

        $this->command->info('Hadith seeded successfully!');
    }
}
