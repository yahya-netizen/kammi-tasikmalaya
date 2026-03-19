<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KomisariatResource\Pages;
use App\Models\Komisariat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KomisariatResource extends Resource
{
    protected static ?string $model = Komisariat::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationLabel = 'Komisariat';
    protected static ?string $modelLabel = 'Komisariat';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Komisariat')
                ->schema([
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Komisariat')
                        ->required()->maxLength(255),
                    Forms\Components\TextInput::make('kampus')
                        ->label('Nama Kampus/PT')
                        ->required()->maxLength(255),
                    Forms\Components\TextInput::make('kota')
                        ->default('Tasikmalaya')->maxLength(100),
                    Forms\Components\TextInput::make('jumlah_kader')
                        ->label('Jumlah Kader')
                        ->numeric()->default(0),
                    Forms\Components\Toggle::make('aktif')
                        ->label('Komisariat Aktif')
                        ->default(true),
                ])->columns(2),

            Forms\Components\Section::make('Kontak')
                ->schema([
                    Forms\Components\TextInput::make('ketua')
                        ->label('Nama Ketua')->maxLength(255),
                    Forms\Components\TextInput::make('no_hp_ketua')
                        ->label('No. HP Ketua')->maxLength(20),
                    Forms\Components\TextInput::make('email')
                        ->email()->maxLength(255),
                    Forms\Components\Textarea::make('alamat')
                        ->label('Alamat Sekretariat')->rows(2),
                ])->columns(2),

            Forms\Components\Section::make('Detail')
                ->schema([
                    Forms\Components\Textarea::make('deskripsi')->rows(4),
                    Forms\Components\FileUpload::make('foto')
                        ->image()->directory('komisariat'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')->circular(),
                Tables\Columns\TextColumn::make('nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('kampus')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('ketua')->label('Ketua'),
                Tables\Columns\TextColumn::make('jumlah_kader')->label('Kader')->sortable(),
                Tables\Columns\IconColumn::make('aktif')->boolean(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('aktif')->label('Status Aktif'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('nama');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListKomisariats::route('/'),
            'create' => Pages\CreateKomisariat::route('/create'),
            'edit'   => Pages\EditKomisariat::route('/{record}/edit'),
        ];
    }
}