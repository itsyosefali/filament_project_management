<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Mail\UserCreatedMail;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Mail;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function afterCreate(): void
    {
        try {
            $user = $this->getRecord();

            if (filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                Mail::to($user->email)->send(new UserCreatedMail($user));
            }
        } catch (\Exception $e) {
            logger()->error('User creation email failed: ' . $e->getMessage());
            Notification::make()
                ->title('Email Error')
                ->body('User created but email failed to send')
                ->danger()
                ->send();
        }
    }
}
