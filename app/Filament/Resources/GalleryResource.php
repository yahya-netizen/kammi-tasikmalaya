<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Galeri Foto';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::class::make([
                    Forms\Components\FileUpload::class::make('foto')
                        ->image()
                        ->directory('gallery')
                        ->required()
                        ->label('Foto Galeri'),
                    Forms\Components\Textarea::class::make('keterangan')
                        ->nullable()
                        ->rows(3)
                        ->label('Keterangan / Caption'),
                    Forms\Components\Toggle::class::make('is_aktif')
                        ->default(true)
                        ->label('Tampilkan di Website'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::class::make('foto')
                    ->square(),
                Tables\Columns\TextColumn::class::make('keterangan')
                    ->label('Keterangan')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\IconColumn::class::make('is_aktif')
                    ->boolean()
                    ->label('Status'),
                Tables\Columns\TextColumn::class::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::class::make(),
                Tables\Actions\DeleteAction::class::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::class::make([
                    Tables\Actions\DeleteBulkAction::class::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
