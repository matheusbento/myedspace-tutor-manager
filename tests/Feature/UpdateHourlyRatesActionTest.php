<?php

namespace Tests\Feature;

use App\Facades\TutorService;
use App\Models\Tutor;
use Tests\MyEdSpaceTestCase;

class UpdateHourlyRatesActionTest extends MyEdSpaceTestCase
{
    public function testUserBulkUpdateHourlyRates()
    {
        $tutors = Tutor::factory()->count(2)->create([
            'hourly_rate' => 100,
        ]);

        $increasePercent = 20;

        TutorService::bulkUpdateRates($tutors, $increasePercent);

        $tutors->each(function ($tutor) use ($increasePercent) {
            $this->assertEquals($tutor->hourly_rate, 100 + 100 * $increasePercent / 100);

            $this->assertDatabaseHas('tutor_rate_changes', [
                'tutor_id' => $tutor->id,
                'old_hourly_rate' => 100,
                'new_hourly_rate' => 100 + 100 * $increasePercent / 100,
            ]);
        });

    }
}
