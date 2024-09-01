<?php

namespace App\Livewire;

use App\Enums\Subject;
use App\Models\Tutor;
use Livewire\Component;

class TutorSearch extends Component
{
    public string $live_search = '';
    public array $subjects = [];
    public array $searchSubjects = [];

    public int $min = 0;
    public int $max = 0;

    public function mount(): void
    {
        $this->subjects = Subject::toArray();
        $this->min = Tutor::min('hourly_rate');
        $this->max = Tutor::max('hourly_rate');
    }

    public function render()
    {
        $builder = Tutor::query();

        if ($this->live_search) {
            if (is_numeric($this->live_search)) {
                $builder->where('hourly_rate', $this->live_search);
            } else {
                $subjects = explode(',', $this->live_search);

                $builder->where(function ($query) use ($subjects) {
                    foreach ($subjects as $subject) {
                        $query->orWhereJsonContains('subjects', $subject);
                    }
                });
            }
        }

        if ($this->searchSubjects) {
            foreach ($this->searchSubjects as $subject) {
                $builder->orWhereJsonContains('subjects', $subject);
            }
        }

        $tutors = $builder->whereBetween('hourly_rate', [$this->min, $this->max])->get();

        return view('livewire.tutors.search.tutors-search', [
            'tutors' => $tutors,
            'subjects' => $this->subjects,
        ]);
    }

    public function search(): void
    {
        $this->render();
    }
}
