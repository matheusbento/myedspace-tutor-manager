<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Subject: string implements HasLabel
{
    case Math = 'math';
    case Science = 'science';
    case English = 'english';
    case History = 'history';
    case Art = 'art';
    case Music = 'music';
    case PhysicalEducation = 'physical_education';
    case ComputerScience = 'computer_science';
    case ForeignLanguage = 'foreign_language';

    public function getLabel(): string
    {
        return match ($this) {
            self::Math => 'Math',
            self::Science => 'Science',
            self::English => 'English',
            self::History => 'History',
            self::Art => 'Art',
            self::Music => 'Music',
            self::PhysicalEducation => 'Physical Education',
            self::ComputerScience => 'Computer Science',
            self::ForeignLanguage => 'Foreign Language',
        };
    }

    public static function toArray(): array
    {
        return [
            self::Math,
            self::Science,
            self::English,
            self::History,
            self::Art,
            self::Music,
            self::PhysicalEducation,
            self::ComputerScience,
            self::ForeignLanguage,
        ];
    }
}
