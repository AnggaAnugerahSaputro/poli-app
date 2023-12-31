<?php

namespace App\Filament\Resources\DokterResource\Pages;

use App\Filament\Resources\DokterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDokter extends EditRecord
{
    protected static string $resource = DokterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
