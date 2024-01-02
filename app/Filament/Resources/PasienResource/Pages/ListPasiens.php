<?php

namespace App\Filament\Resources\PasienResource\Pages;

use App\Filament\Resources\PasienResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPasiens extends ListRecords
{
    protected static string $resource = PasienResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
