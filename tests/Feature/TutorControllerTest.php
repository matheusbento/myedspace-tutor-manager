<?php

namespace Tests\Feature;

use App\Models\Tutor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TutorControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGuestGetIndex(): void
    {
        Tutor::factory()->count(5)->create();
        $response = $this->get(route('tutors.index'));

        $response->assertStatus(200)->assertViewIs('tutors');
    }
}
