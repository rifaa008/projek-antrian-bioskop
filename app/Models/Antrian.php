<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = 'antrians';

    protected $fillable = [
        'nama',
        'jadwal_film_id',
        'nomor_antrian',
        'status'
    ];

    public function jadwalFilm()
    {
        return $this->belongsTo(JadwalFilm::class, 'jadwal_film_id');
    }
}