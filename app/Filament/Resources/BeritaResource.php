<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Filament\Resources\BeritaResource\RelationManagers;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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

                Forms\Components\Select::make('kategori')
                    ->relationship('kategori', 'name')
                    ->preload()
                    ->searchable()
                    ->required()
                    ->multiple()
                    ->label('Kategori'),

                Forms\Components\Select::make('reporter_id')
                    ->relationship('reporter', 'nama')
                    ->preload()
                    ->searchable()
                    ->required()
                    ->label('Reporter'),

                Forms\Components\Select::make('editor_id')
                    ->relationship('editor', 'nama')
                    ->preload()
                    ->searchable()
                    ->required()
                    ->label('Editor'),

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

                Forms\Components\Toggle::make('breaking_news')
                    ->label('Breaking News')
                    ->helperText('Apakah berita ini breaking news?')
                    ->onColor('success')
                    ->offColor('danger')
                    ->onIcon('heroicon-m-bolt')
                    ->offIcon('heroicon-m-x-mark')
                    ->default(false),

                Forms\Components\Toggle::make('heading')
                    ->label('Heading')
                    ->helperText('Jadikan Heading')
                    ->onColor('success')
                    ->offColor('danger')
                    ->onIcon('heroicon-m-bolt')
                    ->offIcon('heroicon-m-x-mark')
                    ->default(false),

                Forms\Components\Tabs::make('Image Selection')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Upload Foto')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('berita')
                                    ->label('Upload Gambar Baru')
                                    ->deleteUploadedFileUsing(function ($state) {
                                        if ($state) {
                                            Storage::disk('public')->delete($state);
                                        }
                                    })
                            ]),
                        // Forms\Components\Tabs\Tab::make('Pilih dari Galeri')
                        //     ->schema([
                        //         Forms\Components\Actions::make([
                        //             Forms\Components\Actions\Action::make('pilih_foto')
                        //                 ->label('Pilih Foto dari Galeri')
                        //                 ->icon('heroicon-o-photo')
                        //                 ->modalHeading('Galeri Foto')
                        //                 ->modalWidth('xl')
                        //                 ->modalContent(view('filament.components.galeri-grid'))
                        //                 ->form([
                        //                     Forms\Components\Hidden::make('selected_photo')
                        //                         ->live()
                        //                         ->afterStateUpdated(function ($state, $set) {
                        //                             Log::info('afterStateUpdated triggered', [
                        //                                 'state' => $state,
                        //                             ]);

                        //                             if ($state) {
                        //                                 Log::info('Setting image state', [
                        //                                     'image' => $state
                        //                                 ]);
                        //                                 $set('image', $state);
                        //                             }
                        //                         })
                        //                 ])
                        //                 ->action(function (array $data, $livewire) {
                        //                     Log::info('Action triggered', [
                        //                         'data' => $data,
                        //                         'form_data' => $livewire->form->getState()
                        //                     ]);

                        //                     if (!empty($data['selected_photo'])) {
                        //                         Log::info('Updating form with selected photo', [
                        //                             'selected_photo' => $data['selected_photo']
                        //                         ]);

                        //                         $livewire->form->fill(['image' => $data['selected_photo']]);

                        //                         Notification::make()
                        //                             ->success()
                        //                             ->title('Foto berhasil dipilih')
                        //                             ->send();
                        //                     }
                        //                 })
                        //         ]),
                        //         Forms\Components\Grid::make()
                        //             ->schema([
                        //                 Forms\Components\Placeholder::make('preview')
                        //                     ->content(function ($get) {
                        //                         $image = $get('image');
                        //                         Log::info('Preview image:', ['image' => $image]);

                        //                         if (!$image) return 'Belum ada foto yang dipilih';

                        //                         return view('filament.components.image-preview', [
                        //                             'image' => $image
                        //                         ]);
                        //                     })
                        //             ])
                        //             ->columns(1)
                        //     ])
                    ])
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
                    ->sortable()
                    ->listWithLineBreaks() // Menampilkan multiple kategori dengan baris baru
                    ->bulleted() // Menambahkan bullet point untuk setiap kategori
                    ->sortable(),

                Tables\Columns\TextColumn::make('reporter.nama')
                    ->label('Reporter')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('editor.nama')
                    ->label('Editor')
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

                Tables\Columns\ToggleColumn::make('breaking_news')
                    ->label('Breaking News')
                    ->onColor('success')
                    ->offColor('danger')
                    ->sortable(),

                Tables\Columns\ToggleColumn::make('heading')
                    ->label('Heading')
                    ->onColor('success')
                    ->offColor('danger')
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
