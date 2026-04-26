<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\JadwalFilm;
use App\Models\Antrian;

class UserPageController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    public function films()
    {
        $films = Film::all();
        return view('user.films', compact('films'));
    }

    public function jadwal()
    {
        $jadwals = JadwalFilm::with('film')->get();
        return view('user.jadwal', compact('jadwals'));
    }

    public function antrian()
    {
        $antrians = Antrian::with('jadwalFilm.film')->latest()->get();
        return view('user.antrian', compact('antrians'));
    }

    public function formAntrian()
    {
        $jadwals = JadwalFilm::with('film')->get();
        return view('user.ambil', compact('jadwals'));
    }

    public function ambilAntrian(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jadwal_film_id' => 'required'
        ]);

        $last = Antrian::where('jadwal_film_id', $request->jadwal_film_id)
                        ->max('nomor_antrian');

        $nomor = $last ? $last + 1 : 1;

        Antrian::create([
            'nama' => $request->nama,
            'jadwal_film_id' => $request->jadwal_film_id,
            'nomor_antrian' => $nomor,
            'status' => 'menunggu'
        ]);

        return redirect('/user/antrian');
    }
}