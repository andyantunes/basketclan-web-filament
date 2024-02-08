<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\Address;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $idUser = $data['id'];

        $address = Address::where('user_id', $idUser)->first();

        $data['postal_code'] = $address->postal_code ?? '';
        $data['street'] = $address->street ?? '';
        $data['number'] = $address->number ?? '';
        $data['complement'] = $address->complement ?? '';
        $data['district'] = $address->district ?? '';
        $data['city'] = $address->city ?? '';
        $data['uf'] = $address->uf ?? '';

        return $data;
    }

    protected function afterSave(): void
    {
        $user = $this->getRecord();

        Address::updateOrCreate(
            ['user_id' => $user->id],
            [
                'postal_code' => $this->data['postal_code'],
                'street' => $this->data['street'],
                'number' => $this->data['number'],
                'complement' => $this->data['complement'],
                'district' => $this->data['district'],
                'city' => $this->data['city'],
                'uf' => $this->data['uf'],
            ],
        );
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Integrante atualizado';
    }
}
