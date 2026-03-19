<?php

namespace App\Filament\Resources\PendaftaranDmResource\Pages;

use App\Filament\Resources\PendaftaranDmResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPendaftaranDms extends ListRecords
{
    protected static string $resource = PendaftaranDmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}