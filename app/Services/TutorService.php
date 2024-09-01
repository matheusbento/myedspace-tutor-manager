<?php

namespace App\Services;

use App\Models\Tutor;
use Illuminate\Database\Eloquent\Collection;

class TutorService
{
    public function bulkUpdateRates(Collection $tutors, int $percentageChange): void
    {
        $tutors->each(function (Tutor $tutor) use ($percentageChange) {
            $tutor->update([
                'hourly_rate' => $tutor->hourly_rate + ($tutor->hourly_rate * $percentageChange / 100),
            ]);
        });
    }
}
