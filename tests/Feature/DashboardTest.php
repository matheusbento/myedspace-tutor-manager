<?php

namespace Tests\Feature;

use App\Filament\Pages\Dashboard;
use App\Models\Student;
use App\Models\Tutor;
use Tests\MyEdSpaceTestCase;

class DashboardTest extends MyEdSpaceTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Student::factory()
            ->count(2)
            ->has(Tutor::factory(2, [
                'hourly_rate' => 10,
            ]), 'tutors')
            ->create();
    }

    public function testDashboardCanBeRendered()
    {
        $this->createAdminUserAndLogin();
        $response = $this->get(Dashboard::getUrl());
        $response->assertSuccessful();
    }

    public function testDashboardSeeTotalStudentsWidget()
    {
        $this->createAdminUserAndLogin();
        $response = $this->get(Dashboard::getUrl());
        $response->assertSee('Total number of registered students');
        $response->assertSee('10');
    }

    public function testDashboardSeeTotalActiveTutors()
    {
        $this->createAdminUserAndLogin();
        $response = $this->get(Dashboard::getUrl());
        $response->assertSee('Total number of active tutors');
        $response->assertSee('10');
    }

    public function testDashboardSeeAverageTutorHourlyRate()
    {
        $this->createAdminUserAndLogin();
        $response = $this->get(Dashboard::getUrl());
        $response->assertSee('Average tutor hourly rate');
        $response->assertSee('10');
    }

    public function testDashboardSeeHighestPaidSubject()
    {
        $this->createAdminUserAndLogin();
        $response = $this->get(Dashboard::getUrl());
        $response->assertSee('Highest Paid Subject');
        $response->assertSee('$10.00');
    }
}
