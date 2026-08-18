<?php

namespace App\Filament\Resources\Surahs;

use App\Filament\Resources\Surahs\Pages\CreateSurah;
use App\Filament\Resources\Surahs\Pages\EditSurah;
use App\Filament\Resources\Surahs\Pages\ListSurahs;
use App\Filament\Resources\Surahs\Pages\ViewSurah;
use App\Filament\Resources\Surahs\Schemas\SurahForm;
use App\Filament\Resources\Surahs\Schemas\SurahInfolist;
use App\Filament\Resources\Surahs\Tables\SurahsTable;
use App\Models\Surah;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SurahResource extends Resource
{
    protected static ?string $model = Surah::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return SurahForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SurahInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SurahsTable::configure($table);
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
            'index' => ListSurahs::route('/'),
            'create' => CreateSurah::route('/create'),
            'view' => ViewSurah::route('/{record}'),
            'edit' => EditSurah::route('/{record}/edit'),
        ];
    }
}
