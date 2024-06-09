<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SemestreResource\Pages;
use App\Filament\Resources\SemestreResource\RelationManagers;
use App\Models\Semestre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SemestreResource extends Resource
{
    protected static ?string $model = Semestre::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('numeral'),
                Tables\Columns\TextColumn::make('literal'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSemestres::route('/'),
            'create' => Pages\CreateSemestre::route('/create'),
            'edit' => Pages\EditSemestre::route('/{record}/edit'),
        ];
    }
}
