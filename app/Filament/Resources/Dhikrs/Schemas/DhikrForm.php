<?php

namespace App\Filament\Resources\Dhikrs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DhikrForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('adhkar_category_id')
                    ->required()
                    ->numeric(),
                Textarea::make('text')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('translation')
                    ->columnSpanFull(),
                TextInput::make('count')
                    ->required()
                    ->numeric()
                    ->default(1),
            ]);
    }
}
