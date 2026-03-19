<?php

namespace App\Filament\Resources\DaurahMarhalahResource\Pages;

use App\Filament\Resources\DaurahMarhalahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDaurahMarhalah extends EditRecord
{
    protected static string $resource = DaurahMarhalahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}