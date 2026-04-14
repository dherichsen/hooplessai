<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('role')
                    ->required(),
                Textarea::make('bio')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->avatar()
                    ->directory('team'),
                TextInput::make('linkedin_url')
                    ->url(),
                TextInput::make('twitter_url')
                    ->url(),
                TextInput::make('order')
                    ->numeric()
                    ->default(0),
                Toggle::make('is_published')
                    ->default(true),
            ]);
    }
}
