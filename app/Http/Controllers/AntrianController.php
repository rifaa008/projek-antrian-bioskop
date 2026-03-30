<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;

class AntrianController extends Controller
{
    
    public function index()
    {
        $data = Antrian::with(['user', 'jadwalFilm'])->get();
        return response()->json($data);
    }

    
    public function store(Request $request)
    {
        $last = Antrian::where('jadwal_film_id', $request->jadwal_film_id)
                       ->orderBy('nomor_antrian', 'desc')
                       ->first();

        $nomor = $last ? $last->nomor_antrian + 1 : 1;

        $antrian = Antrian::create([
            'user_id' => $request->user_id,
            'jadwal_film_id' => $request->jadwal_film_id,
            'nomor_antrian' => $nomor,
            'status' => 'menunggu'
        ]);

        return response()->json($antrian);
    }

    public function show($id)
    {
        $data = Antrian::with(['user', 'jadwalFilm'])->findOrFail($id);
        return response()->json($data);
    }

    public function destroy($id)
    {
        Antrian::destroy($id);
        return response()->json(['message' => 'Antrian dihapus']);
    }
}