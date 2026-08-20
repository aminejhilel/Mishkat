<?php

namespace App\Filament\Resources\HadithCategories\Pages;

use App\Filament\Resources\HadithCategories\HadithCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHadithCategory extends EditRecord
{
    protected static string $resource = HadithCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
