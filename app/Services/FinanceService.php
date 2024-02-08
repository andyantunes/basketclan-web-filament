<?php

namespace App\Services;

use App\Models\{Finance, User};
use Filament\Forms\Components\{Fieldset, Grid, Select, TextInput};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Leandrocfe\FilamentPtbrFormFields\Money;

class FinanceService
{
    /**
     * Return's the schema for de Finance form
     * @return array
     */
    public static function getDataSchema(): array
    {
        return [
            Fieldset::make('Finança')
                ->id('formFinancial')
                ->schema([
                    Grid::make()
                        ->schema([
                            TextInput::make('name')
                                ->label('Nome')
                                ->required()
                                ->columnSpan(1),

                            TextInput::make('description')
                                ->label('Descrição')
                                ->columnSpan(1),
                        ])
                        ->columns(2),

                    Grid::make()
                        ->schema([

                            Money::make('value')
                                ->label('Valor')
                                ->prefix('R$')
                                ->required()
                                ->columnSpan(1),

                            // Select::make('users')
                            //     ->label('Integrantes')
                            //     ->placeholder('Selecione os integrantes')
                            //     ->multiple()
                            //     // ->options(User::where(function (Builder $query) {
                            //     //     $query->whereHas(
                            //     //         'roles',
                            //     //         fn (Builder $roleQuery) => $roleQuery->where('name', '!=', 'Admin')
                            //     //     );
                            //     // })->pluck('name', 'id'))
                            //     ->relationship('financials_users')
                            //     ->columnSpan(2)
                        ])
                        ->columns(3)
                ])
        ];
    }

    public static function getDebtUsersQuantity(Finance $record): int
    {
        return DB::table('financials_users')
            ->where('financial_id', $record->id)
            ->count();
    }

    public static function getPayingUsersQuantity(Finance $record): int
    {
        return DB::table('financials_users')
            ->where('financial_id', $record->id)
            ->whereNotNull('payment_date')
            ->count();
    }

    public static function getDebtorUsersQuantity(Finance $record): int
    {
        return DB::table('financials_users')
            ->where('financial_id', $record->id)
            ->whereNull('payment_date')
            ->count();
    }
}
