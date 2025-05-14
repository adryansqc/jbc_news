<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Iklan extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        // Delete the image when the model is being deleted
        static::deleting(function ($iklan) {
            if ($iklan->gambar) {
                Storage::disk('public')->delete($iklan->gambar);
            }
        });

        // Delete old image when updating
        static::updating(function ($iklan) {
            if ($iklan->isDirty('gambar') && $iklan->getOriginal('gambar')) {
                Storage::disk('public')->delete($iklan->getOriginal('gambar'));
            }
        });
    }
}
