<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use App\Services\UserService;
use Filament\Forms\{Form, Get};
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Actions\{ActionGroup, EditAction};
use Filament\Tables\Columns\TextColumn;
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
                FileUpload::make('avatar')
                    ->label('')
                    ->avatar()
                    ->downloadable()
                    ->moveFiles()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('3:4')
                    ->visibility('public')
                    ->directory('/users/avatar')
                    ->getUploadedFileNameForStorageUsing(
                        function (Get $get) {
                            dd($get('nickname'));
                        },
                    ),

                self::getFormSchema('user'),
                self::getFormSchema('address'),
                self::getFormSchema('attachment'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),

                TextColumn::make('jersey_number')
                    ->label('Camiseta')
                    ->default('')
                    ->formatStateUsing(fn (string $state) => empty($state) ? '-' : "#{$state}")
                    ->alignment(Alignment::Center)
                    ->searchable(),

                TextColumn::make('name')
                    ->label('Nome Completo')
                    ->default('-')
                    ->alignment(Alignment::Center)
                    ->searchable(),

                TextColumn::make('nickname')
                    ->label('Apelido')
                    ->default('-')
                    ->alignment(Alignment::Center)
                    ->searchable(),

                TextColumn::make('email')
                    ->label('E-mail')
                    ->default('-')
                    ->alignment(Alignment::Center)
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('Telefone')
                    ->default('-')
                    ->alignment(Alignment::Center)
                    ->searchable(),

                TextColumn::make('birthdate')
                    ->label('Data de Nascimento')
                    ->default('-')
                    ->alignment(Alignment::Center)
                    ->searchable(),

                TextColumn::make('cpf')
                    ->label('CPF')
                    ->default('-')
                    ->alignment(Alignment::Center)
                    ->searchable(),

                TextColumn::make('rg')
                    ->label('RG')
                    ->default('-')
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

            case 'attachment':
                return UserService::getAttachmentSchema();

                break;

            default:
                break;
        }
    }
}
