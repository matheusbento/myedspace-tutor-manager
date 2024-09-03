<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\ActiveTutorsCounter;
use App\Filament\Widgets\AverageTutorHourlyRate;
use App\Filament\Widgets\HighestPaidSubject;
use App\Filament\Widgets\RegisteredStudentsCounter;

class Dashboard extends \Filament\Pages\Dashboard
{
    public static $icon = 'heroicon-o-home';

    public function getColumns(): int|string|array
    {
        return 2;
    }

    public function getWidgets(): array
    {
        return [
            ActiveTutorsCounter::class,
            RegisteredStudentsCounter::class,
            AverageTutorHourlyRate::class,
            HighestPaidSubject::class,
        ];
    }

    protected static ?string $title = 'MyEdSpace Dashboard';
}
