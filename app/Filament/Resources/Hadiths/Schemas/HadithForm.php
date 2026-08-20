<?php

namespace App\Filament\Resources\Hadiths\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class HadithForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('hadith_category_id')
                    ->required()
                    ->numeric(),
                Textarea::make('text')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('narrator')
                    ->columnSpanFull(),
                TextInput::make('source'),
                TextInput::make('grade')
                    ->numeric(),
            ]);
    }
}
