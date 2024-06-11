<?php

namespace App\Filament\Resources\MateriaResource\Pages;

use App\Filament\Resources\MateriaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMateria extends CreateRecord
{
    protected static string $resource = MateriaResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_usuario'] = auth()->id();
        // print_r($data);
        return $data;
    }
}
