<?php

namespace App\Filament\Resources\Surahs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SurahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('number')
                    ->required()
                    ->numeric(),
                Textarea::make('name')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('revelation_type'),
                TextInput::make('number_of_ayahs')
                    ->numeric(),
            ]);
    }
}
