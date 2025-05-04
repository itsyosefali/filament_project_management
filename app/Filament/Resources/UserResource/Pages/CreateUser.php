<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Mail\UserCreatedMail;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $plainPassword = Str::random(8);
        $data['password'] = bcrypt($plainPassword);

        $this->plainPassword = $plainPassword;

        return $data;
    }

    protected function afterCreate(): void
    {
        try {
            $user = $this->getRecord();

            if (filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                Mail::to($user->email)->send(new UserCreatedMail($user, $this->plainPassword));
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
