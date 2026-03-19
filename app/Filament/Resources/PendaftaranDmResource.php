<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftaranDmResource\Pages;
use App\Models\DaurahMarhalah;
use App\Models\PendaftaranDm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PendaftaranDmResource extends Resource
{
    protected static ?string $model = PendaftaranDm::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Pendaftaran DM';
    protected static ?string $modelLabel = 'Pendaftaran DM';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Data Peserta')
                ->schema([
                    Forms\Components\Select::make('daurah_marhalah_id')
                        ->label('Daurah Marhalah')
                        ->options(DaurahMarhalah::where('status', '!=', 'selesai')
                            ->pluck('nama', 'id'))
                        ->required()
                        ->searchable(),

                    Forms\Components\TextInput::make('nama_lengkap')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('nim')
                        ->label('NIM')
                        ->maxLength(20)
                        ->nullable(),

                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('no_hp')
                        ->label('No. HP / WhatsApp')
                        ->tel()
                        ->required()
                        ->maxLength(20),

                    Forms\Components\Select::make('jenis_kelamin')
                        ->options([
                            'ikhwan' => 'Ikhwan (Laki-laki)',
                            'akhwat' => 'Akhwat (Perempuan)',
                        ])
                        ->required(),

                    Forms\Components\TextInput::make('komisariat')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('kampus')
                        ->required()
                        ->maxLength(255),
                ])->columns(2),

            Forms\Components\Section::make('Status')
                ->schema([
                    Forms\Components\Select::make('status')
                        ->options([
                            'menunggu' => 'Menunggu Verifikasi',
                            'diterima' => 'Diterima',
                            'ditolak'  => 'Ditolak',
                            'hadir'    => 'Hadir',
                        ])
                        ->required()
                        ->default('menunggu'),

                    Forms\Components\Textarea::make('catatan')
                        ->rows(3)
                        ->nullable(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('daurahMarhalah.nama')
                    ->label('Daurah')
                    ->searchable(),

                Tables\Columns\TextColumn::make('daurahMarhalah.level')
                    ->label('Level')
                    ->badge()
                    ->colors([
                        'info'    => 'DM1',
                        'warning' => 'DM2',
                        'success' => 'DM3',
                    ]),

                Tables\Columns\TextColumn::make('komisariat')
                    ->searchable(),

                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->badge()
                    ->colors([
                        'info'    => 'ikhwan',
                        'warning' => 'akhwat',
                    ]),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'gray'    => 'menunggu',
                        'success' => 'diterima',
                        'danger'  => 'ditolak',
                        'info'    => 'hadir',
                    ]),

                Tables\Columns\TextColumn::make('no_hp')
                    ->label('No. HP'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tgl Daftar')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('daurahMarhalah')
                    ->label('Daurah')
                    ->relationship('daurahMarhalah', 'nama'),

                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'menunggu' => 'Menunggu',
                        'diterima' => 'Diterima',
                        'ditolak'  => 'Ditolak',
                        'hadir'    => 'Hadir',
                    ]),

                Tables\Filters\SelectFilter::make('jenis_kelamin')
                    ->options([
                        'ikhwan' => 'Ikhwan',
                        'akhwat' => 'Akhwat',
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
            'index'  => Pages\ListPendaftaranDms::route('/'),
            'create' => Pages\CreatePendaftaranDm::route('/create'),
            'edit'   => Pages\EditPendaftaranDm::route('/{record}/edit'),
        ];
    }
}
