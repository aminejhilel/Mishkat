<?php

namespace App\Filament\Resources\AdhkarCategories\Pages;

use App\Filament\Resources\AdhkarCategories\AdhkarCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdhkarCategories extends ListRecords
{
    protected static string $resource = AdhkarCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
