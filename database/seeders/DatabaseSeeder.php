<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Tutor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Student::factory()
            ->count(10)
            ->has(Tutor::factory()->count(2), 'tutors')
            ->create();
    }
}
