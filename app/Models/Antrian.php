<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $fillable = [
        'nama',
        'jadwal_film_id',
        'nomor_antrian',
        'status'
    ];

    // relasi ke jadwal film
    public function jadwalFilm()
    {
        return $this->belongsTo(JadwalFilm::class);
    }
}