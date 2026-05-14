<?php

namespace App\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ProjectStatus: string implements HasLabel, HasColor{
    case PLANNING = 'planning';
    case IN_PROGRESS = 'in-progress';
    case DONE = 'done';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PLANNING => 'W planach',
            self::IN_PROGRESS => 'W toku',
            self::DONE => 'Zakończone',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::PLANNING => 'info',
            self::IN_PROGRESS => Color::Teal,
            self::DONE => 'success',
        };
    }
}
