<?php

namespace App\Filament\Resources\ReporterResource\Pages;

use App\Filament\Resources\ReporterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReporter extends EditRecord
{
    protected static string $resource = ReporterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
