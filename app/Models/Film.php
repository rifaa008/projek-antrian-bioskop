<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JadwalFilm;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films';
    protected $fillable = [
        'judul',
        'genre',
        'durasi',
        'deskripsi'
    ];

    // RELASI 🔥
    public function jadwalFilms()
    {
        return $this->hasMany(JadwalFilm::class);
    }
}
