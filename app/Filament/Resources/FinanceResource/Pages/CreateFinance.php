<?php

namespace App\Filament\Resources\FinanceResource\Pages;

use App\Filament\Resources\FinanceResource;
use App\Models\Finance;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\DB;

class CreateFinance extends CreateRecord
{
    protected static string $resource = FinanceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        $finance = $this->getRecord();

        $idUsers = $this->data['users'];

        $insertData = [];
        foreach ($idUsers as $idUser) {
            array_push($insertData, [
                'financial_id' => $finance->id,
                'user_id' => $idUser,
            ]);
        }

        DB::table('financials_users')->insert($insertData);
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Débito criado';
    }
}
