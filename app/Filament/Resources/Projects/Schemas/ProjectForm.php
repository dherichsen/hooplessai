<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectForm
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
                Textarea::make('description')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
                Select::make('category')
                    ->options([
                        'client' => 'Client Project',
                        'oss' => 'Open Source',
                    ]),
                FileUpload::make('image')
                    ->image()
                    ->directory('projects'),
                TextInput::make('case_study_url')
                    ->url(),
                TextInput::make('github_url')
                    ->url(),
                TextInput::make('tech_stack'),
                TextInput::make('stars'),
                TextInput::make('language'),
                Toggle::make('is_featured'),
                Toggle::make('is_published')
                    ->default(true),
                TextInput::make('order')
                    ->numeric(),
            ]);
    }
}
