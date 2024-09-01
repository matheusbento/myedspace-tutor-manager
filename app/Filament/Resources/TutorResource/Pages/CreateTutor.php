<?php

namespace App\Filament\Resources\TutorResource\Pages;

use App\Filament\Resources\TutorResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateTutor extends CreateRecord
{
    protected static string $resource = TutorResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Tutor Created')
            ->body('The tutor record has been successfully created.')
            ->success();
    }
}
