<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        // 'kategori_id',
        'reporter_id',
        'editor_id',
        'heading',
        'judul',
        'tanggal',
        'status',
        'breaking_news',
        'content',
        'image',
        'ket_image',
        'slug',
        'view',
    ];

    // protected $casts = [
    //     'kategori_id' => 'array'
    // ];

    /**
     * Get the kategori that owns the Berita
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori(): BelongsToMany
    {
        return $this->belongsToMany(Categorie::class, 'berita_categorie')->withTimestamps();
    }

    /**
     * Get the user that owns the Berita
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reporter(): BelongsTo
    {
        return $this->belongsTo(Reporter::class);
    }

    public function editor(): BelongsTo
    {
        return $this->belongsTo(Editor::class);
    }

    // Ubah relasi galeriFoto menjadi hasOne
    public function galeriFoto(): BelongsTo
    {
        return $this->belongsTo(GaleriFoto::class, 'image', 'foto');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            $berita->slug = str()->slug($berita->judul);
        });

        static::updating(function ($berita) {
            if ($berita->isDirty('judul')) {
                $berita->slug = str()->slug($berita->judul);
            }
        });
    }
}
