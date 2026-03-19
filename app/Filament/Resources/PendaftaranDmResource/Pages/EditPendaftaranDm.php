<?php

namespace App\Filament\Resources\PendaftaranDmResource\Pages;

use App\Filament\Resources\PendaftaranDmResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPendaftaranDm extends EditRecord
{
    protected static string $resource = PendaftaranDmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}