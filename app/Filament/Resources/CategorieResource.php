<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategorieResource\Pages;
use App\Filament\Resources\CategorieResource\RelationManagers;
use App\Models\Categorie;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategorieResource extends Resource
{
    protected static ?string $model = Categorie::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Berita';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Kategori')
                    ->placeholder('Masukkan nama kategori')
                    ->unique(ignoreRecord: true)
                    ->regex('/^[a-zA-Z0-9\s]+$/')
                    ->validationAttribute('Nama Kategori')
                    ->autofocus()
                    ->helperText('tidak boleh di isi dengan simbol')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Kategori Berita')
                    ->searchable()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->label('Dibuat Pada')
                //     ->dateTime('d M Y, H:i')
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->label('Diperbarui Pada')
                //     ->dateTime('d M Y, H:i')
                //     ->sortable(),
            ])
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategorie::route('/create'),
            'edit' => Pages\EditCategorie::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Kategori Berita';
    }
}
