<?php

namespace App\Filament\Resources\PeriksaResource\Pages;

use App\Filament\Resources\PeriksaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeriksas extends ListRecords
{
    protected static string $resource = PeriksaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
