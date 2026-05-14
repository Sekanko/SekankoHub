<?php

namespace App\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ProjectType: string implements HasLabel, HasColor
{
    case BACKEND = 'backend';
    case FRONTEND = 'frontend';
    case FULLSTACK = 'fullstack';
    public function getColor(): string | array | null
    {
        return match ($this) {
            self::BACKEND => Color::Indigo,
            self::FRONTEND => Color::Teal,
            self::FULLSTACK => Color::Purple,
        };
    }

    public function getLabel(): string
    {
        return match ($this){
            self::BACKEND => 'Backend',
            self::FRONTEND => 'Frontend',
            self::FULLSTACK => 'Fullstack'
        };
    }
}
