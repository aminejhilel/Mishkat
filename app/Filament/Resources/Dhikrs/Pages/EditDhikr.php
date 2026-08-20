<?php

namespace App\Filament\Resources\Dhikrs\Pages;

use App\Filament\Resources\Dhikrs\DhikrResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDhikr extends EditRecord
{
    protected static string $resource = DhikrResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
