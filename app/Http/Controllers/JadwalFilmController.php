<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalFilm;

class JadwalFilmController extends Controller
{
    public function index()
    {
        $data = JadwalFilm::with('film')->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $jadwal = JadwalFilm::create($request->all());
        return response()->json($jadwal);
    }

    public function show($id)
    {
        $jadwal = JadwalFilm::with('film')->findOrFail($id);
        return response()->json($jadwal);
    }

    public function update(Request $request, $id)
    {
        $jadwal = JadwalFilm::findOrFail($id);
        $jadwal->update($request->all());

        return response()->json($jadwal);
    }

    public function destroy($id)
    {
        JadwalFilm::destroy($id);
        return response()->json(['message' => 'Jadwal dihapus']);
    }
}