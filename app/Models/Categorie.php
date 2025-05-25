<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function beritas()
    {
        return $this->belongsToMany(Berita::class, 'berita_categorie')->withTimestamps();
    }
}
