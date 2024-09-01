<?php

namespace App\Services;

use App\Models\Tutor;
use Illuminate\Database\Eloquent\Collection;

class TutorService
{
    public function bulkUpdateRates(Collection $tutors, int $percentageChange): void
    {
        $tutors->each(function (Tutor $tutor) use ($percentageChange) {
            $newRate = $tutor->hourly_rate + ($tutor->hourly_rate * $percentageChange / 100);

            $tutor->rateChanges()->create([
                'old_hourly_rate' => $tutor->hourly_rate,
                'new_hourly_rate' => $newRate,
            ]);

            $tutor->update([
                'hourly_rate' => $newRate,
            ]);
        });
    }
}
