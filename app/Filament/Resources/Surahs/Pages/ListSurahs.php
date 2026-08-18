<?php

namespace App\Filament\Resources\Surahs\Pages;

use App\Filament\Resources\Surahs\SurahResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSurahs extends ListRecords
{
    protected static string $resource = SurahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
