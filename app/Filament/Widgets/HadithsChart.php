<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\HadithCategory;

class HadithsChart extends ChartWidget
{
    protected ?string $heading = 'الأحاديث حسب القسم';

    protected function getData(): array
    {
        $categories = HadithCategory::withCount('hadiths')->get();
        
        return [
            'datasets' => [
                [
                    'label' => 'الأحاديث',
                    'data' => $categories->pluck('hadiths_count')->toArray(),
                    'backgroundColor' => [
                        '#f59e0b', '#3b82f6', '#10b981', '#ef4444', '#8b5cf6'
                    ],
                ],
            ],
            'labels' => $categories->map(fn ($cat) => $cat->getTranslation('name', 'ar'))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
