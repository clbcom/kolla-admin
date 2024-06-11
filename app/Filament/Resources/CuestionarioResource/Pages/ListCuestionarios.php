<?php

namespace App\Filament\Resources\CuestionarioResource\Pages;

use App\Filament\Resources\CuestionarioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCuestionarios extends ListRecords
{
    protected static string $resource = CuestionarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
