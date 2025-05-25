<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriFotoResource\Pages;
use App\Filament\Resources\GaleriFotoResource\RelationManagers;
use App\Models\GaleriFoto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GaleriFotoResource extends Resource
{
    protected static ?string $model = GaleriFoto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\FileUpload::make('foto')
                            ->image()
                            ->multiple()
                            ->disk('public')
                            ->directory('galeri')
                            ->required()
                            ->maxFiles(10) // Batasan jumlah foto
                            ->reorderable()
                            ->columnSpanFull(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    Tables\Columns\ImageColumn::make('foto')
                        ->circular(false)
                        ->stacked()
                        ->height(150)
                        ->width(150)
                        ->extraImgAttributes([
                            'loading' => 'lazy',
                            'class' => 'rounded-lg shadow-md',
                            'style' => 'object-fit: cover; max-width: 300px; margin: 10px;'
                        ])
                        ->label('Galeri Foto'),
                ]),

            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            //
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListGaleriFotos::route('/'),
            'create' => Pages\CreateGaleriFoto::route('/create'),
            'edit' => Pages\EditGaleriFoto::route('/{record}/edit'),
        ];
    }
}
