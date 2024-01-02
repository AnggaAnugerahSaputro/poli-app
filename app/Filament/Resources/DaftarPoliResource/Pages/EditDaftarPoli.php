<?php

namespace App\Filament\Resources\DaftarPoliResource\Pages;

use App\Filament\Resources\DaftarPoliResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDaftarPoli extends EditRecord
{
    protected static string $resource = DaftarPoliResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
