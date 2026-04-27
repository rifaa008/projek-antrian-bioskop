<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalFilm extends Model
{
    use HasFactory;

    protected $table = 'jadwal_films';

    protected $fillable = [
        'film_id',
        'tanggal',
        'jam_tayang',
        'studio'
    ];

    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }

    public function antrians()
    {
        return $this->hasMany(Antrian::class, 'jadwal_film_id');
    }
}