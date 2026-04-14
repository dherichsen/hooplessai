<?php

namespace App\Filament\Resources\FaqItems\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FaqItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('question')
                    ->required(),
                Textarea::make('answer')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
                Select::make('category')
                    ->options([
                        'working-with-us' => 'Working With Us',
                        'technical' => 'Technical',
                        'general' => 'General',
                    ]),
                Select::make('page')
                    ->options([
                        'about' => 'About',
                        'contact' => 'Contact',
                        'services' => 'Services',
                    ]),
                TextInput::make('order')
                    ->numeric()
                    ->default(0),
                Toggle::make('is_published')
                    ->default(true),
            ]);
    }
}
