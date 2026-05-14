<?php

namespace App\Filament\Resources\Projects\Schemas;

use App\Enums\ProjectStatus;
use App\Enums\ProjectType;
use App\Enums\Tech;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure($schema)
    {
        return $schema
            ->components([
                Section::make('Podstawowe informacje')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Set $set) =>
                            $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->unique(ignoreRecord: true),
                    ])->columns(2),

                Section::make('Status i Typ')
                    ->schema([
                        Select::make('status')
                            ->options(ProjectStatus::class)
                            ->required(),
                        Select::make('type')
                            ->options(ProjectType::class)
                            ->required(),
                    ])->columns(2),

                Section::make('Linki')
                    ->schema([
                        TextInput::make('github_url')->url(),
                        TextInput::make('live_url')->url(),
                    ])->columns(2),
                Section::make('Technologie')
                    -> schema([
                        Select::make('tech_stack')
                            ->label('Wybrane technologie')
                            ->multiple()
                            ->options(Tech::class)
                            ->searchable()
                            ->preload(),
                    ]),
                Section::make('Opisy')
                    ->schema([
                        Textarea::make('description_pl')
                            ->label('Opis (PL)')
                            ->rows(8)
                            ->required(),
                        Textarea::make('description_en')
                            ->label('Opis (EN)')
                            ->rows(8)
                            ->required(),
                    ])->columns(2)->columnSpan(2),
            ]);
    }
}