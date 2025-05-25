<?php

namespace App\Filament\Resources\ReporterResource\Pages;

use App\Filament\Resources\ReporterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReporters extends ListRecords
{
    protected static string $resource = ReporterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
