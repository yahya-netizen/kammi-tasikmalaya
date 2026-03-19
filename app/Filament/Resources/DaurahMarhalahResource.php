<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaurahMarhalahResource\Pages;
use App\Models\DaurahMarhalah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DaurahMarhalahResource extends Resource
{
    protected static ?string $model = DaurahMarhalah::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Daurah Marhalah';
    protected static ?string $modelLabel = 'Daurah Marhalah';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Daurah')
                ->schema([
                    Forms\Components\TextInput::make('nama')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Select::make('level')
                        ->options([
                            'DM1' => 'Daurah Marhalah I',
                            'DM2' => 'Daurah Marhalah II',
                            'DM3' => 'Daurah Marhalah III',
                        ])
                        ->required(),

                    Forms\Components\Select::make('status')
                        ->options([
                            'akan_datang' => 'Akan Datang',
                            'berlangsung' => 'Berlangsung',
                            'selesai'     => 'Selesai',
                        ])
                        ->required()
                        ->default('akan_datang'),

                    Forms\Components\TextInput::make('kuota')
                        ->numeric()
                        ->required()
                        ->default(30),

                    Forms\Components\TextInput::make('lokasi')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('penyelenggara')
                        ->maxLength(255)
                        ->nullable(),

                    Forms\Components\DatePicker::make('tanggal_mulai')
                        ->required(),

                    Forms\Components\DatePicker::make('tanggal_selesai')
                        ->required(),
                ])->columns(2),

            Forms\Components\Section::make('Deskripsi')
                ->schema([
                    Forms\Components\Textarea::make('deskripsi')
                        ->rows(4)
                        ->nullable(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('level')
                    ->badge()
                    ->colors([
                        'info'    => 'DM1',
                        'warning' => 'DM2',
                        'success' => 'DM3',
                    ]),

                Tables\Columns\TextColumn::make('lokasi')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('kuota')
                    ->label('Kuota'),

                Tables\Columns\TextColumn::make('pendaftarans_count')
                    ->label('Pendaftar')
                    ->counts('pendaftarans'),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'info'    => 'akan_datang',
                        'warning' => 'berlangsung',
                        'success' => 'selesai',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListDaurahMarhalah::route('/'),
            'create' => Pages\CreateDaurahMarhalah::route('/create'),
            'edit'   => Pages\EditDaurahMarhalah::route('/{record}/edit'),
        ];
    }
}