<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalFilm;
use App\Models\Film;
class JadwalFilmController extends Controller
{
    public function index()
    {
    $jadwals = JadwalFilm::with('film')->get();
    return view('jadwal_films.index', compact('jadwals'));
    }

    public function create()
    {
    $films = Film::all(); 
    return view('jadwal_films.create', compact('films'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'film_id' => 'required',
        'tanggal' => 'required',
        'jam_tayang' => 'required',
        'studio' => 'required'
    ]);
    JadwalFilm::create([
        'film_id' => $request->film_id,
        'tanggal' => $request->tanggal,
        'jam_tayang' => $request->jam_tayang,
        'studio' => $request->studio,
    ]);

    return redirect('/jadwal_films');
    }

    public function show($id)
    {
        $jadwal = JadwalFilm::with('film')->findOrFail($id);
        return response()->json($jadwal);
    }

    public function edit($id)
{
    $jadwal = JadwalFilm::findOrFail($id);
    $films = Film::all();

    return view('jadwal_films.edit', compact('jadwal', 'films'));
}

public function update(Request $request, $id)
    {
    $request->validate([
        'film_id' => 'required',
        'tanggal' => 'required|date',
        'jam_tayang' => 'required',
        'studio' => 'required'
    ]);

    $jadwal = JadwalFilm::findOrFail($id);

    $jadwal->update([
        'film_id' => $request->film_id,
        'tanggal' => $request->tanggal,
        'jam_tayang' => $request->jam_tayang,
        'studio' => $request->studio,
    ]);

    return redirect('/jadwal_films');
    }

    public function destroy($id)
{
    $jadwal = JadwalFilm::findOrFail($id);
    $jadwal->delete();

    return redirect('/jadwal_films');
}
}