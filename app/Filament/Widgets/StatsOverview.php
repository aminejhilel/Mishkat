<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Surah;
use App\Models\Hadith;
use App\Models\Dhikr;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('إجمالي السور', Surah::count())
                ->description('سور القرآن الكريم')
                ->descriptionIcon('heroicon-m-book-open')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
                
            Stat::make('الأحاديث النبوية', Hadith::count())
                ->description('حديث شريف')
                ->descriptionIcon('heroicon-m-bookmark')
                ->chart([3, 12, 5, 8, 20, 10, 22])
                ->color('info'),
                
            Stat::make('الأذكار', Dhikr::count())
                ->description('ذكر وتسبيح')
                ->descriptionIcon('heroicon-m-heart')
                ->chart([1, 4, 2, 8, 5, 10, 16])
                ->color('warning'),
        ];
    }
}
