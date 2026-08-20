<?php

namespace App\Filament\Resources\Hadiths\Pages;

use App\Filament\Resources\Hadiths\HadithResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHadiths extends ListRecords
{
    protected static string $resource = HadithResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
