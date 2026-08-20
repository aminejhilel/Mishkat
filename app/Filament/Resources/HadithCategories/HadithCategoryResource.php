<?php

namespace App\Filament\Resources\HadithCategories;

use App\Filament\Resources\HadithCategories\Pages\CreateHadithCategory;
use App\Filament\Resources\HadithCategories\Pages\EditHadithCategory;
use App\Filament\Resources\HadithCategories\Pages\ListHadithCategories;
use App\Filament\Resources\HadithCategories\Schemas\HadithCategoryForm;
use App\Filament\Resources\HadithCategories\Tables\HadithCategoriesTable;
use App\Models\HadithCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HadithCategoryResource extends Resource
{
    protected static ?string $model = HadithCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'no';

    public static function form(Schema $schema): Schema
    {
        return HadithCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HadithCategoriesTable::configure($table);
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
            'index' => ListHadithCategories::route('/'),
            'create' => CreateHadithCategory::route('/create'),
            'edit' => EditHadithCategory::route('/{record}/edit'),
        ];
    }
}
