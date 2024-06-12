<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Cuestionario;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CuestionarioResource\Pages;
use App\Filament\Resources\CuestionarioResource\RelationManagers;

class CuestionarioResource extends Resource
{
    protected static ?string $model = Cuestionario::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titulo')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('id_tema')
                    ->relationship('tema', 'titulo'),
                Forms\Components\RichEditor::make('descripcion')
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('preguntas')
                    ->relationship()
                    ->defaultItems(1)
                    ->columnSpanFull()
                    ->schema([
                        Forms\Components\Textarea::make('texto_pregunta')
                            ->label('Pregunta')
                            ->required(),
                        Forms\Components\Repeater::make('opciones')
                            ->label('Respuestas')
                            ->relationShip()
                            ->defaultItems(2)
                            ->schema([
                                Forms\Components\TextInput::make('texto_opcion')
                                    ->label('Opcion de respuesta')
                                    ->required()
                                    ->columnSpan(5),
                                Forms\Components\Toggle::make('es_correcta')
                                    ->label('¿Es correcta?')
                                    ->inline(false)
                                    ->columnSpan(2)
                            ])->columns(7)
                    ])
                    ->grid(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tema.titulo')
                    ->placeholder('Sin tema asignado'),
                Tables\Columns\TextColumn::make('titulo'),
                Tables\Columns\TextColumn::make('descripcion')
                    ->html(),
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
            'index' => Pages\ListCuestionarios::route('/'),
            'create' => Pages\CreateCuestionario::route('/create'),
            'edit' => Pages\EditCuestionario::route('/{record}/edit'),
        ];
    }
}
