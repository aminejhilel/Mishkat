<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdhkarCategory;
use App\Models\Dhikr;

class AdhkarSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Seeding Adhkar...');

        $categories = [
            [
                'name' => ['ar' => 'أذكار الصباح', 'en' => 'Morning Adhkar'],
                'icon' => '🌅',
                'dhikrs' => [
                    [
                        'text' => ['ar' => 'أَعُوذُ بِاللَّهِ مِنَ الشَّيْطَانِ الرَّجِيمِ، اللَّهُ لَا إِلَهَ إِلَّا هُوَ الْحَيُّ الْقَيُّومُ لَا تَأْخُذُهُ سِنَةٌ وَلَا نَوْمٌ...', 'en' => 'Ayat Al-Kursi — Allah! There is no god ˹worthy of worship˺ except Him...'],
                        'translation' => ['ar' => 'آية الكرسي — من قرأها حين يصبح أُجير من الجن حتى يمسي', 'en' => 'Whoever recites it in the morning will be protected from jinn until the evening'],
                        'count' => 1,
                    ],
                    [
                        'text' => ['ar' => 'أَصْبَحْنَا وَأَصْبَحَ الْمُلْكُ لِلَّهِ، وَالْحَمْدُ لِلَّهِ، لَا إِلَهَ إِلَّا اللَّهُ وَحْدَهُ لَا شَرِيكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلِّ شَيْءٍ قَدِيرٌ', 'en' => 'We have reached the morning and the whole kingdom belongs to Allah...'],
                        'translation' => ['ar' => 'أصبحنا وأصبح الملك لله', 'en' => 'We have entered the morning and the kingdom belongs to Allah'],
                        'count' => 1,
                    ],
                    [
                        'text' => ['ar' => 'اللَّهُمَّ بِكَ أَصْبَحْنَا، وَبِكَ أَمْسَيْنَا، وَبِكَ نَحْيَا، وَبِكَ نَمُوتُ، وَإِلَيْكَ النُّشُورُ', 'en' => 'O Allah, by Your leave we have reached the morning...'],
                        'translation' => ['ar' => 'دعاء الصباح', 'en' => 'Morning supplication'],
                        'count' => 1,
                    ],
                    [
                        'text' => ['ar' => 'سُبْحَانَ اللهِ وَبِحَمْدِهِ', 'en' => 'Glory and praise be to Allah'],
                        'translation' => ['ar' => 'من قالها مئة مرة غُفرت ذنوبه', 'en' => 'Whoever says it 100 times, his sins will be forgiven'],
                        'count' => 100,
                    ],
                    [
                        'text' => ['ar' => 'لَا إِلَهَ إِلَّا اللَّهُ وَحْدَهُ لَا شَرِيكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلِّ شَيْءٍ قَدِيرٌ', 'en' => 'None has the right to be worshipped but Allah alone, Who has no partner...'],
                        'translation' => ['ar' => 'من قالها عشر مرات كانت له عدل أربع رقاب', 'en' => 'Whoever says it 10 times will have the reward of freeing 4 slaves'],
                        'count' => 10,
                    ],
                    [
                        'text' => ['ar' => 'رَضِيتُ بِاللَّهِ رَبًّا، وَبِالْإِسْلَامِ دِينًا، وَبِمُحَمَّدٍ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ نَبِيًّا', 'en' => 'I am pleased with Allah as my Lord, Islam as my religion, and Muhammad ﷺ as my Prophet'],
                        'translation' => ['ar' => 'من قالها ثلاث مرات كان حقاً على الله أن يرضيه', 'en' => 'Whoever says it 3 times, it is a duty upon Allah to please him'],
                        'count' => 3,
                    ],
                ],
            ],
            [
                'name' => ['ar' => 'أذكار المساء', 'en' => 'Evening Adhkar'],
                'icon' => '🌙',
                'dhikrs' => [
                    [
                        'text' => ['ar' => 'أَمْسَيْنَا وَأَمْسَى الْمُلْكُ لِلَّهِ، وَالْحَمْدُ لِلَّهِ، لَا إِلَهَ إِلَّا اللَّهُ وَحْدَهُ لَا شَرِيكَ لَهُ', 'en' => 'We have entered the evening and the kingdom belongs to Allah...'],
                        'translation' => ['ar' => 'ذكر المساء الأول', 'en' => 'First evening remembrance'],
                        'count' => 1,
                    ],
                    [
                        'text' => ['ar' => 'اللَّهُمَّ أَنْتَ رَبِّي لَا إِلَهَ إِلَّا أَنْتَ، خَلَقْتَنِي وَأَنَا عَبْدُكَ، وَأَنَا عَلَى عَهْدِكَ وَوَعْدِكَ مَا اسْتَطَعْتُ...', 'en' => 'O Allah, You are my Lord, none has the right to be worshipped but You...'],
                        'translation' => ['ar' => 'سيد الاستغفار — من قاله موقناً فمات من يومه دخل الجنة', 'en' => 'Master of Forgiveness — whoever says it with certainty and dies that day, will enter Paradise'],
                        'count' => 1,
                    ],
                    [
                        'text' => ['ar' => 'أَعُوذُ بِكَلِمَاتِ اللَّهِ التَّامَّاتِ مِنْ شَرِّ مَا خَلَقَ', 'en' => 'I seek refuge in the Perfect Words of Allah from the evil of what He has created'],
                        'translation' => ['ar' => 'من قالها ثلاث مرات لم تضره حمة تلك الليلة', 'en' => 'Whoever says it 3 times will not be harmed by any poison that night'],
                        'count' => 3,
                    ],
                    [
                        'text' => ['ar' => 'بِسْمِ اللَّهِ الَّذِي لَا يَضُرُّ مَعَ اسْمِهِ شَيْءٌ فِي الْأَرْضِ وَلَا فِي السَّمَاءِ وَهُوَ السَّمِيعُ الْعَلِيمُ', 'en' => 'In the name of Allah, with Whose name nothing on earth or in heaven can cause harm...'],
                        'translation' => ['ar' => 'من قالها ثلاث مرات لم تصبه فجأة بلاء', 'en' => 'Whoever says it 3 times will not be struck by sudden calamity'],
                        'count' => 3,
                    ],
                ],
            ],
            [
                'name' => ['ar' => 'أذكار بعد الصلاة', 'en' => 'Post-Prayer Adhkar'],
                'icon' => '🤲',
                'dhikrs' => [
                    [
                        'text' => ['ar' => 'سُبْحَانَ اللَّهِ', 'en' => 'Glory be to Allah'],
                        'translation' => ['ar' => 'تُقال ثلاثاً وثلاثين مرة بعد كل صلاة', 'en' => 'Said 33 times after every prayer'],
                        'count' => 33,
                    ],
                    [
                        'text' => ['ar' => 'الْحَمْدُ لِلَّهِ', 'en' => 'All praise be to Allah'],
                        'translation' => ['ar' => 'تُقال ثلاثاً وثلاثين مرة بعد كل صلاة', 'en' => 'Said 33 times after every prayer'],
                        'count' => 33,
                    ],
                    [
                        'text' => ['ar' => 'اللَّهُ أَكْبَرُ', 'en' => 'Allah is the Greatest'],
                        'translation' => ['ar' => 'تُقال أربعاً وثلاثين مرة بعد كل صلاة', 'en' => 'Said 34 times after every prayer'],
                        'count' => 34,
                    ],
                    [
                        'text' => ['ar' => 'لَا إِلَهَ إِلَّا اللَّهُ وَحْدَهُ لَا شَرِيكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلِّ شَيْءٍ قَدِيرٌ', 'en' => 'There is no god but Allah, alone without a partner...'],
                        'translation' => ['ar' => 'تُقال مرة واحدة في نهاية التسبيح', 'en' => 'Said once at the end of the tasbih'],
                        'count' => 1,
                    ],
                ],
            ],
            [
                'name' => ['ar' => 'أذكار النوم', 'en' => 'Sleep Adhkar'],
                'icon' => '😴',
                'dhikrs' => [
                    [
                        'text' => ['ar' => 'بِاسْمِكَ اللَّهُمَّ أَمُوتُ وَأَحْيَا', 'en' => 'In Your name, O Allah, I die and I live'],
                        'translation' => ['ar' => 'يُقال عند النوم', 'en' => 'Said when going to sleep'],
                        'count' => 1,
                    ],
                    [
                        'text' => ['ar' => 'اللَّهُمَّ قِنِي عَذَابَكَ يَوْمَ تَبْعَثُ عِبَادَكَ', 'en' => 'O Allah, protect me from Your punishment on the Day You resurrect Your slaves'],
                        'translation' => ['ar' => 'يُقال ثلاث مرات قبل النوم', 'en' => 'Said 3 times before sleeping'],
                        'count' => 3,
                    ],
                    [
                        'text' => ['ar' => 'سُبْحَانَ اللَّهِ وَبِحَمْدِهِ', 'en' => 'Glory and praise be to Allah'],
                        'translation' => ['ar' => 'مئة مرة - من قالها غُفر له ذنبه', 'en' => '100 times — whoever says it, his sins will be forgiven'],
                        'count' => 100,
                    ],
                ],
            ],
        ];

        foreach ($categories as $catData) {
            $category = AdhkarCategory::updateOrCreate(
                ['name->ar' => $catData['name']['ar']],
                [
                    'name' => $catData['name'],
                    'icon' => $catData['icon'],
                ]
            );

            foreach ($catData['dhikrs'] as $dhikrData) {
                Dhikr::updateOrCreate(
                    [
                        'adhkar_category_id' => $category->id,
                        'text->ar' => $dhikrData['text']['ar'],
                    ],
                    [
                        'text' => $dhikrData['text'],
                        'translation' => $dhikrData['translation'],
                        'count' => $dhikrData['count'],
                    ]
                );
            }
        }

        $this->command->info('Adhkar seeded successfully!');
    }
}
