<?php

namespace Tests\Feature;

use App\Models\Student;
use App\Models\Tutor;
use Tests\MyEdSpaceTestCase;

class TutorTest extends MyEdSpaceTestCase
{
    public function testCanCreateATutor()
    {
        Tutor::factory()->create([
            'name' => 'John Doe',
        ]);
        $this->assertDatabaseHas('tutors', [
            'name' => 'John Doe',
        ]);
    }

    public function testCanUpdateATutor()
    {
        $tutor = Tutor::factory()->create();
        $tutor->name = 'John Doe';
        $tutor->save();
        $this->assertDatabaseHas('tutors', [
            'name' => 'John Doe',
        ]);
    }

    public function testCanDeleteATutor()
    {
        $tutor = Tutor::factory()->create();
        $tutor->delete();
        $this->assertDatabaseMissing('tutors', $tutor->toArray());
    }

    public function testCanAssignStudentToTutor()
    {
        $tutor = Tutor::factory()->has(
            Student::factory(), 'students'
        )->create();

        $student = $tutor->students->first();

        $this->assertDatabaseHas('student_tutors', [
            'student_id' => $student->id,
            'tutor_id' => $tutor->id,
        ]);
    }
}
