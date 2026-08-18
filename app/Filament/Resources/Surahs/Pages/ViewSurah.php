<?php

namespace App\Filament\Resources\Surahs\Pages;

use App\Filament\Resources\Surahs\SurahResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSurah extends ViewRecord
{
    protected static string $resource = SurahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
