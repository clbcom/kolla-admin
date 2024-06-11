<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DesafioResource\Pages;
use App\Filament\Resources\DesafioResource\RelationManagers;
use App\Models\Desafio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DesafioResource extends Resource
{
    protected static ?string $model = Desafio::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('url_img')
                    ->disk('public')
                    ->directory('images')
                    ->required()
                    ->label('Imagen')
                    ->acceptedFileTypes(['image/*'])
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('descripcion')
                    ->required()
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre'),
                Tables\Columns\ImageColumn::make('url_img')
                    ->label('Imagen')
                    ->disk('public'),
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
            'index' => Pages\ListDesafios::route('/'),
            'create' => Pages\CreateDesafio::route('/create'),
            'edit' => Pages\EditDesafio::route('/{record}/edit'),
        ];
    }
}
