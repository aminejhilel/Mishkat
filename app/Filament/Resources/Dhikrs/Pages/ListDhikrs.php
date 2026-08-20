<?php

namespace App\Filament\Resources\Dhikrs\Pages;

use App\Filament\Resources\Dhikrs\DhikrResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDhikrs extends ListRecords
{
    protected static string $resource = DhikrResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
