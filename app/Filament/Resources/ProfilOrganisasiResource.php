<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfilOrganisasiResource\Pages;
use App\Models\ProfilOrganisasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProfilOrganisasiResource extends Resource
{
    protected static ?string $model = ProfilOrganisasi::class;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'Profil Organisasi';
    protected static ?string $modelLabel = 'Konten';
    protected static ?string $navigationGroup = 'Pengaturan';
    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Identitas Konten')
                ->schema([
                    Forms\Components\Select::make('kunci')
                        ->label('Jenis Halaman')
                        ->options([
                            'sejarah'  => 'Sejarah KAMMI Tasikmalaya',
                            'visi_misi'=> 'Visi & Misi',
                            'mars'     => 'Mars KAMMI',
                            'hymne'    => 'Hymne KAMMI',
                        ])
                        ->required()
                        ->unique(ignoreRecord: true),
                    Forms\Components\TextInput::make('judul')
                        ->label('Judul Halaman')
                        ->maxLength(255),
                ])->columns(2),

            Forms\Components\Section::make('Konten')
                ->schema([
                    Forms\Components\RichEditor::make('konten')
                        ->label('Isi Konten (teks/HTML)')
                        ->toolbarButtons([
                            'bold', 'italic', 'underline',
                            'bulletList', 'orderedList',
                            'h2', 'h3', 'blockquote',
                            'link', 'undo', 'redo',
                        ])
                        ->nullable()
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Media (untuk Mars & Hymne)')
                ->schema([
                    Forms\Components\TextInput::make('url_youtube')
                        ->label('URL YouTube (embed)')
                        ->placeholder('https://www.youtube.com/watch?v=...')
                        ->url()
                        ->nullable(),
                    Forms\Components\FileUpload::make('file_audio')
                        ->label('File Audio (MP3)')
                        ->acceptedFileTypes(['audio/mpeg', 'audio/mp3'])
                        ->directory('audio')
                        ->nullable(),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kunci')
                    ->label('Jenis')
                    ->formatStateUsing(fn ($state) => match($state) {
                        'sejarah'   => 'Sejarah',
                        'visi_misi' => 'Visi & Misi',
                        'mars'      => 'Mars KAMMI',
                        'hymne'     => 'Hymne KAMMI',
                        default     => ucfirst($state),
                    })
                    ->badge()
                    ->color('primary'),
                Tables\Columns\TextColumn::make('judul')->label('Judul')->limit(50),
                Tables\Columns\IconColumn::make('konten')->label('Ada Konten')->boolean()
                    ->getStateUsing(fn ($record) => !empty($record->konten)),
                Tables\Columns\IconColumn::make('url_youtube')->label('YouTube')->boolean()
                    ->getStateUsing(fn ($record) => !empty($record->url_youtube)),
                Tables\Columns\TextColumn::make('updated_at')->label('Diperbarui')->dateTime('d M Y')->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProfilOrganisasis::route('/'),
            'create' => Pages\CreateProfilOrganisasi::route('/create'),
            'edit'   => Pages\EditProfilOrganisasi::route('/{record}/edit'),
        ];
    }
}
