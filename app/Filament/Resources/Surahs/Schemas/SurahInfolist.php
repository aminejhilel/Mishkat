<?php

namespace App\Filament\Resources\Surahs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SurahInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('number')
                    ->numeric(),
                TextEntry::make('name')
                    ->columnSpanFull(),
                TextEntry::make('revelation_type')
                    ->placeholder('-'),
                TextEntry::make('number_of_ayahs')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
