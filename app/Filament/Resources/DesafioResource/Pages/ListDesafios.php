<?php

namespace App\Filament\Resources\DesafioResource\Pages;

use App\Filament\Resources\DesafioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDesafios extends ListRecords
{
    protected static string $resource = DesafioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
