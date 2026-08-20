<?php

namespace App\Filament\Resources\AdhkarCategories;

use App\Filament\Resources\AdhkarCategories\Pages\CreateAdhkarCategory;
use App\Filament\Resources\AdhkarCategories\Pages\EditAdhkarCategory;
use App\Filament\Resources\AdhkarCategories\Pages\ListAdhkarCategories;
use App\Filament\Resources\AdhkarCategories\Schemas\AdhkarCategoryForm;
use App\Filament\Resources\AdhkarCategories\Tables\AdhkarCategoriesTable;
use App\Models\AdhkarCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AdhkarCategoryResource extends Resource
{
    protected static ?string $model = AdhkarCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AdhkarCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdhkarCategoriesTable::configure($table);
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
            'index' => ListAdhkarCategories::route('/'),
            'create' => CreateAdhkarCategory::route('/create'),
            'edit' => EditAdhkarCategory::route('/{record}/edit'),
        ];
    }
}
