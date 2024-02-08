<?php

namespace App\Filament\Resources\FinanceResource\Pages;

use App\Filament\Resources\FinanceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\DB;

class EditFinance extends EditRecord
{
    protected static string $resource = FinanceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterSave(): void
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

        DB::table('financials_users')->where('financial_id', $finance->id)->delete();
        DB::table('financials_users')->insert($insertData);
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Débito atualizado';
    }
}
