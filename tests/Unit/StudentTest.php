<?php

namespace Tests\Unit;

use App\Models\Student;
use App\Models\Tutor;
use Tests\MyEdSpaceTestCase;

class StudentTest extends MyEdSpaceTestCase
{
    public function testCanCreateAStudent()
    {
        $student = Student::factory()->create();
        $this->assertDatabaseHas('students', $student->toArray());
    }

    public function testCanUpdateAStudent()
    {
        $student = Student::factory()->create();
        $student->name = 'John Doe';
        $student->save();
        $this->assertDatabaseHas('students', [
            'name' => 'John Doe',
        ]);
    }

    public function testCanDeleteAStudent()
    {
        $student = Student::factory()->create();
        $student->delete();
        $this->assertDatabaseMissing('students', $student->toArray());
    }

    public function testCanAssignTutorToStudent()
    {
        $student = Student::factory()->has(
            Tutor::factory(), 'tutors'
        )->create();

        $tutor = $student->tutors->first();

        $this->assertDatabaseHas('student_tutors', [
            'student_id' => $student->id,
            'tutor_id' => $tutor->id,
        ]);
    }
}
