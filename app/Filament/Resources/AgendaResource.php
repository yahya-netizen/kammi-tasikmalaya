<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaResource\Pages;
use App\Models\Agenda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Agenda';
    protected static ?string $modelLabel = 'Agenda';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Agenda')
                ->schema([
                    Forms\Components\TextInput::make('judul')
                        ->required()->maxLength(255)->columnSpanFull(),
                    Forms\Components\Select::make('kategori')
                        ->options([
                            'daerah'     => 'Daerah',
                            'komisariat' => 'Komisariat',
                            'kaderisasi' => 'Kaderisasi',
                            'advokasi'   => 'Advokasi',
                            'bkm'        => 'BKM',
                            'lainnya'    => 'Lainnya',
                        ])->required()->default('daerah'),
                    Forms\Components\Select::make('status')
                        ->options([
                            'akan_datang' => 'Akan Datang',
                            'berlangsung' => 'Berlangsung',
                            'selesai'     => 'Selesai',
                            'dibatalkan'  => 'Dibatalkan',
                        ])->required()->default('akan_datang'),
                    Forms\Components\Toggle::make('featured')
                        ->label('Tampilkan di Beranda'),
                    Forms\Components\DateTimePicker::make('tanggal_mulai')
                        ->required(),
                    Forms\Components\DateTimePicker::make('tanggal_selesai')
                        ->nullable(),
                    Forms\Components\TextInput::make('lokasi')
                        ->maxLength(255)->columnSpanFull(),
                ])->columns(2),
            Forms\Components\Section::make('Deskripsi')
                ->schema([
                    Forms\Components\Textarea::make('deskripsi')->rows(4),
                ]),
            Forms\Components\Hidden::make('user_id')
                ->default(fn () => Auth::id()),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->searchable()->sortable()->limit(40),
                Tables\Columns\BadgeColumn::make('kategori')
                    ->colors([
                        'primary' => 'daerah',
                        'warning' => 'komisariat',
                        'success' => 'kaderisasi',
                        'danger'  => 'advokasi',
                        'info'    => 'bkm',
                        'gray'    => 'lainnya',
                    ])
                    ->formatStateUsing(fn ($s) => match($s) {
                        'daerah'=>'Daerah','komisariat'=>'Komisariat',
                        'kaderisasi'=>'Kaderisasi','advokasi'=>'Advokasi',
                        'bkm'=>'BKM', default=>'Lainnya',
                    }),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'info'    => 'akan_datang',
                        'warning' => 'berlangsung',
                        'success' => 'selesai',
                        'danger'  => 'dibatalkan',
                    ])
                    ->formatStateUsing(fn ($s) => match($s) {
                        'akan_datang'=>'Akan Datang','berlangsung'=>'Berlangsung',
                        'selesai'=>'Selesai', default=>'Dibatalkan',
                    }),
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->dateTime('d M Y, H:i')->sortable(),
                Tables\Columns\TextColumn::make('lokasi')->limit(28),
                Tables\Columns\IconColumn::make('featured')->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options(['daerah'=>'Daerah','komisariat'=>'Komisariat','kaderisasi'=>'Kaderisasi','advokasi'=>'Advokasi','bkm'=>'BKM','lainnya'=>'Lainnya']),
                Tables\Filters\SelectFilter::make('status')
                    ->options(['akan_datang'=>'Akan Datang','berlangsung'=>'Berlangsung','selesai'=>'Selesai','dibatalkan'=>'Dibatalkan']),
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
            ->defaultSort('tanggal_mulai', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListAgendas::route('/'),
            'create' => Pages\CreateAgenda::route('/create'),
            'edit'   => Pages\EditAgenda::route('/{record}/edit'),
        ];
    }
}