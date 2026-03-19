<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KontakResource\Pages;
use App\Models\Kontak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KontakResource extends Resource
{
    protected static ?string $model = Kontak::class;
    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Pesan Masuk';
    protected static ?string $modelLabel = 'Pesan';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Pengirim')
                ->schema([
                    Forms\Components\TextInput::make('nama')->disabled(),
                    Forms\Components\TextInput::make('email')->disabled(),
                    Forms\Components\TextInput::make('no_hp')
                        ->label('No. HP')->disabled(),
                    Forms\Components\Select::make('status')
                        ->options([
                            'baru'    => 'Baru',
                            'dibaca'  => 'Dibaca',
                            'dibalas' => 'Dibalas',
                        ])->required(),
                ])->columns(2),
            Forms\Components\Section::make('Pesan')
                ->schema([
                    Forms\Components\TextInput::make('subjek')
                        ->disabled()->columnSpanFull(),
                    Forms\Components\Textarea::make('pesan')
                        ->disabled()->rows(6)->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'danger'  => 'baru',
                        'warning' => 'dibaca',
                        'success' => 'dibalas',
                    ])
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('subjek')->limit(40),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Diterima')->dateTime('d M Y')->sortable(),
                ])
                ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(['baru'=>'Baru','dibaca'=>'Dibaca','dibalas'=>'Dibalas']),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Buka'),
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
            'index' => Pages\ListKontaks::route('/'),
            'edit'  => Pages\EditKontak::route('/{record}/edit'),
        ];
    }
}