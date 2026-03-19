<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublikasiResource\Pages;
use App\Models\Publikasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PublikasiResource extends Resource
{
    protected static ?string $model = Publikasi::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Publikasi';
    protected static ?string $modelLabel = 'Publikasi';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Utama')
                ->schema([
                    Forms\Components\TextInput::make('judul')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, Forms\Set $set)
                            => $set('slug', Str::slug($state))),

                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),

                    Forms\Components\Select::make('tipe')
                        ->options([
                            'berita'       => 'Berita',
                            'opini'        => 'Opini',
                            'laporan'      => 'Laporan',
                            'pengumuman'   => 'Pengumuman',
                        ])
                        ->required()
                        ->default('berita'),

                    Forms\Components\Select::make('status')
                        ->options([
                            'draft'      => 'Draft',
                            'publikasi'  => 'Publikasi',
                            'arsip'      => 'Arsip',
                        ])
                        ->required()
                        ->default('draft'),

                    Forms\Components\DateTimePicker::make('published_at')
                        ->label('Tanggal Publikasi')
                        ->nullable(),
                ])->columns(2),

            Forms\Components\Section::make('Konten')
                ->schema([
                    Forms\Components\Textarea::make('ringkasan')
                        ->rows(3)
                        ->maxLength(500)
                        ->nullable(),

                    Forms\Components\RichEditor::make('isi')
                        ->required()
                        ->columnSpanFull()
                        ->toolbarButtons([
                            'bold', 'italic', 'underline',
                            'bulletList', 'orderedList',
                            'h2', 'h3',
                            'link', 'blockquote',
                            'undo', 'redo',
                        ]),
                ]),

            Forms\Components\Section::make('Media')
                ->schema([
                    Forms\Components\FileUpload::make('gambar')
                        ->image()
                        ->directory('publikasi')
                        ->nullable(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->circular(),

                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('tipe')
                    ->badge()
                    ->colors([
                        'info'    => 'berita',
                        'warning' => 'opini',
                        'success' => 'laporan',
                        'gray'    => 'pengumuman',
                    ]),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'gray'    => 'draft',
                        'success' => 'publikasi',
                        'danger'  => 'arsip',
                    ]),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Penulis')
                    ->sortable(),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tgl Publikasi')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('tipe')
                    ->options([
                        'berita'     => 'Berita',
                        'opini'      => 'Opini',
                        'laporan'    => 'Laporan',
                        'pengumuman' => 'Pengumuman',
                    ]),

                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft'     => 'Draft',
                        'publikasi' => 'Publikasi',
                        'arsip'     => 'Arsip',
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
            'index'  => Pages\ListPublikasis::route('/'),
            'create' => Pages\CreatePublikasi::route('/create'),
            'edit'   => Pages\EditPublikasi::route('/{record}/edit'),
        ];
    }
}