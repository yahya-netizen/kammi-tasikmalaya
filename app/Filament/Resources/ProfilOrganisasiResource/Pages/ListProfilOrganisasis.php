<?php
namespace App\Filament\Resources\ProfilOrganisasiResource\Pages;
use App\Filament\Resources\ProfilOrganisasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListProfilOrganisasis extends ListRecords {
    protected static string $resource = ProfilOrganisasiResource::class;
    protected function getHeaderActions(): array { return [Actions\CreateAction::make()]; }
}
