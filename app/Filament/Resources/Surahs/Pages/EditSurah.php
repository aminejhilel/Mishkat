<?php

namespace App\Filament\Resources\Surahs\Pages;

use App\Filament\Resources\Surahs\SurahResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSurah extends EditRecord
{
    protected static string $resource = SurahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
