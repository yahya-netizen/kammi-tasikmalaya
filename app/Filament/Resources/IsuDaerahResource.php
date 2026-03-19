<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IsuDaerahResource\Pages;
use App\Models\IsuDaerah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class IsuDaerahResource extends Resource
{
    protected static ?string $model = IsuDaerah::class;
    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $navigationLabel = 'Isu Daerah';
    protected static ?string $modelLabel = 'Isu Daerah';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Utama')
                ->schema([
                    Forms\Components\TextInput::make('judul')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\Select::make('kategori')
                        ->options([
                            'transportasi'     => 'Transportasi',
                            'ekonomi-umkm'     => 'Ekonomi & UMKM',
                            'pendidikan'       => 'Pendidikan',
                            'lingkungan'       => 'Lingkungan Hidup',
                            'kebijakan-publik' => 'Kebijakan Publik',
                            'sosial'           => 'Sosial',
                        ])
                        ->required()
                        ->default('sosial'),

                    Forms\Components\Select::make('urgensi')
                        ->options([
                            'rendah'  => 'Rendah',
                            'sedang'  => 'Sedang',
                            'tinggi'  => 'Tinggi',
                            'kritis'  => 'Kritis',
                        ])
                        ->required()
                        ->default('sedang'),

                    Forms\Components\Select::make('status')
                        ->options([
                            'aktif'   => 'Aktif',
                            'selesai' => 'Selesai',
                            'arsip'   => 'Arsip',
                        ])
                        ->required()
                        ->default('aktif'),

                    Forms\Components\Toggle::make('featured')
                        ->label('Tampilkan sebagai isu unggulan')
                        ->default(false),
                ])->columns(2),

            Forms\Components\Section::make('Konten')
                ->schema([
                    Forms\Components\Textarea::make('deskripsi')
                        ->label('Deskripsi Singkat')
                        ->rows(3)
                        ->required()
                        ->maxLength(500)
                        ->columnSpanFull(),

                    Forms\Components\RichEditor::make('konten')
                        ->label('Konten Lengkap')
                        ->nullable()
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
                        ->directory('isu-daerah')
                        ->nullable(),
                ]),

            Forms\Components\Hidden::make('user_id')
                ->default(fn () => Auth::id()),
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
                    ->limit(45),

                Tables\Columns\TextColumn::make('kategori')
                    ->badge()
                    ->colors([
                        'info'    => 'transportasi',
                        'warning' => 'ekonomi-umkm',
                        'success' => 'pendidikan',
                        'primary' => 'lingkungan',
                        'danger'  => 'kebijakan-publik',
                        'gray'    => 'sosial',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'transportasi'     => 'Transportasi',
                        'ekonomi-umkm'     => 'Ekonomi & UMKM',
                        'pendidikan'       => 'Pendidikan',
                        'lingkungan'       => 'Lingkungan Hidup',
                        'kebijakan-publik' => 'Kebijakan Publik',
                        'sosial'           => 'Sosial',
                        default            => ucfirst($state),
                    }),

                Tables\Columns\TextColumn::make('urgensi')
                    ->badge()
                    ->colors([
                        'gray'    => 'rendah',
                        'warning' => 'sedang',
                        'danger'  => 'tinggi',
                        'primary' => 'kritis',
                    ])
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'success' => 'aktif',
                        'info'    => 'selesai',
                        'gray'    => 'arsip',
                    ])
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),

                Tables\Columns\IconColumn::make('featured')
                    ->label('Unggulan')
                    ->boolean(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Penulis')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options([
                        'transportasi'     => 'Transportasi',
                        'ekonomi-umkm'     => 'Ekonomi & UMKM',
                        'pendidikan'       => 'Pendidikan',
                        'lingkungan'       => 'Lingkungan Hidup',
                        'kebijakan-publik' => 'Kebijakan Publik',
                        'sosial'           => 'Sosial',
                    ]),

                Tables\Filters\SelectFilter::make('urgensi')
                    ->options([
                        'rendah'  => 'Rendah',
                        'sedang'  => 'Sedang',
                        'tinggi'  => 'Tinggi',
                        'kritis'  => 'Kritis',
                    ]),

                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'aktif'   => 'Aktif',
                        'selesai' => 'Selesai',
                        'arsip'   => 'Arsip',
                    ]),

                Tables\Filters\TernaryFilter::make('featured')
                    ->label('Isu Unggulan'),
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
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListIsuDaerahs::route('/'),
            'create' => Pages\CreateIsuDaerah::route('/create'),
            'edit'   => Pages\EditIsuDaerah::route('/{record}/edit'),
        ];
    }
}
