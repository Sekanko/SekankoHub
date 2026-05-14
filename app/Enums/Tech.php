<?php

namespace App\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum Tech: string implements HasLabel, HasColor
{
    case JAVA = 'java';
    case SPRING = 'spring';
    case JAVASCRIPT = 'javascript';
    case HTML = 'html';
    case CSS = 'css';
    case ANGULAR = 'angular';
    case PHP = 'php';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::JAVA => 'Java',
            self::SPRING => 'Spring',
            self::JAVASCRIPT => 'JavaScript',
            self::HTML => 'HTML',
            self::CSS => 'CSS',
            self::ANGULAR => 'Angular',
            self::PHP => 'PHP',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::JAVA => Color::Orange,
            self::SPRING => Color::Green,
            self::JAVASCRIPT => Color::Yellow,
            self::HTML => Color::Orange,
            self::CSS => Color::Blue,
            self::ANGULAR => Color::Red,
            self::PHP => Color::Indigo,
        };
    }
}
