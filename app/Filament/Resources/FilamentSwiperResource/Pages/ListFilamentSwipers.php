<?php

namespace App\Filament\Resources\FilamentSwiperResource\Pages;

use App\Filament\Resources\FilamentSwiperResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFilamentSwipers extends ListRecords
{
    protected static string $resource = FilamentSwiperResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
