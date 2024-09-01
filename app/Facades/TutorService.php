<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class TutorService extends Facade
{
    /**
     * @see \App\Http\Services\TutorService
     *
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tutorService';
    }
}
