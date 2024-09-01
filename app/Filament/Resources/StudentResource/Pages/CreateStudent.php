<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Student Created')
            ->body('The student record has been successfully created.')
            ->success();
    }
}
