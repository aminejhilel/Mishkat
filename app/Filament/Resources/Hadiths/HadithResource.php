<?php

namespace App\Filament\Resources\Hadiths;

use App\Filament\Resources\Hadiths\Pages\CreateHadith;
use App\Filament\Resources\Hadiths\Pages\EditHadith;
use App\Filament\Resources\Hadiths\Pages\ListHadiths;
use App\Filament\Resources\Hadiths\Schemas\HadithForm;
use App\Filament\Resources\Hadiths\Tables\HadithsTable;
use App\Models\Hadith;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HadithResource extends Resource
{
    protected static ?string $model = Hadith::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'no';

    public static function form(Schema $schema): Schema
    {
        return HadithForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HadithsTable::configure($table);
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
            'index' => ListHadiths::route('/'),
            'create' => CreateHadith::route('/create'),
            'edit' => EditHadith::route('/{record}/edit'),
        ];
    }
}
