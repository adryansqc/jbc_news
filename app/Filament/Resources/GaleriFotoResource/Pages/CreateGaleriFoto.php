<?php

namespace App\Filament\Resources\GaleriFotoResource\Pages;

use App\Filament\Resources\GaleriFotoResource;
use App\Models\GaleriFoto;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateGaleriFoto extends CreateRecord
{
    protected static string $resource = GaleriFotoResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $firstPhoto = null;

        if (isset($data['foto']) && is_array($data['foto'])) {
            foreach ($data['foto'] as $photo) {
                $galeri = new GaleriFoto();
                $galeri->foto = $photo;
                $galeri->save();

                if (!$firstPhoto) {
                    $firstPhoto = $galeri;
                }
            }
            return $firstPhoto;
        }

        return GaleriFoto::create(['foto' => $data['foto']]);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
