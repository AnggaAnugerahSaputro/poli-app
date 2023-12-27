<?php

namespace App\Filament\Resources\JadwalPeriksaResource\Pages;

use App\Filament\Resources\JadwalPeriksaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJadwalPeriksa extends EditRecord
{
    protected static string $resource = JadwalPeriksaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
