<?php

namespace Tests\Feature;

use App\Filament\Resources\StudentResource;
use App\Filament\Resources\StudentResource\Pages\EditStudent;
use App\Models\Student;
use Livewire\Livewire;
use Tests\MyEdSpaceTestCase;

class StudentResourceTest extends MyEdSpaceTestCase
{
    public function testStudentResourceCanBeRendered()
    {
        $this->createAdminUserAndLogin();
        Student::factory()->create();
        $response = $this->get(StudentResource::getUrl('index'));
        $response->assertSuccessful();
    }

    public function testStudentResourceEditCanBeRendered()
    {
        $this->createAdminUserAndLogin();
        $response = $this->get(StudentResource::getUrl('edit', [
            'record' => Student::factory()->create(),
        ]));
        $response->assertSuccessful();
    }

    public function testStudentResourceCreateCanBeRendered()
    {
        $this->createAdminUserAndLogin();
        $response = $this->get(StudentResource::getUrl('create'));
        $response->assertSuccessful();
    }

    public function testStudentResourceCanEditStudent()
    {
        $this->createAdminUserAndLogin();
        $student = Student::factory()->create();
        $newData = Student::factory()->make();

        Livewire::test(EditStudent::class, [
            'record' => $student->getRouteKey(),
        ])
            ->fillForm([
                'id' => $student->id,
                'name' => $newData->name,
                'email' => $newData->email,
                'grade_level' => $newData->grade_level,
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('students', [
            'id' => $student->id,
            'name' => $newData->name,
            'email' => $newData->email,
            'grade_level' => $newData->grade_level,
        ]);
    }
}
