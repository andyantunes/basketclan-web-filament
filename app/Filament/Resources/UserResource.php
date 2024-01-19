<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use App\Services\UserService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Actions\{ActionGroup, BulkActionGroup, DeleteBulkAction, EditAction};
use Filament\Tables\Columns\{TextColumn};
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $modelLabel = 'Integrante';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 1;

    protected static ?string $slug = 'integrantes';

    public static ?string $pluralModelLabel = 'Integrantes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                self::getFormSchema('user'),
                self::getFormSchema('address'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('jersey_number')
                    ->label('Camiseta')
                    ->formatStateUsing(fn (string $state) => "#{$state}")
                    ->alignment(Alignment::Center)
                    ->searchable(),

                TextColumn::make('name')
                    ->label('Nome Completo')
                    ->alignment(Alignment::Center)
                    ->searchable(),

                TextColumn::make('nickname')
                    ->label('Apelido')
                    ->alignment(Alignment::Center)
                    ->searchable(),

                TextColumn::make('email')
                    ->label('E-mail')
                    ->alignment(Alignment::Center)
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('Telefone')
                    ->alignment(Alignment::Center)
                    ->searchable(),

                TextColumn::make('birthdate')
                    ->label('Data de Nascimento')
                    ->alignment(Alignment::Center)
                    ->searchable(),

                TextColumn::make('cpf')
                    ->label('CPF')
                    ->alignment(Alignment::Center)
                    ->searchable(),

                TextColumn::make('rg')
                    ->label('RG')
                    ->alignment(Alignment::Center)
                    ->searchable()
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make()
                        ->color('warning')
                ])->tooltip('Ações'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/criar'),
            'edit' => Pages\EditUser::route('/{record}/editar'),
        ];
    }

    private static function getFormSchema(string $type)
    {
        switch ($type) {
            case 'user':
                return UserService::getUserDataSchema();

                break;

            case 'address':
                return UserService::getAddressDataSchema();

                break;

            default:
                break;
        }
    }
}
