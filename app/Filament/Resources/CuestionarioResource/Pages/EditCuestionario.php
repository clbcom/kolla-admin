<?php

namespace App\Filament\Resources\CuestionarioResource\Pages;

use App\Filament\Resources\CuestionarioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCuestionario extends EditRecord
{
    protected static string $resource = CuestionarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
