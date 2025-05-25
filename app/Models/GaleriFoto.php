<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GaleriFoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto',
    ];

    protected static function boot()
    {
        parent::boot();

        // Handle deletion of old image when updating
        static::updating(function ($galeriFoto) {
            if ($galeriFoto->isDirty('foto') && $galeriFoto->getOriginal('foto')) {
                Storage::disk('public')->delete($galeriFoto->getOriginal('foto'));
            }
        });

        // Handle deletion of image when deleting record
        static::deleting(function ($galeriFoto) {
            if ($galeriFoto->foto) {
                Storage::disk('public')->delete($galeriFoto->foto);
            }
        });
    }
}
