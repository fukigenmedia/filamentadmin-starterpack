<?php

namespace App\Filament\Resources\Account\UserResource\Pages;

use App\Filament\Resources\Account\UserResource;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['password'] = null;

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['password'] === null) {
            unset($data['password']);
        }

        return $data;
    }
}
