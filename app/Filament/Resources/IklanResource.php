<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IklanResource\Pages;
use App\Filament\Resources\IklanResource\RelationManagers;
use App\Models\Iklan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IklanResource extends Resource
{
    protected static ?string $model = Iklan::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('gambar')
                    ->image()
                    ->disk('public')
                    ->directory('iklan')
                    ->label('Gambar')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Toggle::make('status')
                    ->label('Status')
                    ->helperText('Status aktif atau tidak aktif')
                    ->onColor('success')
                    ->offColor('danger')
                    ->onIcon('heroicon-m-check')
                    ->offIcon('heroicon-m-x-mark')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->disk('public')
                    ->circular(),

                Tables\Columns\ToggleColumn::make('status')
                    ->label('Status')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable(),
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
            'index' => Pages\ListIklans::route('/'),
            'create' => Pages\CreateIklan::route('/create'),
            'edit' => Pages\EditIklan::route('/{record}/edit'),
        ];
    }
}
