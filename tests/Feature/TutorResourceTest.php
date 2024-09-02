<?php

namespace Tests\Feature;

use App\Filament\Resources\TutorResource;
use App\Filament\Resources\TutorResource\Pages\EditTutor;
use App\Models\Tutor;
use Livewire\Livewire;
use Tests\MyEdSpaceTestCase;

class TutorResourceTest extends MyEdSpaceTestCase
{
    public function testTutorResourceCanBeRendered()
    {
        $this->createAdminUserAndLogin();
        Tutor::factory()->create();
        $response = $this->get(TutorResource::getUrl('index'));
        $response->assertSuccessful();
    }

    public function testTutorResourceEditCanBeRendered()
    {
        $this->createAdminUserAndLogin();
        $response = $this->get(TutorResource::getUrl('edit', [
            'record' => Tutor::factory()->create(),
        ]));
        $response->assertSuccessful();
    }

    public function testTutorResourceCreateCanBeRendered()
    {
        $this->createAdminUserAndLogin();
        $response = $this->get(TutorResource::getUrl('create'));
        $response->assertSuccessful();
    }

    public function testTutorResourceCanEditTuro()
    {
        $this->createAdminUserAndLogin();
        $tutor = Tutor::factory()->create();
        $newData = Tutor::factory()->make();

        Livewire::test(EditTutor::class, [
            'record' => $tutor->getRouteKey(),
        ])
            ->fillForm([
                'id' => $tutor->id,
                'name' => $newData->name,
                'email' => $newData->email,
                'hourly_rate' => $newData->hourly_rate,
                'subjects' => $newData->subjects,
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('tutors', [
            'id' => $tutor->id,
            'name' => $newData->name,
            'email' => $newData->email,
        ]);
    }
}
