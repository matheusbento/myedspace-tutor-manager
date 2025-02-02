<?php

namespace App\Filament\Resources\TutorResource\Pages;

use App\Filament\Resources\TutorResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditTutor extends EditRecord
{
    protected static string $resource = TutorResource::class;

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Tutor Updated')
            ->body('The tutor record has been successfully updated.')
            ->success();
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
