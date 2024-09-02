<?php

namespace App\Livewire;

use App\Enums\Subject;
use App\Models\Tutor;
use Livewire\Component;

class TutorSearch extends Component
{
    public string $liveSearch = '';

    public array $subjects = [];

    public array $subjectsSearch = [];

    public ?int $minHourlySearch = null;

    public ?int $maxHourlySearch = null;

    public ?int $minHourly = null;

    public ?int $maxHourly = null;

    public function mount(): void
    {
        $this->subjects = Subject::toArray();

        $this->minHourly = Tutor::min('hourly_rate');
        $this->maxHourly = Tutor::max('hourly_rate');

        $this->minHourlySearch = $this->minHourlySearch ?? $this->minHourly;
        $this->maxHourlySearch = $this->maxHourlySearch ?? $this->maxHourly;
    }

    public function render()
    {
        $builder = Tutor::query();

        if ($this->liveSearch) {
            if (is_numeric($this->liveSearch)) {
                $builder->where('hourly_rate', $this->liveSearch);
            } else {
                $subjects = explode(',', $this->liveSearch);

                $builder->where(function ($query) use ($subjects) {
                    foreach ($subjects as $subject) {
                        $query->orWhereJsonContains('subjects', $subject);
                    }
                });
            }
        }

        if ($this->subjectsSearch) {
            foreach ($this->subjectsSearch as $subject) {
                $builder->orWhereJsonContains('subjects', $subject);
            }
        }

        $tutors = $builder->whereBetween('hourly_rate', [$this->minHourlySearch, $this->maxHourlySearch])->get();

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
