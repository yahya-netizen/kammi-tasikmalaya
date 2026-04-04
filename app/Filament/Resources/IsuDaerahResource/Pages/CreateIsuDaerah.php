<?php

namespace App\Filament\Resources\IsuDaerahResource\Pages;

use App\Filament\Resources\IsuDaerahResource;
use Filament\Resources\Pages\CreateRecord;

class CreateIsuDaerah extends CreateRecord
{
    protected static string $resource = IsuDaerahResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
