<?php

namespace App\Services;

use Filament\Forms\Components\{Fieldset, Grid, TextInput};
use Leandrocfe\FilamentPtbrFormFields\{Cep, Document};

class UserService
{
    public static function getUserDataSchema()
    {
        return Fieldset::make('Dados Pessoais')
            ->id('formUserData')
            ->schema([

                Grid::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Nome Completo')
                            ->placeholder('Nome Completo')
                            ->required()
                            ->columnSpan(2),


                        TextInput::make('nickname')
                            ->label('Apelido')
                            ->placeholder('Apelido')
                            ->validationAttribute('Apelido')
                            ->minLength(2)
                            ->columnSpan(2),

                        TextInput::make('email')
                            ->label('E-mail')
                            ->placeholder('E-mail')
                            ->email()
                            ->required()
                            ->columnSpan(2),
                    ])
                    ->columns(6),


                Grid::make()
                    ->schema([
                        TextInput::make('phone')
                            ->label('Telefone')
                            ->placeholder('Digite o telefone')
                            ->validationAttribute('Telefone')
                            ->extraAlpineAttributes(['x-mask:dynamic' => '$input.length >=15 ? \'(99) 99999-9999\' : \'(99) 9999-9999\''])
                            ->minLength(14)
                            ->maxLength(15)
                            ->required()
                            ->columnSpan(1),

                        TextInput::make('birthdate')
                            ->label('Data Nascimento')
                            ->mask('99/99/9999')
                            ->placeholder('dd/mm/yyyy')
                            ->maxLength(10)
                            ->columnSpan(1),

                        Document::make('cpf')
                            ->label('CPF')
                            ->placeholder('000.000.000-00')
                            ->validationAttribute('CPF')
                            ->validation(true)
                            ->cpf()
                            ->columnSpan(1),

                        TextInput::make('rg')
                            ->label('RG')
                            ->mask('99.999.999-9')
                            ->placeholder('00.000.000-0')
                            ->validationAttribute('RG')
                            ->minLength(12)
                            ->maxLength(20)
                            ->columnSpan(1),

                        TextInput::make('jersey_number')
                            ->label('Número Camiseta')
                            ->placeholder('Número da camiseta')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(99)
                            ->validationAttribute('Número')
                            ->columnSpan(1),
                    ])
                    ->columns(6),
            ]);
    }

    public static function getAddressDataSchema()
    {
        return Fieldset::make('Endereço')
            ->id('formAddress')
            ->schema([
                Grid::make(['sm' => 1])
                    ->schema([
                        Cep::make('postal_code')
                            ->viaCep(
                                mode: 'none',
                                errorMessage: 'CEP inválido.',
                                setFields: [
                                    'street' => 'logradouro',
                                    'number' => 'numero',
                                    'complement' => 'complemento',
                                    'district' => 'bairro',
                                    'city' => 'localidade',
                                    'uf' => 'uf',
                                ]
                            )
                            ->label('CEP')
                            ->validationAttribute('CEP')
                            ->required()
                            ->live(true)
                            ->columnSpan(['md' => 1, 'sm' => 1]),

                        TextInput::make('city')
                            ->label('Cidade')
                            ->validationAttribute('Cidade')
                            ->required()
                            ->columnSpan(['md' => 3, 'sm' => 1]),

                        TextInput::make('district')
                            ->label('Bairro')
                            ->validationAttribute('Bairro')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(['md' => 2, 'sm' => 1]),
                    ])
                    ->columns(['md' => 6, 'sm' => 1,]),

                Grid::make(['sm' => 1])
                    ->schema([
                        TextInput::make('street')
                            ->label('Rua')
                            ->validationAttribute('Rua')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(['md' => 3, 'sm' => 1]),

                        TextInput::make('number')
                            ->label('Número')
                            ->numeric()
                            ->required()
                            ->maxLength(9)
                            ->columnSpan(['md' => 1, 'sm' => 1]),

                        TextInput::make('uf')
                            ->label('Estado')
                            ->validationAttribute('Estado')
                            ->required()
                            ->minLength(2)
                            ->maxLength(2)
                            ->columnSpan(['md' => 1, 'sm' => 1]),

                        TextInput::make('complement')
                            ->label('Complemento')
                            ->maxLength(255)
                            ->columnSpan(['md' => 2, 'sm' => 1]),

                        TextInput::make('country')
                            ->label('País')
                            ->validationAttribute('País')
                            ->default('Brasil')
                            ->disabled()
                            ->columnSpan(['md' => 1, 'sm' => 1]),
                    ])
                    ->columns(['md' => 8, 'sm' => 1,]),


            ]);
    }
}
