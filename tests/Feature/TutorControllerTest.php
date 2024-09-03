<?php

namespace Tests\Feature;

use App\Models\Tutor;
use Tests\MyEdSpaceTestCase;

class TutorControllerTest extends MyEdSpaceTestCase
{
    /**
     * A basic feature test example.
     */
    public function testGuestGetIndex(): void
    {
        Tutor::factory()->create();
        $response = $this->get(route('tutors.index'));

        $response->assertStatus(200)->assertViewIs('tutors');
    }
}
