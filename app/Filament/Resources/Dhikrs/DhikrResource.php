<?php

namespace App\Filament\Resources\Dhikrs;

use App\Filament\Resources\Dhikrs\Pages\CreateDhikr;
use App\Filament\Resources\Dhikrs\Pages\EditDhikr;
use App\Filament\Resources\Dhikrs\Pages\ListDhikrs;
use App\Filament\Resources\Dhikrs\Schemas\DhikrForm;
use App\Filament\Resources\Dhikrs\Tables\DhikrsTable;
use App\Models\Dhikr;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DhikrResource extends Resource
{
    protected static ?string $model = Dhikr::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return DhikrForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DhikrsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDhikrs::route('/'),
            'create' => CreateDhikr::route('/create'),
            'edit' => EditDhikr::route('/{record}/edit'),
        ];
    }
}
