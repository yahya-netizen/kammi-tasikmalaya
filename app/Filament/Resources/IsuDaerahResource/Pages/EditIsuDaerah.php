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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['user_id'])) {
            $data['user_id'] = auth()->id();
        }

        return $data;
    }
}
