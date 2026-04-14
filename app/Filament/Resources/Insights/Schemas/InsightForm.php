<?php

namespace App\Filament\Resources\Insights\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class InsightForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->disabled()
                    ->dehydrated(),
                Textarea::make('excerpt')
                    ->required()
                    ->rows(2)
                    ->columnSpanFull(),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('author')
                    ->required(),
                FileUpload::make('featured_image')
                    ->image()
                    ->directory('insights'),
                Toggle::make('is_published'),
                DateTimePicker::make('published_at'),
            ]);
    }
}
