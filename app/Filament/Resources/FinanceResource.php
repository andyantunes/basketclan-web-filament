<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FinanceResource\Pages;
use App\Filament\Resources\FinanceResource\RelationManagers\UsersRelationManager;
use App\Models\Finance;
use App\Models\User;
use App\Services\FinanceService;
use Filament\Tables\Actions\{ActionGroup, EditAction};
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;

class FinanceResource extends Resource
{
    protected static ?string $model = Finance::class;

    protected static ?string $modelLabel = 'Finança';

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?int $navigationSort = 2;

    protected static ?string $slug = 'financas';

    public static ?string $pluralModelLabel = 'Finanças';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(FinanceService::getDataSchema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->alignment(Alignment::Center)
                    ->searchable(),

                TextColumn::make('description')
                    ->label('Descrição')
                    ->alignment(Alignment::Center)
                    ->default('-')
                    ->searchable(),

                TextColumn::make('value')
                    ->label('Valor')
                    ->alignment(Alignment::Center)
                    ->money('BRL'),

                TextColumn::make('user_quantity')
                    ->label('Qtd. Usuários')
                    ->alignment(Alignment::Center)
                    ->default(fn (Finance $record) => FinanceService::getDebtUsersQuantity($record)),

                TextColumn::make('user_paid_quantity')
                    ->label('Qtd. Pagantes')
                    ->alignment(Alignment::Center)
                    ->default(fn (Finance $record) => FinanceService::getPayingUsersQuantity($record)),

                TextColumn::make('debtor_user_quantity')
                    ->label('Qtd. Devedores')
                    ->alignment(Alignment::Center)
                    ->default(fn (Finance $record) => FinanceService::getDebtorUsersQuantity($record)),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make()
                        ->color('warning')
                ])->tooltip('Ações'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            UsersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFinances::route('/'),
            'create' => Pages\CreateFinance::route('/criar'),
            'edit' => Pages\EditFinance::route('/{record}/editar'),
        ];
    }
}
