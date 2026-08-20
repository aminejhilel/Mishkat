<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\AdhkarCategory;

class DhikrsChart extends ChartWidget
{
    protected ?string $heading = 'الأذكار حسب القسم';

    protected function getData(): array
    {
        $categories = AdhkarCategory::withCount('dhikrs')->get();

        return [
            'datasets' => [
                [
                    'label' => 'الأذكار',
                    'data' => $categories->pluck('dhikrs_count')->toArray(),
                    'backgroundColor' => '#f59e0b',
                ],
            ],
            'labels' => $categories->map(fn ($cat) => $cat->getTranslation('name', 'ar'))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
