<?php

namespace App\Filament\Resources\HadithCategories\Pages;

use App\Filament\Resources\HadithCategories\HadithCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHadithCategories extends ListRecords
{
    protected static string $resource = HadithCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
