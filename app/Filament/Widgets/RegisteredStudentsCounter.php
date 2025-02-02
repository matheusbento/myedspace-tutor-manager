<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class RegisteredStudentsCounter extends BaseWidget
{
    protected static ?int $sort = 2;

    protected static bool $isLazy = false;

    protected int|string|array $columnSpan = '6';

    protected function getStats(): array
    {
        return [
            Stat::make('Total number of registered students', 'students')
                ->icon('heroicon-s-user-group')
                ->value(
                    Student::count()
                ),
        ];
    }
}
