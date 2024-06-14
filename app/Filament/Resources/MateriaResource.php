<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Desafio;
use App\Models\Materia;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Semestre;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use Filament\Forms\Components\Component;
use Filament\Tables\Filters\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Actions\Action;
use App\Filament\Resources\MateriaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MateriaResource\RelationManagers;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;

class MateriaResource extends Resource
{
    protected static ?string $model = Materia::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required(),
                Forms\Components\Select::make('id_semestre')
                    ->label('Seleccione semestre')
                    ->options(Semestre::all()->pluck('literal', 'id'))
                    ->native(false),
                Forms\Components\Select::make('id_desafio')
                    ->label('Seleccione o cree un desafio')
                    ->native(false)
                    ->options(Desafio::all()->pluck('nombre', 'id')),
                Forms\Components\TextInput::make('nro_orden')
                    ->integer()
                    ->label('Numero del orden'),
                Forms\Components\RichEditor::make('descripcion')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Repeater::make('temas')
                    ->relationship()
                    ->schema([
                        Forms\Components\TextInput::make('nro_orden')
                            ->label('Nro.')
                            ->integer(),
                        Forms\Components\TextInput::make('titulo')
                            ->required()
                            ->validationMessages(['required' => 'Debe llenar el titulo del tema'])
                            ->columnSpan(4),
                        Forms\Components\TextArea::make('descripcion')->columnSpanFull(),
                        Forms\Components\Fieldset::make('Archivo')
                            ->relationship('recurso', condition: fn (?array $state): bool => filled($state['nombre']))
                            ->schema([
                                Forms\Components\Select::make('tipo')
                                    ->columnSpanFull()
                                    ->live()
                                    ->default('video')
                                    ->options([
                                        'video' => 'Video',
                                        'pdf' => 'PDF\'s',
                                        'img' => 'Imagen'
                                    ]),
                                Forms\Components\Grid::make(1)
                                    ->schema(fn (Get $get): array => match ($get('tipo')) {
                                        'video' => [
                                            Forms\Components\TextInput::make('url')
                                                ->live()
                                                ->afterStateUpdated(function (Get $get, Set $set) {
                                                    $url = $get('url');
                                                    $youtube = "https://www.youtube.com/oembed?url=" . $url . "&format=json";

                                                    $recurso = curl_init($youtube);
                                                    curl_setopt($recurso, CURLOPT_RETURNTRANSFER, 1);
                                                    $return = curl_exec($recurso);
                                                    curl_close($recurso);

                                                    $set('nombre', json_decode($return, true)['title']);
                                                })
                                        ],
                                        default => [
                                            Forms\Components\FileUpload::make('url')
                                                ->label("Seleccione su archivo")
                                                ->columnSpanFull()
                                                ->directory('recursos')
                                                ->acceptedFileTypes(['image/*', 'application/pdf', 'application/mp4'])
                                                ->afterStateUpdated(function (Get $get, Set $set) {
                                                    foreach ($get('url') as $file) {
                                                        $nombreArchivo = preg_replace('/\.[^.]+$/i', '', $file->getClientOriginalName());
                                                        Log::info($get('temas'));
                                                        $set('nombre', $nombreArchivo);
                                                    }
                                                }),
                                        ]
                                    }),
                                Forms\Components\TextInput::make('nombre')->columnSpanFull(),
                            ])

                    ])
                    ->grid(2)
                    ->columns(5)
                    ->columnSpanFull()
                    ->collapsible()
                    ->cloneable()
                    ->itemLabel(fn (array $state): ?string => $state['nro_orden'] ? ($state['nro_orden'] . ". " . $state['titulo']) : null)
                    ->deleteAction(
                        fn (Action $action) => $action->requiresConfirmation(),
                    )

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nro_orden')->sortable()->searchable()
                    ->label('Nro.')
                    ->placeholder('Sin orden'),
                Tables\Columns\TextColumn::make('semestre.literal')->sortable()->searchable()
                    ->placeholder('Sin semestre'),
                Tables\Columns\TextColumn::make('desafio.nombre')->searchable(),
                Tables\Columns\TextColumn::make('nombre')->searchable(),
                Tables\Columns\TextColumn::make('descripcion')->searchable()
                    ->limit(50)
                    ->html(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function query(): Builder
    {
        return parent::query()->where('id_usuario', auth()->id());
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
            'index' => Pages\ListMaterias::route('/'),
            'create' => Pages\CreateMateria::route('/create'),
            'edit' => Pages\EditMateria::route('/{record}/edit'),
        ];
    }
}
