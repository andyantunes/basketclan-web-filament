<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\Address;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = '12345678';

        return $data;
    }

    protected function afterCreate(): void
    {
        $user = $this->getRecord();

        Address::create([
            'user_id'       => $user->id,
            'postal_code'   => $this->data['postal_code'],
            'street'        => $this->data['street'],
            'number'        => $this->data['number'],
            'complement'    => $this->data['complement'],
            'district'      => $this->data['district'],
            'city'          => $this->data['city'],
            'uf'            => $this->data['uf'],
        ]);
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Integrante criado';
    }
}
