<?php

namespace App\Filament\Resources\IsuDaerahResource\Pages;

use App\Filament\Resources\IsuDaerahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIsuDaerah extends EditRecord
{
    protected static string $resource = IsuDaerahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
