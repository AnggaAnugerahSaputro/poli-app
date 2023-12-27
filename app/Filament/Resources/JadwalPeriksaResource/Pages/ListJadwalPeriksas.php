<?php

namespace App\Filament\Resources\JadwalPeriksaResource\Pages;

use App\Filament\Resources\JadwalPeriksaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJadwalPeriksas extends ListRecords
{
    protected static string $resource = JadwalPeriksaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
