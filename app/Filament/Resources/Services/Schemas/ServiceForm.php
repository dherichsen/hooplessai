<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->disabled()
                    ->dehydrated(),
                Textarea::make('description')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
                Textarea::make('detailed_description')
                    ->rows(5)
                    ->columnSpanFull(),
                Textarea::make('icon_svg')
                    ->label('Icon SVG Code')
                    ->rows(8)
                    ->extraInputAttributes(['style' => 'font-family: monospace;'])
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->directory('services'),
                TextInput::make('cta_text')
                    ->default('Learn more'),
                TextInput::make('order')
                    ->numeric()
                    ->default(0),
                Toggle::make('is_published')
                    ->default(true),
            ]);
    }
}
