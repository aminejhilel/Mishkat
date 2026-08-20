<?php

namespace App\Filament\Resources\AdhkarCategories\Pages;

use App\Filament\Resources\AdhkarCategories\AdhkarCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAdhkarCategory extends EditRecord
{
    protected static string $resource = AdhkarCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
