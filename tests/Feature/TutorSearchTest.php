<?php

namespace Tests\Feature;

use App\Models\Tutor;
use Livewire\Livewire;
use Tests\MyEdSpaceTestCase;

class TutorSearchTest extends MyEdSpaceTestCase
{
    public function testUserCanSearchForTutorRateUsingFreeText(): void
    {
        Tutor::factory()->count(2)->create([
            'hourly_rate' => 50,
        ]);

        Tutor::factory()->create(['hourly_rate' => 100]);

        Livewire::test('tutor-search')
            ->set('liveSearch', '100')
            ->call('search')
            ->assertSee('100.00/hour')->assertDontSee('50.00/hour');
    }

    public function testUserCanSearchForTutorSubjectUsingFreeText(): void
    {
        Tutor::factory()->count(2)->create();

        Tutor::factory()->create(['subjects' => ['math']]);

        Livewire::test('tutor-search')
            ->set('liveSearch', 'math')
            ->call('search')
            ->assertSee('math');
    }

    public function testUserCanSearchForTutorUsingHourlyRateRange(): void
    {
        Tutor::factory()->count(2)->create([
            'hourly_rate' => 40,
        ]);

        Tutor::factory()->create(['hourly_rate' => 100]);

        Livewire::test('tutor-search')
            ->set('minHourlySearch', 50)
            ->set('maxHourlySearch', 100)
            ->call('search')
            ->assertSee('100.00/hour')->assertDontSee('40.00/hour');
    }

    public function testUserCanSearchForTutorSubjectUsingTheSubjectsFilter(): void
    {
        Tutor::factory()->count(2)->create();

        Tutor::factory()->create(['subjects' => ['math']]);

        Livewire::test('tutor-search')
            ->set('subjectsSearch', ['math'])
            ->call('search')
            ->assertSee('math');
    }
}
