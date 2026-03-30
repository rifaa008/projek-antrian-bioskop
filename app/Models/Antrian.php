<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
     protected $fillable = [
        'user_id',
        'jadwal_film_id',
        'nomor_antrian',
        'status'
     ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jadwalFilm()
    {
        return $this->belongsTo(JadwalFilm::class);
    }
}
