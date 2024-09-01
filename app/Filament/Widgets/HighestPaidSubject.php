<?php

namespace App\Filament\Widgets;

use App\Enums\Subject;
use App\Models\Tutor;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Collection;

class HighestPaidSubject extends BaseWidget
{
    protected static ?int $sort = 4;

    protected static bool $isLazy = false;

    protected int|string|array $columnSpan = '6';

    protected function getStats(): array
    {
        $allTutors = Tutor::select('subjects', 'hourly_rate')->get();

        $subjectsRates = collect([]);

        $allTutors->each(function ($tutor) use ($subjectsRates) {
            if (is_array($tutor->subjects) && count($tutor->subjects)) {
                foreach ($tutor->subjects as $subject) {
                    $subjectsRates->push([
                        'subject' => $subject,
                        'hourly_rate' => $tutor->hourly_rate,
                    ]);
                }
            }
        });

        $highestPaidSubject = $subjectsRates
            ->groupBy('subject')
            ->map(function (Collection $items, $subject) {
                return [
                    'subject' => $subject,
                    'avg_hourly_rate' => $items->avg('hourly_rate'),
                ];
            })
            ->sortByDesc('avg_hourly_rate')
            ->first();

        $subjectLabel = Subject::tryFrom($highestPaidSubject['subject'])?->getLabel() ?? null;

        return [

            Stat::make('Highest Paid Subject', 'subject')
                ->icon('heroicon-s-currency-dollar')
                ->value($subjectLabel.' - $'.number_format($highestPaidSubject['avg_hourly_rate'], 2)
                ),
        ];
    }
}
