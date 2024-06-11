<?php

namespace App\Filament\Resources\MateriaResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Log;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\MateriaResource;

class EditMateria extends EditRecord
{
    protected static string $resource = MateriaResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
