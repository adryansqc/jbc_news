<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Filament\Resources\BeritaResource\RelationManagers;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Berita';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(fn() => Auth::user()->id)
                    ->required()
                    ->dehydrated(),

                Forms\Components\Select::make('kategori_id')
                    ->relationship('kategori', 'name')
                    ->required()
                    ->label('Kategori'),

                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->label('Judul Berita'),

                Forms\Components\DatePicker::make('tanggal')
                    ->required()
                    ->default(now())
                    ->label('Tanggal'),

                Forms\Components\Toggle::make('status')
                    ->label('Status Publikasi')
                    ->helperText('statusnya publish atau draft')
                    ->onColor('success')
                    ->offColor('danger')
                    ->onIcon('heroicon-m-check')
                    ->offIcon('heroicon-m-x-mark')
                    ->required()
                    ->default(false),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('berita')
                    ->label('Gambar')
                    ->deleteUploadedFileUsing(function ($state) {
                        if ($state) {
                            Storage::disk('public')->delete($state);
                        }
                    })
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('ket_image')
                    ->maxLength(255)
                    ->label('Keterangan Gambar')
                    ->columnSpanFull(),

                TiptapEditor::make('content')
                    ->required()
                    ->label('Konten Berita')
                    ->disk('public')
                    ->directory('content')
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('public')
                    ->circular(),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul Berita')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('kategori.name')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Penulis')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\IconColumn::make('status')
                    ->label('Status')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('view')
                    ->label('Dilihat')
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
