<?php

namespace App\Filament\Resources\MateriaResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MateriaResource;

class ListMaterias extends ListRecords
{
    protected static string $resource = MateriaResource::class;

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Materias creadas')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('id_usuario', auth()->user()->id)),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
